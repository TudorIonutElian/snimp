<?php

namespace frontend\controllers;

use common\models\InstitutiiServicii;
use common\models\StructuriSubordonateServicii;
use common\models\StructuriSubordonateServiciiSearch;
use common\models\TipuriServiciu;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StructuriSubordonateServiciiController implements the CRUD actions for StructuriSubordonateServicii model.
 */
class StructuriSubordonateServiciiController extends Controller
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
     * Lists all StructuriSubordonateServicii models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StructuriSubordonateServiciiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StructuriSubordonateServicii model.
     * @param int $id_sss Id Sss
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_sss)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_sss),
        ]);
    }

    /**
     * Creates a new StructuriSubordonateServicii model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new StructuriSubordonateServicii();

        // preluare servicii ale institutiei parinte
        $servicii = InstitutiiServiciiController::getServiciiByInstitutie(\Yii::$app->user->identity->institutie_id);
        $serviciiParinteArray = array_column($servicii, "id");

        // preluare servicii care sunt deja adaugate
        $serviciiAdaugateDeja = StructuriSubordonateServicii::find()
            ->where([
                'and',
                ['institutie_id_sss' => \Yii::$app->user->identity->institutie_id],
                ['structura_subordonata_id_sss' => \Yii::$app->user->identity->institutie_subordonata_id]
            ])->select(['serviciu_id_sss'])->all();

        $serviciiAdaugateDejaArray = array_column($serviciiAdaugateDeja, "serviciu_id_sss");

        $serviciiFinale = array_diff($serviciiParinteArray, $serviciiAdaugateDejaArray);


        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $serviciuAdaugat = $this->adaugaServiciiToStructura($model);
                return $this->redirect(['view', 'id_sss' => $serviciuAdaugat->id_sss]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'servicii' => $servicii
        ]);
    }

    private function adaugaServiciiToStructura($data){
        $serviciuNou = new StructuriSubordonateServicii();
        $serviciuNou->institutie_id_sss = \Yii::$app->user->identity->institutie_id;
        $serviciuNou->structura_subordonata_id_sss = \Yii::$app->user->identity->institutie_subordonata_id;
        $serviciuNou->serviciu_id_sss = $data->serviciu_id_sss;
        $serviciuNou->localitate_id_sss = $data->localitate_id_sss;
        $serviciuNou->is_open_weekend_sss = $data->is_open_weekend_sss;
        $serviciuNou->is_open_nonstop_sss = $data->is_open_nonstop_sss;
        $serviciuNou->is_active_sss = $data->is_active_sss;

        if($serviciuNou->save()){
            return $serviciuNou;
        }
    }

    /**
     * Updates an existing StructuriSubordonateServicii model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_sss Id Sss
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_sss)
    {
        $model = $this->findModel($id_sss);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_sss' => $model->id_sss]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing StructuriSubordonateServicii model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_sss Id Sss
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_sss)
    {
        $this->findModel($id_sss)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StructuriSubordonateServicii model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_sss Id Sss
     * @return StructuriSubordonateServicii the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_sss)
    {
        if (($model = StructuriSubordonateServicii::findOne(['id_sss' => $id_sss])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGetServiciiByStructuraId(){
        if(!\Yii::$app->user->getIsGuest()){
            $request = \Yii::$app->request->post();
            $structura_subordonata_id = $request["_structura_subordonata_id"];

            $serviciileStructuriiSubordonate = StructuriSubordonateServicii::find()
                ->where(['structura_subordonata_id_sss' => $structura_subordonata_id])
                ->select(['serviciu_id_sss'])
                ->all();

            $serviciileOriginale = TipuriServiciu::find()
                ->where(['in', 'id', array_column($serviciileStructuriiSubordonate, 'serviciu_id_sss')])
                ->select(['id', 'tip_serviciu_denumire'])
                ->orderBy(['tip_serviciu_denumire' => SORT_ASC])
                ->all();

            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $serviciileOriginale;
        }

        return $this->redirect(['site/index']);
    }
}
