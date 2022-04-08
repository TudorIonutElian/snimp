<?php

namespace frontend\controllers;

use common\models\Judet;
use common\models\JudetSearch;
use Yii;
use yii\base\Exception;
use yii\bootstrap4\Modal;
use yii\db\Query;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * JudetController implements the CRUD actions for Judet model.
 */
class JudetController extends Controller
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
     * Lists all Judet models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (SystemController::userIsAdmin()) {
            $searchModel = new JudetSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        return $this->redirect(['site/index']);
    }

    /**
     * Displays a single Judet model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (SystemController::userIsAdmin()) {

            return $this->renderAjax('view', [
                'model' => $this->findModel($id),
            ]);
        }
        return $this->redirect(['site/index']);
    }

    /**
     * Finds the Judet model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Judet the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Judet::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Creates a new Judet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (SystemController::userIsAdmin()) {
            $model = new Judet();

            if ($this->request->isPost) {
                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
        return $this->redirect(['site/index']);
    }

    /**
     * Updates an existing Judet model.
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

            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
        return $this->redirect(['site/index']);
    }

    /**
     * Deletes an existing Judet model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (SystemController::userIsAdmin()) {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
        return $this->redirect(['site/index']);
    }

    /*=======================================================================
    * ================ ADAUGARE JUDET MODAL  ==============================
    * =======================================================================*/
    public static function renderAddModal(){
        Modal::begin([
            'title' => '<h2 
            class="text-center text-success font-weight-bold d-flex flex-row align-content-center justify-content-center"
            style="width: 100%">Adăugare Județ Nou</h2>',
            'id' => 'modal-adaugare-judet',
            'size' => 'modal-md',
        ]);

        echo '<div id="modal-adaugare-judet-content"></div>';

        Modal::end();
    }

    /*=======================================================================
    * ================ ACTUALIZARE JUDET MODAL    ===========================
    * =======================================================================*/

    public static function renderUpdateModal(){
        Modal::begin([
            'title' => '<h2 
            class="text-center text-success font-weight-bold d-flex flex-row align-content-center justify-content-center"
            style="width: 100%">Editare Județ</h2>',
            'id' => 'modal-editare-judet',
            'size' => 'modal-md',
        ]);

        echo '<div id="modal-editare-judet-content"></div>';

        Modal::end();
    }

    /*=======================================================================
    * ================ VIZUALIZARE JUDET MODAL    ===========================
    * =======================================================================*/

    public static function renderViewModal(){
        Modal::begin([
            'title' => '<h2 
            class="text-center text-success font-weight-bold d-flex flex-row align-content-center justify-content-center"
            style="width: 100%">Vizualizare Județ</h2>',
            'id' => 'modal-vizualizare-judet',
            'size' => 'modal-md',
        ]);

        echo '<div id="modal-vizualizare-judet-content"></div>';

        Modal::end();
    }

    public function actionJudeteByName($id_regiune, $q = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'judet_nume' => '']];
        $data = null;

        if (is_null($q)) {

            $query = new Query;
            $query->select('id, judet_nume AS text')
                ->from('judet')
                ->where('judet.judet_regiune='.$id_regiune)
                ->limit(20);

            $command = $query->createCommand();
            try {
                $data = $command->queryAll();
            } catch (Exception $e) {
            }
            $out['results'] = array_values($data);

        } else {
            $query = new Query;
            $query->select('id, judet_nume AS text')
                ->from('judet')
                ->where(['like', 'judet_nume', $q])
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
