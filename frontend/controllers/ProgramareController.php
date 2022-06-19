<?php

namespace frontend\controllers;

use common\models\FormProgramare;
use common\models\Institutie;
use common\models\Judet;
use common\models\Localitate;
use common\models\Programare;
use common\models\ProgramareSearch;
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
        if(!\Yii::$app->user->getIsGuest()){
            $searchModel = new ProgramareSearch();

            if(\Yii::$app->user->can('admin')){
                $dataProvider = $searchModel->search($this->request->queryParams);
            }else if(\Yii::$app->user->can('admin_minister')){
                $dataProvider = $searchModel->searchAdminMinister($this->request->queryParams);
            }else if(\Yii::$app->user->can('admin_institutie')){
                $dataProvider = $searchModel->searchAdminInstitutie($this->request->queryParams);
            }else if(\Yii::$app->user->can('director_institutie')){
                $dataProvider = $searchModel->searchAdminStructura($this->request->queryParams);
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

            if($programareSalvata){
                return $this->redirect([
                    'programare/create',
                    'judetul' => $judetul,
                    'action' => 'salvare',
                    'result' => 200
                ]);
            }else{
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
        $programareNoua->programare_serviciu = (int) $formProgramare["programare_serviciu"];
        $programareNoua->programare_prestare = $formProgramare["programare_prestare"];
        $programareNoua->programare_punct_lucru = $formProgramare["programare_punct_lucru"];
        $programareNoua->programare_datetime = $formProgramare["programare_data"];
        $programareNoua->programare_email = $formProgramare["programare_email"];
        $programareNoua->programare_nume = $formProgramare["programare_nume"];
        $programareNoua->programare_prenume = $formProgramare["programare_prenume"];

        if(!\Yii::$app->user->getIsGuest()){
            $programareNoua->programare_user = \Yii::$app->user->identity->id;
        }

        return $programareNoua->save();
    }

    /**
     * Updates an existing Programare model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Programare model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionStatistici(){
        return $this->render('statistici');
    }

    public function actionValideazaProgramare(){
        $dataResponse = [
            'response_code' => 0,
            'response_message' => 'Request initiat'
        ];

        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin_institutie')){

            $requestData = \Yii::$app->request->post();
            $id_programare = $requestData["id_progamare"];

            $programareExistenta = \common\models\Programare::findOne($id_programare);

            if($programareExistenta != NULL){

                // verificare daca programarea este din cadrul institutiei
                if($programareExistenta->programare_institutie == \Yii::$app->user->identity->institutie_id){
                    $programareExistenta->programare_validata_de = \Yii::$app->user->identity->id;
                    $programareExistenta->programare_numar_unic = \Yii::$app->security->generateRandomString(10);
                    date_default_timezone_set('Europe/Bucharest');
                    $programareExistenta->programare_data_numar_unic = date('Y-m-d');

                    if($programareExistenta->save()){
                        $dataResponse = [
                            'response_code' => 200,
                            'response_message' => 'Programarea a fost validată.'
                        ];
                    }else{
                        $dataResponse = [
                            'response_code' => 500,
                            'response_message' => 'A apărut o eroare.'
                        ];
                    }

                }else{
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
}
