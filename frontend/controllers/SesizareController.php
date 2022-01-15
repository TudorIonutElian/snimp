<?php

namespace frontend\controllers;

use common\models\Sesizare;
use common\models\SesizareSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SesizareController implements the CRUD actions for Sesizare model.
 */
class SesizareController extends Controller
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
     * Lists all Sesizare models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin')){
            $searchModel = new SesizareSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        return  $this->redirect(['site/index']);
    }

    /**
     * Displays a single Sesizare model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin')){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
        return  $this->redirect(['site/index']);

    }

    /**
     * Creates a new Sesizare model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sesizare();

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
     * Updates an existing Sesizare model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin')){
            $model = $this->findModel($id);

            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
        return  $this->redirect(['site/index']);

    }

    /**
     * Deletes an existing Sesizare model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin')){
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }
        return  $this->redirect(['site/index']);

    }

    /**
     * Finds the Sesizare model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Sesizare the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sesizare::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
