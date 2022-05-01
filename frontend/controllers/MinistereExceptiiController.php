<?php

namespace frontend\controllers;

use common\models\MinistereExceptii;
use common\models\MinistereExceptiiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MinistereExceptiiController implements the CRUD actions for MinistereExceptii model.
 */
class MinistereExceptiiController extends Controller
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

    public function actionIndex()
    {
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin_minister')){
            $searchModel = new MinistereExceptiiSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        return $this->redirect(['site/index']);


    }

    public function actionView($id)
    {
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin_minister')){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
        return $this->redirect(['site/index']);
    }

    /**
     * Creates a new MinistereExceptii model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin_minister')){
            $model = new MinistereExceptii();

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
        return $this->redirect(['site/index']);
    }

    /**
     * Updates an existing MinistereExceptii model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin_minister')){
            $model = $this->findModel($id);

            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
        return $this->redirect(['site/index']);

    }

    /**
     * Deletes an existing MinistereExceptii model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin_minister')){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
        return $this->redirect(['site/index']);
    }

    /**
     * Finds the MinistereExceptii model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return MinistereExceptii the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MinistereExceptii::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
