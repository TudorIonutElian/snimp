<?php

namespace frontend\controllers;

use common\models\ServiciiExceptii;
use common\models\ServiciiExceptiiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ServiciiExceptiiController implements the CRUD actions for ServiciiExceptii model.
 */
class ServiciiExceptiiController extends Controller
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
     * Lists all ServiciiExceptii models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServiciiExceptiiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ServiciiExceptii model.
     * @param int $id_se Id Se
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_se)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_se),
        ]);
    }

    /**
     * Creates a new ServiciiExceptii model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ServiciiExceptii();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_se' => $model->id_se]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ServiciiExceptii model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_se Id Se
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_se)
    {
        $model = $this->findModel($id_se);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_se' => $model->id_se]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ServiciiExceptii model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_se Id Se
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_se)
    {
        $this->findModel($id_se)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ServiciiExceptii model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_se Id Se
     * @return ServiciiExceptii the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_se)
    {
        if (($model = ServiciiExceptii::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
