<?php

namespace frontend\controllers;

use common\models\InstitutiiExceptii;
use common\models\InstitutiiExceptiiSearch;
use common\models\TipuriExceptie;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InstitutiiExceptiiController implements the CRUD actions for InstitutiiExceptii model.
 */
class InstitutiiExceptiiController extends Controller
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
     * Lists all InstitutiiExceptii models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new InstitutiiExceptiiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InstitutiiExceptii model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new InstitutiiExceptii model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new InstitutiiExceptii();

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

    /**
     * Updates an existing InstitutiiExceptii model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing InstitutiiExceptii model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the InstitutiiExceptii model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return InstitutiiExceptii the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InstitutiiExceptii::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public static function getExceptiiDisponibile(){
        // preluare id minister
        $minister_id = Yii::$app->user->identity->minister_id;

        // preluare execeptii din cadrul ministerului
        $minister_exceptii = \common\models\MinistereExceptii::find()->where(['minister_id' => $minister_id])->select(['exceptie_id'])->all();
        $minister_exceptii_id = array_column($minister_exceptii, "exceptie_id");


        // preluare exceptii deja adaugate pentru institutia respectiva

        $institutie_exceptii = \common\models\InstitutiiExceptii::find()->where(['institutie_id' => Yii::$app->user->identity->institutie_id])->select(['exceptie_id'])->all();
        $institutie_exceptii_id = array_column($institutie_exceptii, "exceptie_id");

        // preluare exceptii in baza celor existente la nivelul ministerului
        $exceptii_disponibile = TipuriExceptie::find()
            ->where(['in', 'id', $minister_exceptii_id])
            ->andWhere(['not in', 'id', $institutie_exceptii_id])
            ->select(['id', 'te_exceptie_denumire'])
            ->all();

        return $exceptii_disponibile;
    }
}
