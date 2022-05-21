<?php

namespace frontend\controllers;

use common\models\InstitutiiServicii;
use common\models\InstitutiiServiciiSearch;
use common\models\TipuriServiciu;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InstitutiiServiciiController implements the CRUD actions for InstitutiiServicii model.
 */
class InstitutiiServiciiController extends Controller
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
     * Lists all InstitutiiServicii models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new InstitutiiServiciiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InstitutiiServicii model.
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
     * Creates a new InstitutiiServicii model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new InstitutiiServicii();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing InstitutiiServicii model.
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
     * Deletes an existing InstitutiiServicii model.
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

    /**
     * Finds the InstitutiiServicii model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return InstitutiiServicii the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InstitutiiServicii::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public static function getServiciiByInstitutie($institutie_id){
        $id_servicii = InstitutiiServicii::find()->where(['is_institutie' => $institutie_id])->select(['is_serviciu'])->all();
        $servicii = TipuriServiciu::find()->where(['in', 'id', array_column($id_servicii, "is_serviciu")])->all();

        return $servicii;
    }

    // ========================================================================
    // METODA PENTRU PRELUAREA TUTUTOR SERVICIILOR DIN CADRUL UNEI INSTITUTII
    // ========================================================================
    public function actionGetServiciiByInstitutieId(){
        $dataResponse = [
            'response_code' => 0,
            'response_message' => 'Initial',
            'response_servicii' => NULL
        ];

        $request = Yii::$app->request->post();
        $institutie_id = $request["institutie_id"];

        $servicii_disponibile = $this::getServiciiByInstitutie($institutie_id);

        if(count($servicii_disponibile) > 0){
            $dataResponse['response_code'] = 200;
            $dataResponse['response_message'] = 'Identificate';
            $dataResponse['response_servicii'] = $servicii_disponibile;
        }


        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $dataResponse;
    }
}
