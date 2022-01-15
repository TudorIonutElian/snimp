<?php

namespace frontend\controllers;

use common\models\AuthItemChild;
use common\models\AuthItemChildSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AuthItemChildController implements the CRUD actions for AuthItemChild model.
 */
class AuthItemChildController extends Controller
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
     * Lists all AuthItemChild models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin')){
            $searchModel = new AuthItemChildSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        return  $this->redirect(['site/index']);

    }

    /**
     * Displays a single AuthItemChild model.
     * @param string $parent Parent
     * @param string $child Child
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($parent, $child)
    {
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin')){
            return $this->render('view', [
                'model' => $this->findModel($parent, $child),
            ]);
        }
        return  $this->redirect(['site/index']);

    }

    /**
     * Creates a new AuthItemChild model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin')){
            $model = new AuthItemChild();

            if ($this->request->isPost) {
                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'parent' => $model->parent, 'child' => $model->child]);
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }
        return  $this->redirect(['site/index']);

    }

    /**
     * Updates an existing AuthItemChild model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $parent Parent
     * @param string $child Child
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($parent, $child)
    {
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin')){
            $model = $this->findModel($parent, $child);

            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'parent' => $model->parent, 'child' => $model->child]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
        return  $this->redirect(['site/index']);

    }

    /**
     * Deletes an existing AuthItemChild model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $parent Parent
     * @param string $child Child
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($parent, $child)
    {
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin')){
            $this->findModel($parent, $child)->delete();

            return $this->redirect(['index']);
        }
        return  $this->redirect(['site/index']);
;
    }

    /**
     * Finds the AuthItemChild model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $parent Parent
     * @param string $child Child
     * @return AuthItemChild the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($parent, $child)
    {
        if (($model = AuthItemChild::findOne(['parent' => $parent, 'child' => $child])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
