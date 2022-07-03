<?php

namespace frontend\controllers;

use common\models\Programare;
use common\models\StructuriSubordonatePuncteLucru;
use common\models\StructuriSubordonatePuncteLucruSearch;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * StructuriSubordonatePuncteLucruController implements the CRUD actions for StructuriSubordonatePuncteLucru model.
 */
class StructuriSubordonatePuncteLucruController extends Controller
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
     * Lists all StructuriSubordonatePuncteLucru models.
     */
    public function actionIndex()
    {
        if(!\Yii::$app->user->getIsGuest() && (
            \Yii::$app->user->can('admin_institutie') ||
            \Yii::$app->user->can('director_institutie')
            )){
            $searchModel = new StructuriSubordonatePuncteLucruSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        return $this->redirect(['site/index']);

    }

    /**
     * Displays a single StructuriSubordonatePuncteLucru model.
     * @param int $id_sspl Id Sspl
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_sspl)
    {
        if(!\Yii::$app->user->getIsGuest() && (
                \Yii::$app->user->can('admin_institutie') ||
                \Yii::$app->user->can('director_institutie')
            )){
            return $this->render('view', [
                'model' => $this->findModel($id_sspl),
            ]);
        }

        return $this->redirect(['site/index']);

    }

    /**
     * Finds the StructuriSubordonatePuncteLucru model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_sspl Id Sspl
     * @return StructuriSubordonatePuncteLucru the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_sspl)
    {
        if (($model = StructuriSubordonatePuncteLucru::findOne(['id_sspl' => $id_sspl])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Creates a new StructuriSubordonatePuncteLucru model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if(!\Yii::$app->user->getIsGuest() && (
                \Yii::$app->user->can('admin_institutie') ||
                \Yii::$app->user->can('director_institutie')
            )){
            $model = new StructuriSubordonatePuncteLucru();

            if ($this->request->isPost) {
                $request = \Yii::$app->request->post();
                $datePunctLucru = $request["StructuriSubordonatePuncteLucru"];
                $punctLucruAdaugat = $this->adaugaPunctLucru($datePunctLucru);

                if($punctLucruAdaugat){
                    return $this->redirect(['structuri-subordonate-puncte-lucru/index']);
                }

            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }
        return $this->redirect(['site/index']);
    }

    private function adaugaPunctLucru($data)
    {
        $punctLucruNou = new StructuriSubordonatePuncteLucru();
        $punctLucruNou->minister_id_sspl = \Yii::$app->user->identity->minister_id;
        $punctLucruNou->institutie_id_sspl = \Yii::$app->user->identity->institutie_id;

        if(\Yii::$app->user->can('admin_institutie')){
            if ($data["structura_subordonata_id_sspl"] && (int)$data["structura_subordonata_id_sspl"] > 0) {
                $punctLucruNou->structura_subordonata_id_sspl = $data["structura_subordonata_id_sspl"];
            }else {
                $punctLucruNou->structura_subordonata_id_sspl = NULL;
            }
        }else if(\Yii::$app->user->can('director_institutie')){
            $punctLucruNou->structura_subordonata_id_sspl = \Yii::$app->user->identity->institutie_subordonata_id;
        }



        $punctLucruNou->localitate_id_sspl = $data["localitate_id_sspl"];
        $punctLucruNou->strada_sspl = $data["strada_sspl"];
        $punctLucruNou->numar_strada_sspl = $data["numar_strada_sspl"];
        $punctLucruNou->bloc_strada_sspl = $data["bloc_strada_sspl"];
        $punctLucruNou->scara_bloc_sspl = $data["scara_bloc_sspl"];
        $punctLucruNou->etaj_bloc_sspl = $data["etaj_bloc_sspl"];
        $punctLucruNou->apartament_sspl = $data["apartament_sspl"];

        if(\Yii::$app->user->can('admin_institutie')){
            $punctLucruNou->aprobat_administrator_sspl = 1;
        }else if(\Yii::$app->user->can('director_institutie')){
            $punctLucruNou->aprobat_administrator_sspl = 0;
        }

        return $punctLucruNou->save();
    }

    /**
     * Updates an existing StructuriSubordonatePuncteLucru model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_sspl Id Sspl
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_sspl)
    {
        if(!\Yii::$app->user->getIsGuest() && (
                \Yii::$app->user->can('admin_institutie') ||
                \Yii::$app->user->can('director_institutie')
            )){
            $model = $this->findModel($id_sspl);

            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_sspl' => $model->id_sspl]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }

        return $this->redirect(['site/index']);
    }

    /**
     * Deletes an existing StructuriSubordonatePuncteLucru model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_sspl Id Sspl
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_sspl)
    {
        if(!\Yii::$app->user->getIsGuest() && (
                \Yii::$app->user->can('admin_institutie') ||
                \Yii::$app->user->can('director_institutie')
            )){
            $this->findModel($id_sspl)->delete();
            return $this->redirect(['index']);
        }


        return $this->redirect(['site/index']);
    }
    // =============================================================
    // APROBARE A UNUI PUNCT DE LUCRU DE CATRE ADMINISTRATOR
    // =============================================================
    public function actionAprobarePunctLucru(){
        $dataResponse = [
            'response_code' => 0,
            'response_message' => 'Initiat'
        ];

        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin_institutie')){
            if(\Yii::$app->request->isPost){
                $request = \Yii::$app->request->post();
                $punct_lucru_id = (int) $request["punct_lucru_id"];

                // identificare punct de lucru dupa id
                $punctLucru = StructuriSubordonatePuncteLucru::findOne($punct_lucru_id);
                if($punctLucru){
                    $punctLucru->aprobat_administrator_sspl = 1;
                    if($punctLucru->save()){
                        $dataResponse = [
                            'response_code' => 200,
                            'response_message' => 'Punct de lucru aprobat.'
                        ];
                    }else{
                        $dataResponse = [
                            'response_code' => 500,
                            'response_message' => 'Punct de lucru nu a fost salvat.'
                        ];
                    }
                }else{
                    $dataResponse = [
                        'response_code' => 500,
                        'response_message' => 'Punctul de lucru NU a fost identificat.'
                    ];
                }

                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return $dataResponse;

            }
            return $this->redirect(['site/index']);
        }
        return $this->redirect(['site/index']);
    }

    // =============================================================
    // PROPUNERI APROBARE PUNCTE DE LUCRU
    // =============================================================
    public function actionPropuneriAprobare(){
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin_institutie')){
            $searchModel = new StructuriSubordonatePuncteLucruSearch();
            $dataProvider = $searchModel->searchPropuneriAprobare($this->request->queryParams);

            return $this->render('propuneri-aprobare', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        return $this->redirect(['site/index']);
    }

    public function actionSuspenda(){
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('director_institutie')){
            $searchModel = new StructuriSubordonatePuncteLucruSearch();
            $dataProvider = $searchModel->searchSuspendare($this->request->queryParams);

            return $this->render('suspendare', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        return $this->redirect(['site/index']);
    }

    public function actionPropuneriSuspendare(){
        if(!\Yii::$app->user->getIsGuest() && (
            \Yii::$app->user->can('admin_institutie') ||
            \Yii::$app->user->can('director_institutie')
            )){
            $searchModel = new StructuriSubordonatePuncteLucruSearch();
            $dataProvider = $searchModel->searchPropuneriSuspendare($this->request->queryParams);

            return $this->render('propuneri-suspendare', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        return $this->redirect(['site/index']);
    }

    public function actionPropunereSuspendare(){
        $dataResponse = [
            'response_code' => 0,
            'response_message' => 'Initiat'
        ];

        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('director_institutie')){
            $request = \Yii::$app->request->post();
            $punct_lucru_id = (int) $request["punct_lucru_id"];

            // identificare punct de lucru dupa id
            $punctLucru = StructuriSubordonatePuncteLucru::findOne($punct_lucru_id);

            if($punctLucru){
                $punctLucru->aprobat_administrator_sspl = 2;
                if($punctLucru->save()){
                    $dataResponse = [
                        'response_code' => 200,
                        'response_message' => 'Punct de lucru suspendat.'
                    ];
                }else{
                    $dataResponse = [
                        'response_code' => 500,
                        'response_message' => 'Punct de lucru nu a fost suspendat.'
                    ];
                }
            }else{
                $dataResponse = [
                    'response_code' => 500,
                    'response_message' => 'Punctul de lucru NU a fost identificat.'
                ];
            }

            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $dataResponse;
        }
        return $this->redirect(['site/index']);
    }


    public function actionAprobarePropunereSuspendare(){
        $dataResponse = [
            'response_code' => 0,
            'response_message' => 'Initiat'
        ];

        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin_institutie')){
            $request = \Yii::$app->request->post();
            $punct_lucru_id = (int) $request["punct_lucru_id"];

            // identificare punct de lucru dupa id
            $punctLucru = StructuriSubordonatePuncteLucru::findOne($punct_lucru_id);

            if($punctLucru){
                $punctLucru->aprobat_administrator_sspl = 3;
                if($punctLucru->save()){
                    $dataResponse = [
                        'response_code' => 200,
                        'response_message' => 'Punct de lucru suspendat.'
                    ];
                }else{
                    $dataResponse = [
                        'response_code' => 500,
                        'response_message' => 'Punct de lucru nu a fost suspendat.'
                    ];
                }
            }else{
                $dataResponse = [
                    'response_code' => 500,
                    'response_message' => 'Punctul de lucru NU a fost identificat.'
                ];
            }

            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $dataResponse;
        }
        return $this->redirect(['site/index']);
    }

    public function actionRedeschiderePunctLucru(){
        $dataResponse = [
            'response_code' => 0,
            'response_message' => 'Initiat'
        ];

        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin_institutie')){
            $request = \Yii::$app->request->post();
            $punct_lucru_id = (int) $request["punct_lucru_id"];

            // identificare punct de lucru dupa id
            $punctLucru = StructuriSubordonatePuncteLucru::findOne($punct_lucru_id);

            if($punctLucru){
                $punctLucru->aprobat_administrator_sspl = 1;
                if($punctLucru->save()){
                    $dataResponse = [
                        'response_code' => 200,
                        'response_message' => 'Punct de lucru suspendat.'
                    ];
                }else{
                    $dataResponse = [
                        'response_code' => 500,
                        'response_message' => 'Punct de lucru nu a fost suspendat.'
                    ];
                }
            }else{
                $dataResponse = [
                    'response_code' => 500,
                    'response_message' => 'Punctul de lucru NU a fost identificat.'
                ];
            }

            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $dataResponse;
        }
        return $this->redirect(['site/index']);
    }

    public function actionGetIntervalsDisabled(){
        $dataResponse = [
            'response_code' => 0,
            'response_message' => 'Initiat',
            'response_dates' => []
        ];

        $request = \Yii::$app->request->post();
        $punct_lucru_id = (int) $request["_punct_lucru_id"];

        $programariValidate = Programare::find()
            ->where([
                'and',
                ['not', ['programare_numar_unic' => NULL]],
                ['programare_punct_lucru' => $punct_lucru_id]
            ])
            ->select(['programare_datetime'])
            ->all();

        foreach ($programariValidate as $programare){
            $dataResponse['response_dates'][] = date('Y-m-d h:i', strtotime($programare->programare_datetime));
        }

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $dataResponse;
    }
}
