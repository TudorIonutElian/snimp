<?php

namespace frontend\controllers;

use common\models\InstitutiiServicii;
use common\models\Prestari;
use common\models\PrestariSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PrestariController implements the CRUD actions for Prestari model.
 */
class PrestariController extends Controller
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
     * Lists all Prestari models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PrestariSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Prestari model.
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
     * Creates a new Prestari model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Prestari();

        if ($this->request->isPost) {

            $request = \Yii::$app->request->post();
            $prestareNoua = $this->adaugaPrestare($request["Prestari"]);
            if($prestareNoua){
                return $this->redirect(['view', 'id' => $prestareNoua->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    private function adaugaPrestare($data){
        $prestareNoua = new Prestari();
        $prestareNoua->institutie_id_p      = $data["institutie_id_p"];
        $prestareNoua->serviciu_id_p        = $data["serviciu_id_p"];
        $prestareNoua->denumire_p           = $data["denumire_p"];

        // preluare valori de la institutiiServicii
        $dataInstitutiiServicii             = InstitutiiServicii::find()
                                                                ->where(['is_institutie' => $data["institutie_id_p"], 'is_serviciu' => $data["serviciu_id_p"]])
                                                                ->select(['is_open_weekend', 'is_open_nonstop'])
                                                                ->one();

        $prestareNoua->is_open_weekend = $dataInstitutiiServicii->is_open_weekend;
        $prestareNoua->is_open_nonstop = $dataInstitutiiServicii->is_open_nonstop;

        if($prestareNoua->save()){
            return $prestareNoua;
        }

        return NULL;
    }

    /**
     * Updates an existing Prestari model.
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
     * Deletes an existing Prestari model.
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
     * Finds the Prestari model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Prestari the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Prestari::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
