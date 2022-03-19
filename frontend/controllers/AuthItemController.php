<?php

namespace frontend\controllers;

use common\models\AuthItem;
use common\models\AuthItemSearch;
use common\models\User;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AuthItemController implements the CRUD actions for AuthItem model.
 */
class AuthItemController extends Controller
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
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin')){
            $searchModel = new AuthItemSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        return  $this->redirect(['site/login']);

    }

    /**
     * Displays a single AuthItem model.
     * @param string $name Name
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($name)
    {
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin')){
            return $this->render('view', [
                'model' => $this->findModel($name),
            ]);
        }
        return  $this->redirect(['site/login']);
    }

    /**
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin')){
            $model = new AuthItem();

            if ($this->request->isPost) {
                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'name' => $model->name]);
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }
        return  $this->redirect(['site/login']);
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $name Name
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($name)
    {
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin')){
            $model = $this->findModel($name);

            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'name' => $model->name]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
        return  $this->redirect(['site/login']);
    }

    /**
     * Deletes an existing AuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $name Name
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($name)
    {
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin')){
            $this->findModel($name)->delete();

            return $this->redirect(['index']);
        }
        return  $this->redirect(['site/login']);
    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $name Name
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($name)
    {
        if (($model = AuthItem::findOne($name)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public static function getRoluri(){
        $roluri = NULL;

        if(Yii::$app->user->can('admin')){
            $roluri = AuthItem::find()
                                    ->where(['type' => 1])
                                    ->asArray()
                                    ->select(['name', 'data'])
                                    ->all();
        }else if(Yii::$app->user->can('admin_minister')){
            $roluri = AuthItem::find()
                        ->where(['in', 'name', [
                            'admin_minister',
                            'admin_institutie'
                        ]])
                        ->select(['name', 'data'])
                        ->asArray()
                        ->all();
        }
        return $roluri;
    }
}
