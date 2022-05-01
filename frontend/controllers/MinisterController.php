<?php

namespace frontend\controllers;

use common\models\Minister;
use common\models\MinisterSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MinisterController implements the CRUD actions for Minister model.
 */
class MinisterController extends Controller
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
     * Lists all Minister models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin')){

            $searchModel = new MinisterSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        return $this->redirect(['site/index']);

    }

    /**
     * Displays a single Minister model.
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
        return $this->redirect(['site/index']);

    }

    /**
     * Creates a new Minister model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin')){
            $model = new Minister();

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
     * Updates an existing Minister model.
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
        return $this->redirect(['site/index']);
    }

    /**
     * Deletes an existing Minister model.
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

        return $this->redirect(['site/index']);
    }

    /**
     * Finds the Minister model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Minister the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Minister::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public static function getMinistere(){
        $ministere = NULL;

        if(Yii::$app->user->can('admin')){
            $ministere = Minister::find()->asArray()->select(['id', 'minister_denumire'])->all();
        }else if(Yii::$app->user->can('admin_minister')){
            $ministere = Minister::find()->where(['id' => Yii::$app->user->identity->minister_id])->asArray()->select(['id', 'minister_denumire'])->all();
        }else if(Yii::$app->user->can('admin_institutie')){
            $ministere = Minister::find()->where(['id' => Yii::$app->user->identity->minister_id])->asArray()->select(['id', 'minister_denumire'])->all();
        }        else if(Yii::$app->user->can('director_institutie')){
            $ministere = Minister::find()->where(['id' => Yii::$app->user->identity->minister_id])->asArray()->select(['id', 'minister_denumire'])->all();
        }
        return $ministere;
    }
}
