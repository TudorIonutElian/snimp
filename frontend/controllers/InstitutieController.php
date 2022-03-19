<?php

namespace frontend\controllers;

use common\models\Institutie;
use common\models\InstitutieSearch;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * InstitutieController implements the CRUD actions for Institutie model.
 */
class InstitutieController extends Controller
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
     * Lists all Institutie models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (SystemController::userIsAdmin() || SystemController::userIsAdminMinister()) {
            $searchModel = new InstitutieSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        return $this->redirect(['site/index']);
    }

    /**
     * Displays a single Institutie model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (SystemController::userIsAdmin() || SystemController::userIsAdminMinister()) {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }

        return $this->redirect(['site/index']);
    }

    /**
     * Creates a new Institutie model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (SystemController::userIsAdmin() || SystemController::userIsAdminMinister()) {
            $ministere = MinisterController::getMinistere();
            $structuri = StructuraController::getStructuri();

            $model = new Institutie();

            if ($this->request->isPost) {
                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render('create', [
                'model' => $model,
                'ministere' => $ministere,
                'structuri' => $structuri
            ]);
        }
        return $this->redirect(['site/index']);
    }

    /**
     * Updates an existing Institutie model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (SystemController::userIsAdmin() || SystemController::userIsAdminMinister()) {
            $ministere = MinisterController::getMinistere();
            $structuri = StructuraController::getStructuri();

            $model = $this->findModel($id);

            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
                'ministere' => $ministere,
                'structuri' => $structuri
            ]);
        }
        return $this->redirect(['site/index']);
    }

    /**
     * Deletes an existing Institutie model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (SystemController::userIsAdmin() || SystemController::userIsAdminMinister()) {
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }
        return $this->redirect(['site/index']);
    }

    /**
     * Finds the Institutie model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Institutie the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Institutie::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
