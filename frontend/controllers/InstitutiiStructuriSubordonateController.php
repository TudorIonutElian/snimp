<?php

namespace frontend\controllers;

use common\models\Institutie;
use common\models\InstitutiiStructuriSubordonate;
use common\models\InstitutiiStructuriSubordonateSearch;
use common\models\StructuriSubordonatePuncteLucru;
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

    public static function getStructuriSubordonate()
    {
        $structuriSubordonate = [];
        if (!\Yii::$app->user->getIsGuest()) {
            if (\Yii::$app->user->can('admin')) {
                $institutii = InstitutiiStructuriSubordonate::find()->all();
            } else if (\Yii::$app->user->can('admin_minister')) {
                $institutiiMinister = Institutie::find()
                    ->where(['institutie_minister_id' => Yii::$app->user->identity->minister_id])
                    ->select(['id'])
                    ->all();
                $institutiiMinisterArray = array_column($institutiiMinister, "id");

                $structuriSubordonate = InstitutiiStructuriSubordonate::find()
                    ->where(['in', 'institutie_parinte_iss', $institutiiMinisterArray])
                    ->all();
            } else if (\Yii::$app->user->can('admin_institutie')) {
                $structuriSubordonate = InstitutiiStructuriSubordonate::find()
                    ->where(['institutie_parinte_iss' => \Yii::$app->user->identity->institutie_id])
                    ->all();
            }else if(Yii::$app->user->can('director_institutie')){
                $structuriSubordonate = InstitutiiStructuriSubordonate::find()
                    ->where(['institutie_parinte_iss' => \Yii::$app->user->identity->institutie_id])
                    ->andWhere(['id_iss' => Yii::$app->user->identity->institutie_subordonata_id])
                    ->all();
            }
        }

        return $structuriSubordonate;
    }

    public function actionGetPuncteLucruByStructuraId()
    {
        $dataResponse = [
            'response_code' => 0,
            'response_message' => 'Initial',
            'response_puncte_lucru' => NULL
        ];

        $request = Yii::$app->request->post();
        $structura_id = $request["structura_id"];

        $puncteLucru = StructuriSubordonatePuncteLucru::find()
            ->joinWith('localitate', 'structuri_subordonate_puncte_lucru.localitate_id_sspl = localitate.id')
            ->where(['structura_subordonata_id_sspl' => (int) $structura_id])
            ->andWhere([''])
            ->select([
                'id_sspl',
                'strada_sspl',
                'numar_strada_sspl',
                'bloc_strada_sspl',
                'scara_bloc_sspl',
                'etaj_bloc_sspl',
                'apartament_sspl',
                'localitate_nume'
            ])
            ->orderBy(['numar_strada_sspl' => SORT_ASC])
            ->all();

        if(count($puncteLucru) > 0){
            $dataResponse['response_code'] = 200;
            $dataResponse['response_message'] = 'Identificate';
            $dataResponse['response_puncte_lucru'] = $puncteLucru;
        }


        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $dataResponse;
    }

}
