<?php

namespace frontend\controllers;

use common\models\TipuriServiciu;
use common\models\TipuriServiciuSearch;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * TipuriServiciuController implements the CRUD actions for TipuriServiciu model.
 */
class TipuriServiciuController extends Controller
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
     * Lists all TipuriServiciu models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (SystemController::userIsAdmin()) {
            $searchModel = new TipuriServiciuSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        return $this->redirect(['site/index']);
    }

    /**
     * Displays a single TipuriServiciu model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (SystemController::userIsAdmin()) {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
        return $this->redirect(['site/index']);
    }

    /**
     * Finds the TipuriServiciu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return TipuriServiciu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TipuriServiciu::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Creates a new TipuriServiciu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (SystemController::userIsAdmin()) {
            $model = new TipuriServiciu();

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
     * Updates an existing TipuriServiciu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (SystemController::userIsAdmin()) {
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
     * Deletes an existing TipuriServiciu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (SystemController::userIsAdmin()) {
            $this->findModel($id)->delete();
        }
        return $this->redirect(['index']);
    }
}
