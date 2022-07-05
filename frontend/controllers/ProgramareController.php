<?php

namespace frontend\controllers;

use common\models\FormProgramare;
use common\models\Institutie;
use common\models\InstitutiiServicii;
use common\models\InstitutiiStructuriSubordonate;
use common\models\Judet;
use common\models\Localitate;
use common\models\Minister;
use common\models\Programare;
use common\models\ProgramareSearch;
use common\models\StructuriSubordonatePuncteLucru;
use common\models\StructuriSubordonateServicii;
use common\models\TipuriServiciu;
use common\models\User;
use kartik\mpdf\Pdf;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ProgramareController implements the CRUD actions for Programare model.
 */
class ProgramareController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Programare models.
     */
    public function actionIndex()
    {
        if (!\Yii::$app->user->getIsGuest()) {
            $searchModel = new ProgramareSearch();

            if (\Yii::$app->user->can('admin')) {
                $dataProvider = $searchModel->search($this->request->queryParams);
            } else if (\Yii::$app->user->can('admin_minister')) {
                $dataProvider = $searchModel->searchAdminMinister($this->request->queryParams);
            } else if (\Yii::$app->user->can('admin_institutie')) {
                $dataProvider = $searchModel->searchAdminInstitutie($this->request->queryParams);
            } else if (\Yii::$app->user->can('director_institutie')) {
                $dataProvider = $searchModel->searchAdminStructura($this->request->queryParams);
            } else if (\Yii::$app->user->can('lucrator_serviciu')) {
                $dataProvider = $searchModel->searchLucratorServiciu($this->request->queryParams);
            }


            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        return $this->redirect(['site/index']);
    }

    /**
     * Displays a single Programare model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Programare model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Programare the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Programare::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Creates a new Programare model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($judetul)
    {
        // identificare judet
        $judetulIdentificat = Judet::find()
            ->where("lower(judet_indicativ)='{$judetul}'")
            ->select(['id'])->one();

        $localitatiJudet = Localitate::find()
            ->where(['localitate_judet' => $judetulIdentificat->id])
            ->select(['id', 'localitate_nume'])
            ->orderBy(['localitate_nume' => SORT_ASC])
            ->all();

        $model = new FormProgramare();

        if (\Yii::$app->request->isPost) {
            $request = \Yii::$app->request->post();

            $formProgramare = $request["FormProgramare"];

            $programareSalvata = $this->salveazaDateProgramare($formProgramare);

            if ($programareSalvata) {
                return $this->redirect([
                    'programare/create',
                    'judetul' => $judetul,
                    'action' => 'salvare',
                    'result' => 200
                ]);
            } else {
                return $this->redirect([
                    'programare/create',
                    'judetul' => $judetul,
                    'action' => 'salvare',
                    'result' => 500]);
            }
        } else if (\Yii::$app->request->isGet) {
            return $this->render('create', [
                'model' => $model,
                'localitatiJudet' => $localitatiJudet
            ]);
        }
    }

    private function salveazaDateProgramare($formProgramare)
    {
        $programareNoua = new Programare();
        $programareNoua->programare_localitate = $formProgramare["programare_localitate"];
        $programareNoua->programare_institutie = $formProgramare["programare_institutie"];

        // get id for minister
        $institutie = Institutie::find()
            ->where(['id' => (int)$formProgramare["programare_institutie"]])
            ->select(['institutie_minister_id'])
            ->one();

        $programareNoua->programare_minister = $institutie->institutie_minister_id;
        $programareNoua->programare_structura_subordonata = $formProgramare["programare_structura_subordonata"];
        $programareNoua->programare_serviciu = (int)$formProgramare["programare_serviciu"];
        $programareNoua->programare_prestare = $formProgramare["programare_prestare"];
        $programareNoua->programare_punct_lucru = $formProgramare["programare_punct_lucru"];
        $programareNoua->programare_datetime = $formProgramare["programare_data"];
        $programareNoua->programare_email = $formProgramare["programare_email"];
        $programareNoua->programare_nume = $formProgramare["programare_nume"];
        $programareNoua->programare_prenume = $formProgramare["programare_prenume"];

        if (!\Yii::$app->user->getIsGuest()) {
            $programareNoua->programare_user = \Yii::$app->user->identity->id;
        }

        return $programareNoua->save();
    }

    public function actionStatistici()
    {
        if (!\Yii::$app->user->getIsGuest()) {
            $view = '';
            if (\Yii::$app->user->can('admin')) {
                $view = 'statistici-generale';
            } else if (\Yii::$app->user->can('admin_minister')) {
                $view = 'statistici-minister';
            } else if (\Yii::$app->user->can('admin_institutie')) {
                $view = 'statistici-institutie';
            } else if (\Yii::$app->user->can('director_institutie')) {
                $view = 'statistici-structura';
            }
            return $this->render($view);
        }
        return $this->redirect(['site/index']);

    }
    // =============================================
    // VALIDARE PROGRAMARE
    // =============================================
    public function actionValideazaProgramare()
    {
        $dataResponse = [
            'response_code' => 0,
            'response_message' => 'Request initiat'
        ];

        if (!\Yii::$app->user->getIsGuest() && (
                \Yii::$app->user->can('admin_institutie') ||
                \Yii::$app->user->can('director_institutie')
            )) {

            $requestData = \Yii::$app->request->post();
            $id_programare = $requestData["id_progamare"];

            $programareExistenta = \common\models\Programare::findOne($id_programare);

            if ($programareExistenta != NULL) {

                // verificare daca programarea este din cadrul institutiei
                if ($programareExistenta->programare_institutie == \Yii::$app->user->identity->institutie_id) {
                    $programareExistenta->programare_validata_de = \Yii::$app->user->identity->id;
                    $programareExistenta->programare_numar_unic = \Yii::$app->security->generateRandomString(10);
                    date_default_timezone_set('Europe/Bucharest');
                    $programareExistenta->programare_data_numar_unic = date('Y-m-d');
                    $programareExistenta->programare_este_anulata = 1;

                    if ($programareExistenta->save()) {
                        $dataResponse = [
                            'response_code' => 200,
                            'response_message' => 'Programarea a fost validată.'
                        ];
                    } else {
                        $dataResponse = [
                            'response_code' => 500,
                            'response_message' => 'A apărut o eroare.'
                        ];
                    }

                } else {
                    $dataResponse = [
                        'response_code' => 500,
                        'response_message' => 'Nu aveți access.'
                    ];
                }
            }


            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $dataResponse;
        }
        return $this->redirect(['site/index']);
    }

    // ==============================================
    // STATISTICI GENERALE PENTRU TOT SISTEMUL
    // ==============================================
    public function actionGetStatisticiAdmin()
    {
        $data_response = [];

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if (\Yii::$app->user->getIsGuest()) {
            return $data_response;
        } else {
            $request = \Yii::$app->request->post();
            $data_inceput = date('Y-m-d', strtotime($request['_data']['_data_inceput']));
            $data_sfarsit = date('Y-m-d', strtotime($request['_data']['_data_sfarsit']));
            $minister_id = (int)$request['_data']['_minister_id'];

            if ($minister_id === 0) {
                // aduc date pentru toate ministerele
                $ministere = Minister::find()->select(['id', 'minister_denumire'])->asArray()->all();
                $data_response['numar_programari'] = [];
                $data_response['background_colors'] = [];

                foreach ($ministere as $key => $minister) {
                    $numar_programari_per_minister = Programare::find()
                        ->where([
                            'and',
                            ['>=', 'date(programare_datetime)', $data_inceput],
                            ['<=', 'date(programare_datetime)', $data_sfarsit],
                        ])->andWhere(['programare_minister' => $minister['id']])->count();

                    $data_response['labels'][] = Minister::findOne($minister['id'])->minister_denumire.' ('.$numar_programari_per_minister.')';
                    array_push($data_response['numar_programari'], $numar_programari_per_minister);

                    // set the color
                    $randomRed = rand(1, 255);
                    $randomGreen = rand(1, 255);
                    $randomBlue = rand(1, 255);
                    $colorString = 'rgba(' . $randomRed . ', ' . $randomGreen . ', ' . $randomBlue . ', 0.5)';
                    array_push($data_response['background_colors'], $colorString);
                    // 'rgba(255, 99, 132, 0.5)',
                }
            } else {
                // aduc institutiile din minister
                $institutii = Institutie::find()->where(['institutie_minister_id' => $minister_id])->select(['id', 'institutie_denumire'])->all();

                $data_response['numar_programari'] = [];
                $data_response['background_colors'] = [];

                foreach ($institutii as $key => $institutie) {
                    $numar_programari_per_institutie = Programare::find()
                        ->where([
                            'and',
                            ['>=', 'date(programare_datetime)', $data_inceput],
                            ['<=', 'date(programare_datetime)', $data_sfarsit],
                        ])
                        ->andWhere(['programare_minister' => $minister_id])
                        ->andWhere(['programare_institutie' => $institutie['id']])->count();

                    $data_response['labels'][] = Institutie::findOne($institutie['id'])->institutie_denumire.' ('.$numar_programari_per_institutie.')';
                    array_push($data_response['numar_programari'], $numar_programari_per_institutie);

                    // set the color
                    $randomRed = rand(1, 255);
                    $randomGreen = rand(1, 255);
                    $randomBlue = rand(1, 255);
                    $colorString = 'rgba(' . $randomRed . ', ' . $randomGreen . ', ' . $randomBlue . ', 0.5)';
                    array_push($data_response['background_colors'], $colorString);
                    // 'rgba(255, 99, 132, 0.5)',
                }
            }

            return $data_response;
        }
    }


    // =============================================
    // STATISTICI CHART IN CADRUL MINISTERULUI
    // =============================================
    public function actionGetStatisticiMinister()
    {
        $data_response = [];

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if (\Yii::$app->user->getIsGuest()) {
            return $data_response;
        } else {
            $request = \Yii::$app->request->post();
            $data_inceput = date('Y-m-d', strtotime($request['_data']['_data_inceput']));
            $data_sfarsit = date('Y-m-d', strtotime($request['_data']['_data_sfarsit']));
            $institutie_id = (int)$request['_data']['_institutie_id'];

            if ($institutie_id === 0) {
                // aduc date pentru toate institutiile
                $institutii = Institutie::find()
                    ->where(['institutie_minister_id' => \Yii::$app->user->identity->minister_id])
                    ->select(['id', 'institutie_denumire'])
                    ->asArray()
                    ->all();

                $data_response['numar_programari'] = [];
                $data_response['background_colors'] = [];

                foreach ($institutii as $key => $institutie) {
                    $numar_programari_per_institutie = Programare::find()
                        ->where([
                            'and',
                            ['>=', 'date(programare_datetime)', $data_inceput],
                            ['<=', 'date(programare_datetime)', $data_sfarsit],
                        ])->andWhere(['programare_institutie' => $institutie['id']])->count();

                    $data_response['labels'][] = Institutie::findOne($institutie['id'])->institutie_denumire.' ('.$numar_programari_per_institutie.')';
                    array_push($data_response['numar_programari'], $numar_programari_per_institutie);

                    // set the color
                    $randomRed = rand(1, 255);
                    $randomGreen = rand(1, 255);
                    $randomBlue = rand(1, 255);
                    $colorString = 'rgba(' . $randomRed . ', ' . $randomGreen . ', ' . $randomBlue . ', 0.5)';
                    array_push($data_response['background_colors'], $colorString);
                    // 'rgba(255, 99, 132, 0.5)',
                }
            } else {
                // aduc serviciile din cadrul institutiei
                $tipuriServiciiInstitutie = InstitutiiServicii::find()
                    ->where(['is_institutie' => $institutie_id])
                    ->select(['is_serviciu'])
                    ->all();

                // preluare servicii pentru label
                $servicii = TipuriServiciu::find()
                    ->where(['in', 'id', array_column($tipuriServiciiInstitutie, 'is_serviciu')])
                    ->select(['id', 'tip_serviciu_denumire'])
                    ->orderBy(['tip_serviciu_denumire' => SORT_ASC])
                    ->all();

                $data_response['numar_programari'] = [];
                $data_response['background_colors'] = [];

                foreach ($servicii as $key => $serviciu) {
                    $numar_programari_per_servicii = Programare::find()
                        ->where([
                            'and',
                            ['>=', 'date(programare_datetime)', $data_inceput],
                            ['<=', 'date(programare_datetime)', $data_sfarsit],
                        ])
                        ->andWhere(['programare_institutie' => $institutie_id])
                        ->andWhere(['programare_serviciu' => $serviciu->id])->count();

                    $data_response['labels'][] = TipuriServiciu::findOne($serviciu->id)->tip_serviciu_denumire.' ('.$numar_programari_per_servicii.')';
                    array_push($data_response['numar_programari'], $numar_programari_per_servicii);

                    // set the color
                    $randomRed = rand(1, 255);
                    $randomGreen = rand(1, 255);
                    $randomBlue = rand(1, 255);
                    $colorString = 'rgba(' . $randomRed . ', ' . $randomGreen . ', ' . $randomBlue . ', 0.5)';
                    array_push($data_response['background_colors'], $colorString);
                }
            }

            return $data_response;
        }
    }


    // =============================================
    // STATISTICI CHART IN CADRUL INSTITUTIEI
    // =============================================
    public function actionGetStatisticiInstitutie()
    {
        $data_response = [];

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if (\Yii::$app->user->getIsGuest()) {
            return $data_response;
        } else {
            $request = \Yii::$app->request->post();
            $data_inceput = date('Y-m-d', strtotime($request['_data']['_data_inceput']));
            $data_sfarsit = date('Y-m-d', strtotime($request['_data']['_data_sfarsit']));
            $structura_id = (int)$request['_data']['_structura_id'];
            $serviciu_id = (int)$request['_data']['_serviciu_id'];

            if ($structura_id === 0) {
                // aduc date pentru toate institutiile
                $structuri_subordonate = InstitutiiStructuriSubordonate::find()
                    ->where(['institutie_parinte_iss' => \Yii::$app->user->identity->institutie_id])
                    ->select(['id_iss', 'institutie_denumire_iss'])
                    ->asArray()
                    ->all();

                $data_response['numar_programari'] = [];
                $data_response['background_colors'] = [];

                foreach ($structuri_subordonate as $key => $structura_subordonata) {
                    $numar_programari_per_structura = Programare::find()
                        ->where([
                            'and',
                            ['>=', 'date(programare_datetime)', $data_inceput],
                            ['<=', 'date(programare_datetime)', $data_sfarsit],
                        ])
                        ->andWhere(['programare_structura_subordonata' => $structura_subordonata['id_iss']])
                        ->count();

                    $data_response['labels'][] = InstitutiiStructuriSubordonate::findOne($structura_subordonata['id_iss'])->institutie_denumire_iss.' ('.$numar_programari_per_structura.')';
                    array_push($data_response['numar_programari'], $numar_programari_per_structura);

                    // set the color
                    $randomRed = rand(1, 255);
                    $randomGreen = rand(1, 255);
                    $randomBlue = rand(1, 255);
                    $colorString = 'rgba(' . $randomRed . ', ' . $randomGreen . ', ' . $randomBlue . ', 0.5)';
                    array_push($data_response['background_colors'], $colorString);
                    // 'rgba(255, 99, 132, 0.5)',
                }
            } else {
                if ($serviciu_id === 0) {
                    // aduc serviciile din cadrul institutiei
                    $tipuriServiciiInstitutie = InstitutiiServicii::find()
                        ->where(['is_institutie' => \Yii::$app->user->identity->institutie_id])
                        ->select(['is_serviciu'])
                        ->all();

                    // preluare servicii pentru label
                    $servicii = TipuriServiciu::find()
                        ->where(['in', 'id', array_column($tipuriServiciiInstitutie, 'is_serviciu')])
                        ->select(['id', 'tip_serviciu_denumire'])
                        ->orderBy(['tip_serviciu_denumire' => SORT_ASC])
                        ->all();

                    $data_response['numar_programari'] = [];
                    $data_response['background_colors'] = [];

                    foreach ($servicii as $key => $serviciu) {
                        $numar_programari_per_servicii = Programare::find()
                            ->where([
                                'and',
                                ['>=', 'date(programare_datetime)', $data_inceput],
                                ['<=', 'date(programare_datetime)', $data_sfarsit],
                            ])
                            ->andWhere(['programare_structura_subordonata' => $structura_id])
                            ->andWhere(['programare_serviciu' => $serviciu->id])->count();

                        $data_response['labels'][] = TipuriServiciu::findOne($serviciu->id)->tip_serviciu_denumire.' ('.$numar_programari_per_servicii.')';
                        array_push($data_response['numar_programari'], $numar_programari_per_servicii);

                        // set the color
                        $randomRed = rand(1, 255);
                        $randomGreen = rand(1, 255);
                        $randomBlue = rand(1, 255);
                        $colorString = 'rgba(' . $randomRed . ', ' . $randomGreen . ', ' . $randomBlue . ', 0.5)';
                        array_push($data_response['background_colors'], $colorString);
                    }
                } else {
                    // aduc punctele de lucru
                    $structuraPuncteLucru = StructuriSubordonatePuncteLucru::find()
                        ->where(['structura_subordonata_id_sspl' => $structura_id])
                        ->select(['id_sspl', 'localitate_id_sspl', 'strada_sspl', 'numar_strada_sspl'])
                        ->all();

                    $data_response['labels'] = [];
                    $data_response['numar_programari'] = [];
                    $data_response['background_colors'] = [];

                    foreach ($structuraPuncteLucru as $punctLucru) {

                        $numar_programari_per_servicii = Programare::find()
                            ->where([
                                'and',
                                ['>=', 'date(programare_datetime)', $data_inceput],
                                ['<=', 'date(programare_datetime)', $data_sfarsit],
                            ])
                            ->andWhere(['programare_punct_lucru' => $punctLucru->id_sspl])
                            ->andWhere(['programare_serviciu' => $serviciu_id])
                            ->count();

                        $localitate = Localitate::findOne($punctLucru->localitate_id_sspl);
                        $stringLabelForPunctLucru = $localitate->localitate_nume . '-' . $punctLucru->strada_sspl . '-' . $punctLucru->numar_strada_sspl;
                        array_push($data_response['labels'], $stringLabelForPunctLucru.' ('.$numar_programari_per_servicii.')');

                        array_push($data_response['numar_programari'], $numar_programari_per_servicii);

                        // set the color
                        $randomRed = rand(1, 255);
                        $randomGreen = rand(1, 255);
                        $randomBlue = rand(1, 255);
                        $colorString = 'rgba(' . $randomRed . ', ' . $randomGreen . ', ' . $randomBlue . ', 0.5)';
                        array_push($data_response['background_colors'], $colorString);
                    }
                }
            }

            return $data_response;
        }
    }


    // =============================================
    // STATISTICI CHART IN CADRUL STRUCTURII SUBORDONATE
    // =============================================
    public function actionGetStatisticiStructura()
    {
        $data_response = [];

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if (\Yii::$app->user->getIsGuest()) {
            return $data_response;
        } else {
            $request = \Yii::$app->request->post();
            $data_inceput = date('Y-m-d', strtotime($request['_data']['_data_inceput']));
            $data_sfarsit = date('Y-m-d', strtotime($request['_data']['_data_sfarsit']));
            $serviciu_id = (int)$request['_data']['_serviciu_id'];
            $punct_lucru_id = (int)$request['_data']['_punct_lucru_id'];

            if ($serviciu_id === 0) {
                // aduc date pentru toate serviciile din cadrul structurii subordonate
                $serviciiStructuraSubordonata = StructuriSubordonateServicii::find()
                    ->where(['structura_subordonata_id_sss' => \Yii::$app->user->identity->institutie_subordonata_id])
                    ->select(['serviciu_id_sss'])
                    ->distinct()
                    ->asArray()
                    ->all();

                $servicii_list = array_column($serviciiStructuraSubordonata, 'serviciu_id_sss');


                $servicii_labels = TipuriServiciu::find()
                    ->where(['in', 'id', $servicii_list])
                    ->select(['id', 'tip_serviciu_denumire'])
                    ->all();

                $data_response['labels'] = array_column($servicii_labels, 'tip_serviciu_denumire');
                $data_response['numar_programari'] = [];
                $data_response['background_colors'] = [];

                foreach ($servicii_labels as $key => $serviciu) {
                    $numar_programari_per_serviciu = Programare::find()
                        ->where([
                            'and',
                            ['>=', 'date(programare_datetime)', $data_inceput],
                            ['<=', 'date(programare_datetime)', $data_sfarsit],
                        ])
                        ->andWhere(['programare_structura_subordonata' => \Yii::$app->user->identity->institutie_subordonata_id])
                        ->andWhere(['programare_serviciu' => $serviciu->id])
                        ->count();
                    array_push($data_response['numar_programari'], $numar_programari_per_serviciu);

                    // set the color
                    $randomRed = rand(1, 255);
                    $randomGreen = rand(1, 255);
                    $randomBlue = rand(1, 255);
                    $colorString = 'rgba(' . $randomRed . ', ' . $randomGreen . ', ' . $randomBlue . ', 0.5)';
                    array_push($data_response['background_colors'], $colorString);
                    // 'rgba(255, 99, 132, 0.5)',
                }
            } else {
                // aici avem serviciul

                if ($punct_lucru_id === 0) {
                    // aduc programarile pentru toate punctele

                    // aduc punctele de lucru
                    $structuraPuncteLucru = StructuriSubordonatePuncteLucru::find()
                        ->where(['structura_subordonata_id_sspl' => \Yii::$app->user->identity->institutie_subordonata_id])
                        ->select(['id_sspl', 'localitate_id_sspl', 'strada_sspl', 'numar_strada_sspl'])
                        ->all();

                    $data_response['labels'] = [];
                    $data_response['numar_programari'] = [];
                    $data_response['background_colors'] = [];

                    foreach ($structuraPuncteLucru as $punctLucru) {

                        $numar_programari_per_servicii = Programare::find()
                            ->where([
                                'and',
                                ['>=', 'date(programare_datetime)', $data_inceput],
                                ['<=', 'date(programare_datetime)', $data_sfarsit],
                                ['programare_punct_lucru' => $punctLucru->id_sspl]
                            ])
                            ->andWhere(['programare_serviciu' => $serviciu_id])
                            ->count();


                        array_push($data_response['numar_programari'], $numar_programari_per_servicii);
                        $localitate = Localitate::findOne($punctLucru->localitate_id_sspl);
                        $stringLabelForPunctLucru = $localitate->localitate_nume . '-' . $punctLucru->strada_sspl . '-' . $punctLucru->numar_strada_sspl;
                        array_push($data_response['labels'], $stringLabelForPunctLucru.' ('.$numar_programari_per_servicii.')');

                        // set the color
                        $randomRed = rand(1, 255);
                        $randomGreen = rand(1, 255);
                        $randomBlue = rand(1, 255);
                        $colorString = 'rgba(' . $randomRed . ', ' . $randomGreen . ', ' . $randomBlue . ', 0.5)';
                        array_push($data_response['background_colors'], $colorString);
                    }

                } else {
                    // aduc programarile pentru punctul respectiv pe zile
                    $data_response['labels'] = [];
                    $data_response['numar_programari'] = [];
                    $data_response['background_colors'] = [];

                    $current_date = $data_inceput;
                    while ($current_date <= $data_sfarsit) {
                        array_push($data_response['labels'], $current_date);

                        $numar_programari_per_punct_lucru = Programare::find()
                            ->where(['date(programare_datetime)' => $current_date])
                            ->andWhere(['programare_serviciu' => $serviciu_id])
                            ->andWhere(['programare_punct_lucru' => $punct_lucru_id])
                            ->count();

                        array_push($data_response['numar_programari'], $numar_programari_per_punct_lucru);

                        // set the color
                        $randomRed = rand(1, 255);
                        $randomGreen = rand(1, 255);
                        $randomBlue = rand(1, 255);
                        $colorString = 'rgba(' . $randomRed . ', ' . $randomGreen . ', ' . $randomBlue . ', 0.5)';
                        array_push($data_response['background_colors'], $colorString);

                        $current_date = date('Y-m-d', strtotime($current_date . '+1 day'));
                    }
                }
            }

            return $data_response;
        }
    }

    // =============================================
    // VERIFICARE DUPLICAT PROGRAMARE
    // =============================================

    public function actionVerificareDuplicat()
    {
        $data_response = [
            'response_code' => 0,
            'response_message' => 'Initiat'
        ];

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if (!\Yii::$app->user->getIsGuest() && (\Yii::$app->user->can('admin_institutie') || \Yii::$app->user->can('director_institutie'))) {
            $request = \Yii::$app->request->post();
            $programare_id = $request["programare_id"];

            $programareExistenta = Programare::findOne($programare_id);

            $programare_minister = $programareExistenta->programare_minister;
            $programare_institutie = $programareExistenta->programare_institutie;
            $programare_structura_subordonata = $programareExistenta->programare_structura_subordonata;
            $programare_serviciu = $programareExistenta->programare_serviciu;
            $programare_punct_lucru = $programareExistenta->programare_punct_lucru;
            $programare_timestamp = date('Y-m-d h:i', strtotime($programareExistenta->programare_datetime));

            // verificare duplicat
            $data_response['response_message'] = 'Nu există o programare duplicat. Poate fi validată.';
            $data_response['programari_duplicat'] = [];

            $programariDuplicat = Programare::find()
                ->where([
                    'and',
                    ['programare_minister' => $programare_minister],
                    ['programare_institutie' => $programare_institutie],
                    ['programare_structura_subordonata' => $programare_structura_subordonata],
                    ['programare_serviciu' => $programare_serviciu],
                    ['programare_punct_lucru' => $programare_punct_lucru],
                    ['programare_datetime' => $programare_timestamp],
                ])
                ->andWhere(['<>', 'id', $programare_id])
                ->andWhere([
                    'and',
                    ['not', ['programare_numar_unic' => NULL]],
                    ['not', ['programare_validata_de' => NULL]],
                ])
                ->all();

            if (count($programariDuplicat) > 0) {
                $data_response['response_message'] = 'Exista validari duplicat.';
                foreach ($programariDuplicat as $key => $pd) {
                    $programareDuplicat = [
                        'programare_nume' => $pd->programare_nume,
                        'programare_prenume' => $pd->programare_prenume,
                        'programare_validata_de' => User::findOne($pd->programare_validata_de) ? User::findOne($pd->programare_validata_de)->fullName() : NULL,
                        'programare_numar_unic' => $pd->programare_numar_unic,
                        'programare_email' => $pd->programare_email,
                    ];

                    $data_response['programari_duplicat'][] = $programareDuplicat;
                }
            }

            return $data_response;
        }
    }

    // ========================================================
    // ATRIBUIRE PROGRAMARE UNUI LUCRATOR SERVICU
    // ========================================================
    public function actionAtribuire($id_programare = NULL)
    {
        if (!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('director_institutie')) {
            $programare = Programare::findOne($id_programare);

            if (\Yii::$app->request->isGet) {
                $lucratoriStructuraSubordonata = User::find()
                    ->joinWith(['authAssignment'])
                    ->where(['institutie_subordonata_id' => \Yii::$app->user->identity->institutie_subordonata_id])
                    ->andWhere([
                        'and',
                        ['auth_assignment.item_name' => 'lucrator_serviciu'],
                        ['status' => 10]
                    ])
                    ->select(['id', 'nume', 'prenume'])
                    ->all();

                return $this->render(
                    'atribuire-lucrator',
                    [
                        'lucratoriStructuraSubordonata' => $lucratoriStructuraSubordonata,
                        'programare' => $programare
                    ]
                );
            } else if (\Yii::$app->request->isPost) {
                $data_response = [
                    'response_code' => 0,
                    'response_message' => 'Initiat'
                ];
                $request = \Yii::$app->request->post();

                $programare_id = (int)$request["_programare_id"];
                $lucrator_id = (int)$request["_lucrator_id"];

                $programare = Programare::findOne($programare_id);
                $programare->programare_lucrator = $lucrator_id;
                $programare->programare_este_anulata = 2;

                if ($programare->save()) {
                    $data_response['response_message'] = 'Programare atribuita cu success';
                    $data_response['response_code'] = 200;
                }


                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return $data_response;
            }

        }
        return $this->redirect(['site/index']);
    }

    // =========================================
    // istoric programari pentru lucratorii din serviciu
    // ==================================================
    public function actionIstoric()
    {
        if (!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('lucrator_serviciu')) {
            $searchModel = new ProgramareSearch();

            $dataProvider = $searchModel->searchLucratorServiciuIstoric($this->request->queryParams);
            return $this->render('istoric', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        return $this->redirect(['site/index']);
    }

    // =====================================
    // finalizare programare
    // =====================================

    public function actionFinalizare($id_programare)
    {
        if (!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('lucrator_serviciu')) {
            $programareExistenta = Programare::findOne($id_programare);

            if ($programareExistenta != NULL && $programareExistenta->programare_numar_unic != NULL) {
                // verificare ca programarea sa fie atribuita lucratorului
                if ($programareExistenta->programare_lucrator === \Yii::$app->user->identity->id) {

                    $programareExistenta->programare_este_anulata = 3;
                    $programareExistenta->programare_data_finalizare = date('Y-m-d h:i:s');

                    if ($programareExistenta->save()) {
                        return $this->redirect(['programare/index', 'programare_status' => 'finalizata']);
                    }
                }
                return $this->redirect(['programare/index']);
            }
            return $this->redirect(['programare/index']);
        }
        return $this->redirect(['programare/index']);
    }

    // =====================================
    // finalizare programare
    // =====================================

    public function actionAnulare()
    {
        $data_response = [
            'response_code' => 0,
            'response_message' => 'Inititat'
        ];

        if (!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('director_institutie')) {
            $request = \Yii::$app->request->post();

            $programare = Programare::findOne((int)$request["programare_id"]);
            $programare->programare_este_anulata = 9;
            $programare->programare_data_finalizare = date('Y-m-d h:i:s');

            if ($programare->save()) {
                $data_response['response_code'] = 200;
                $data_response['response_message'] = 'Programarea a fost anulata.';
            }
        }

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $data_response;

    }

    // =====================================
    // export pdf GET PAGE
    // =====================================

    public function actionExport()
    {
        if (!\Yii::$app->user->getIsGuest()) {
            return $this->render('export-pdf');
        }
        return $this->redirect(['site/index']);
    }

    // =====================================
    // export pdf POST
    // =====================================

    public function actionExportPdf()
    {
        if (!\Yii::$app->user->getIsGuest()) {
            $request = \Yii::$app->request->post();

            $data_export = date('Y-m-d', strtotime($request['data_export']));

            // export pdf pentru lucrator_serviciu
            if(\Yii::$app->user->can('lucrator_serviciu')){
                return $this->exportPDFLucratorServiciu($data_export);

            }else if(\Yii::$app->user->can('director_institutie')){

                // export pdf pentru director structura
                return $this->exportPDFDirectorStructura($data_export);

            }else if(\Yii::$app->user->can('admin_institutie')){

                // export pdf pentru admin_institutie
                $this->exportPDFAdminInstitutie($data_export);

            }else if(\Yii::$app->user->can('admin_minister')){

                // export pdf pentru admin_minister
                $this->exportPDFAdminMinister($data_export);

            }else if(\Yii::$app->user->can('admin')){

                // export pdf pentru admin general system
                $this->exportPDFAdminGeneral($data_export);

            }
        }else{
            return $this->redirect(['site/index']);
        }

    }

    private function exportPDFLucratorServiciu($data_export)
    {
        $programari = Programare::find()
            ->where([
                'and',
                ['programare_lucrator' => \Yii::$app->user->identity->id],
                ['date(programare_datetime)' => $data_export]
            ])
            ->andWhere(['not in', 'programare_este_anulata', [3, 9]])
            ->all();

        $content = $this->renderPartial('export-lucrator-serviciu', ['programari' => $programari, 'data_export' => $data_export]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => 'RO/ro',
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_LANDSCAPE,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.table-flex thead tr{display:flex; flex-direction:row; align-items:center;justify-content:center;}',
            // set mPDF properties on the fly
            'options' => ['title' => 'SNIMP - export programari'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['SNIMP - Export Programari - Rol: LUCRATOR SERVICIU'],
                'SetFooter'=>['Generat la data de '.date('d-m-Y h:i:s').' - Pagina {PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    private function exportPDFDirectorStructura($data_export)
    {
        $datePuncteLucru = [];

        $puncteLucru = StructuriSubordonatePuncteLucru::find()
            ->where(['structura_subordonata_id_sspl' => \Yii::$app->user->identity->institutie_subordonata_id])
            ->select(['id_sspl', 'localitate_id_sspl', 'strada_sspl', 'numar_strada_sspl'])
            ->all();

        foreach ($puncteLucru as $punct){
            $datePunctLucruIndividual = [
                'id_punct_lucru' => $punct->id_sspl,
                'denumire_punct_lucru' => Localitate::findOne($punct->localitate_id_sspl)->localitate_nume.'-'.$punct->strada_sspl.'-'.$punct->numar_strada_sspl,
                'programari_punct_lucru' => Programare::find()
                    ->where(['date(programare_datetime)' => $data_export])
                    ->andWhere(['not in', 'programare_este_anulata', [3, 9]])
                    ->andWhere(['programare_punct_lucru' => $punct->id_sspl])
                    ->all()
            ];

            $datePuncteLucru[] = $datePunctLucruIndividual;
        }

        $content = $this->renderPartial('export-director-structura', ['datePuncteLucru' => $datePuncteLucru, 'data_export' => $data_export]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => 'RO/ro',
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_LANDSCAPE,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '',
            // set mPDF properties on the fly
            'options' => ['title' => 'SNIMP - export programari'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['SNIMP - Export Programari - Rol: DIRECTOR STRUCTURA'],
                'SetFooter'=>['Generat la data de '.date('d-m-Y h:i:s').' - Pagina {PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();

    }

    private function exportPDFAdminInstitutie($data_export)
    {
        var_dump($data_export);
        die();
    }

    private function exportPDFAdminMinister($data_export)
    {
        var_dump($data_export);
        die();
    }

    private function exportPDFAdminGeneral($data_export)
    {
        var_dump($data_export);
        die();
    }
}
