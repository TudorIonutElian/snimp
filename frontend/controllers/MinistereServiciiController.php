<?php

namespace frontend\controllers;

use common\models\MinistereServicii;
use common\models\MinistereServiciiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MinistereServiciiController implements the CRUD actions for MinistereServicii model.
 */
class MinistereServiciiController extends Controller
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
     * Lists all MinistereServicii models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin_minister')){
            $searchModel = new MinistereServiciiSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        return $this->redirect(['site/index']);
    }

    /**
     * Creates a new MinistereServicii model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin_minister')){
            return $this->redirect(['site/index']);
            $model = new MinistereServicii();

            if ($this->request->isPost) {
                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['index']);
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }

        return $this->redirect(['site/index']);

    }


    /**
     * Deletes an existing MinistereServicii model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin_minister')){
            // verificare daca ministerul e la fel

            $model = $this->findModel($id);
            if($model->minister_id === \Yii::$app->user->identity->minister_id){
                $model->delete();
                return $this->redirect(['index']);
            }
            return $this->redirect(['index']);
        }
        return $this->redirect(['site/index']);
    }

    /**
     * Finds the MinistereServicii model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return MinistereServicii the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MinistereServicii::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
