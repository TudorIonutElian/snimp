<?php

namespace frontend\controllers;

use common\models\InstitutiiStructuriSubordonate;
use common\models\InstitutiiStructuriSubordonateSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InstitutiiStructuriSubordonateController implements the CRUD actions for InstitutiiStructuriSubordonate model.
 */
class InstitutiiStructuriSubordonateController extends Controller
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
     * Lists all InstitutiiStructuriSubordonate models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new InstitutiiStructuriSubordonateSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InstitutiiStructuriSubordonate model.
     * @param int $id_iss Id Iss
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_iss)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_iss),
        ]);
    }

    /**
     * Creates a new InstitutiiStructuriSubordonate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new InstitutiiStructuriSubordonate();


        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {

                return $this->redirect(['view', 'id_iss' => $model->id_iss]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing InstitutiiStructuriSubordonate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_iss Id Iss
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_iss)
    {
        $model = $this->findModel($id_iss);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_iss' => $model->id_iss]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing InstitutiiStructuriSubordonate model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_iss Id Iss
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_iss)
    {
        $this->findModel($id_iss)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the InstitutiiStructuriSubordonate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_iss Id Iss
     * @return InstitutiiStructuriSubordonate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_iss)
    {
        if (($model = InstitutiiStructuriSubordonate::findOne(['id_iss' => $id_iss])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
