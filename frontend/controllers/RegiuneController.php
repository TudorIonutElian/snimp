<?php

namespace frontend\controllers;

use common\models\Regiune;
use common\models\RegiuneSearch;
use Yii;
use yii\base\Exception;
use yii\bootstrap4\Modal;
use yii\db\Query;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * RegiuneController implements the CRUD actions for Regiune model.
 */
class RegiuneController extends Controller
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
     * Lists all Regiune models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (SystemController::userIsAdmin()) {
            $searchModel = new RegiuneSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        return $this->redirect(['site/index']);
    }

    /**
     * Displays a single Regiune model.
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
     * Creates a new Regiune model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (SystemController::userIsAdmin()) {
            $model = new Regiune();

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
     * Updates an existing Regiune model.
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
     * Deletes an existing Regiune model.
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

    /**
     * Finds the Regiune model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Regiune the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Regiune::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /*=======================================================================
    * ================ ADAUGARE REGIUNE MODAL  ==============================
    * =======================================================================*/
    public static function renderAddModal(){
        Modal::begin([
            'title' => '<h2 
            class="text-center text-success font-weight-bold d-flex flex-row align-content-center justify-content-center"
            style="width: 100%">Adăugare Regiune Nouă</h2>',
            'id' => 'modal-adaugare-regiune',
            'size' => 'modal-md',
        ]);

        echo '<div id="modal-adaugare-regiune-content"></div>';

        Modal::end();
    }

    /*=======================================================================
    * ================ ACTUALIZARE REGIUNE MODAL  ===========================
    * =======================================================================*/

    public static function renderUpdateModal(){
        Modal::begin([
            'title' => '<h2 
            class="text-center text-success font-weight-bold d-flex flex-row align-content-center justify-content-center"
            style="width: 100%">Editare regiune</h2>',
            'id' => 'modal-editare-regiune',
            'size' => 'modal-md',
        ]);

        echo '<div id="modal-editare-regiune-content"></div>';

        Modal::end();
    }

    /*=======================================================================
    * ================ VIZUALIZARE REGIUNE MODAL  ===========================
    * =======================================================================*/

    public static function renderViewModal(){
        Modal::begin([
            'title' => '<h2 
            class="text-center text-success font-weight-bold d-flex flex-row align-content-center justify-content-center"
            style="width: 100%">Vizualizare regiune</h2>',
            'id' => 'modal-vizualizare-regiune',
            'size' => 'modal-md',
        ]);

        echo '<div id="modal-vizualizare-regiune-content"></div>';

        Modal::end();
    }

    public function actionRegiuniByName($q = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'regiune_nume' => '']];
        $data = null;

        if (is_null($q)) {

            $query = new Query;
            $query->select('id, regiune_nume AS text')
                ->from('regiune')
                ->limit(20);

            $command = $query->createCommand();
            try {
                $data = $command->queryAll();
            } catch (Exception $e) {
            }
            $out['results'] = array_values($data);

        } else {
            $query = new Query;
            $query->select('id, regiune_nume AS text')
                ->from('regiune')
                ->where(['like', 'regiune_nume', $q])
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
