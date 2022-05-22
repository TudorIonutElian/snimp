<?php

namespace frontend\controllers;

use common\models\StructuriSubordonatePuncteLucru;
use common\models\StructuriSubordonatePuncteLucruSearch;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

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

    /**
     * Creates a new StructuriSubordonatePuncteLucru model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new StructuriSubordonatePuncteLucru();

        if ($this->request->isPost) {
            $request = \Yii::$app->request->post();
            $datePunctLucru = $request["StructuriSubordonatePuncteLucru"];
            $punctLucruAdaugat = $this->adaugaPunctLucru($datePunctLucru);

            if($punctLucruAdaugat){
                return $this->redirect(['structuri-subordonate-puncte-lucru/index']);
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    private function adaugaPunctLucru($data)
    {
        $punctLucruNou = new StructuriSubordonatePuncteLucru();
        $punctLucruNou->minister_id_sspl = \Yii::$app->user->identity->minister_id;
        $punctLucruNou->institutie_id_sspl = \Yii::$app->user->identity->institutie_id;

        if(\Yii::$app->user->can('admin_institutie')){
            if ($data["structura_subordonata_id_sspl"] && (int)$data["structura_subordonata_id_sspl"] > 0) {
                $punctLucruNou->structura_subordonata_id_sspl = $data["structura_subordonata_id_sspl"];
            }else {
                $punctLucruNou->structura_subordonata_id_sspl = NULL;
            }
        }else if(\Yii::$app->user->can('director_institutie')){
            $punctLucruNou->structura_subordonata_id_sspl = \Yii::$app->user->identity->institutie_subordonata_id;
        }



        $punctLucruNou->localitate_id_sspl = $data["localitate_id_sspl"];
        $punctLucruNou->strada_sspl = $data["strada_sspl"];
        $punctLucruNou->numar_strada_sspl = $data["numar_strada_sspl"];
        $punctLucruNou->bloc_strada_sspl = $data["bloc_strada_sspl"];
        $punctLucruNou->scara_bloc_sspl = $data["scara_bloc_sspl"];
        $punctLucruNou->etaj_bloc_sspl = $data["etaj_bloc_sspl"];
        $punctLucruNou->apartament_sspl = $data["apartament_sspl"];

        if(\Yii::$app->user->can('admin_institutie')){
            $punctLucruNou->aprobat_administrator_sspl = 1;
        }else if(\Yii::$app->user->can('director_institutie')){
            $punctLucruNou->aprobat_administrator_sspl = 0;
        }

        return $punctLucruNou->save();
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
}
