<?php

namespace frontend\controllers;

use common\models\Localitate;
use common\models\LocalitateSearch;
use Throwable;
use Yii;
use yii\db\Exception;
use yii\db\Query;
use yii\db\StaleObjectException;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * LocalitateController implements the CRUD actions for Localitate model.
 */
class LocalitateController extends Controller
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
     * Lists all Localitate models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (SystemController::userIsAdmin()) {
            $searchModel = new LocalitateSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        return $this->redirect(['site/index']);
    }

    /**
     * Displays a single Localitate model.
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
     * Creates a new Localitate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (SystemController::userIsAdmin()) {
            $model = new Localitate();

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
     * Updates an existing Localitate model.
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
     * Deletes an existing Localitate model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function actionDelete($id)
    {
        if (SystemController::userIsAdmin()) {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
        return $this->redirect(['site/index']);
    }

    /**
     * Finds the Localitate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Localitate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Localitate::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionLocalitatiByName($q = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'localitate_nume' => '']];
        $data = null;

        if (is_null($q)) {

            $query = new Query;
            $query->select('id, localitate_nume AS text')
                ->from('localitate')
                ->limit(20);
            $command = $query->createCommand();
            try {
                $data = $command->queryAll();
            } catch (Exception $e) {
            }
            $out['results'] = array_values($data);

        } else {
            $query = new Query;
            $query->select('id, localitate_nume AS text')
                ->from('localitate')
                ->where(['like', 'localitate_nume', $q])
                ->limit(20);
            $command = $query->createCommand();
            try {
                $data = $command->queryAll();
            } catch (Exception $e) {
            }
            $out['results'] = array_values($data);
        }
        return $out;
    }
}
