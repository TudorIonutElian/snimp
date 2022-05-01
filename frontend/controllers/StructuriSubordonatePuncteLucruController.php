<?php

namespace frontend\controllers;

use common\models\StructuriSubordonatePuncteLucru;
use common\models\StructuriSubordonatePuncteLucruSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StructuriSubordonatePuncteLucruController implements the CRUD actions for StructuriSubordonatePuncteLucru model.
 */
class StructuriSubordonatePuncteLucruController extends Controller
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
     * Lists all StructuriSubordonatePuncteLucru models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StructuriSubordonatePuncteLucruSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StructuriSubordonatePuncteLucru model.
     * @param int $id_sspl Id Sspl
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_sspl)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_sspl),
        ]);
    }

    /**
     * Creates a new StructuriSubordonatePuncteLucru model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new StructuriSubordonatePuncteLucru();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_sspl' => $model->id_sspl]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing StructuriSubordonatePuncteLucru model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_sspl Id Sspl
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_sspl)
    {
        $model = $this->findModel($id_sspl);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_sspl' => $model->id_sspl]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing StructuriSubordonatePuncteLucru model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_sspl Id Sspl
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_sspl)
    {
        $this->findModel($id_sspl)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StructuriSubordonatePuncteLucru model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_sspl Id Sspl
     * @return StructuriSubordonatePuncteLucru the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_sspl)
    {
        if (($model = StructuriSubordonatePuncteLucru::findOne(['id_sspl' => $id_sspl])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
