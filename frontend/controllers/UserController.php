<?php

namespace frontend\controllers;

use common\models\AuthAssignment;
use common\models\AuthItem;
use common\models\InstitutiiStructuriSubordonate;
use common\models\User;
use common\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(SystemController::userIsAdmin()){
            $searchModel = new UserSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if(SystemController::userIsAdminMinister()){
            return  $this->redirect(['user/index-minister']);
        }
        return  $this->redirect(['site/login']);
    }


    public function actionIndexMinister(){
        if(SystemController::userIsAdminMinister()){
            $searchModel = new UserSearch();
            $dataProvider = $searchModel->searchUserMinister($this->request->queryParams);

            return $this->render('index-minister', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        return  $this->redirect(['site/login']);
    }

    public function actionIndexInstitutie(){
        if(SystemController::userIsAdminInstitutie()){
            $searchModel = new UserSearch();
            $dataProvider = $searchModel->searchUserInstitutie($this->request->queryParams);

            return $this->render('index-institutie', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        return  $this->redirect(['site/login']);
    }

    public function actionIndexStructura(){
        if(SystemController::userIsDirectorInstitutie()){
            $searchModel = new UserSearch();
            $dataProvider = $searchModel->searchUserStructura($this->request->queryParams);

            return $this->render('index-structura', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        return  $this->redirect(['site/login']);
    }


    /**
     * Displays a single User model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(SystemController::userIsAdmin() || SystemController::userIsAdminMinister()){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
        return  $this->redirect(['site/login']);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(
            SystemController::canManageUsers()
        ){
            $roluri         = AuthItemController::getRoluri();
            $ministere      = MinisterController::getMinistere();
            $institutii     = InstitutieController::getInstitutii();

            $model = new User();

            if ($this->request->isPost) {
                $userCreateRequest = \Yii::$app->request->post();
                if($this->createNewUser($userCreateRequest)){
                    if(\Yii::$app->user->can('admin')){
                        return $this->redirect(['user/index']);
                    }else if(SystemController::userIsAdminMinister()){
                        return $this->redirect(['user/index-minister']);
                    }else if(SystemController::userIsAdminInstitutie()){
                        return $this->redirect(['user/index-institutie']);
                    }else if(SystemController::userIsDirectorInstitutie()){
                        return $this->redirect(['user/index-structura']);
                    }
                };
                return $this->redirect(['user/create']);
            } else {
                $model->loadDefaultValues();
            }

            return $this->renderAjax('create', [
                'model' => $model,
                'roluri' => $roluri,
                'ministere' => $ministere,
                'institutii' => $institutii
            ]);
        }else{
            return  $this->redirect(['site/login']);
        }

    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(SystemController::canManageUsers()){
            $roluri = AuthItemController::getRoluri();
            $ministere = MinisterController::getMinistere();

            $model = $this->findModel($id);

            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
                'roluri' => $roluri,
                'ministere' => $ministere
            ]);
        }
        return  $this->redirect(['site/index']);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(SystemController::userIsAdmin()){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
        return  $this->redirect(['site/index']);

    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function createNewUser(array $userCreateRequest)
    {
        $user_details = $userCreateRequest["User"];
        $user_new = new User();
        $user_new->username = $user_details["username"];
        $user_new->nume = $user_details["nume"];
        $user_new->prenume = $user_details["prenume"];
        $user_new->nume_anterior = $user_details["nume_anterior"];
        $user_new->cod_numeric_personal = $user_details["cod_numeric_personal"];
        $user_new->data_nasterii = $user_details["data_nasterii"];
        $user_new->localitatea_nasterii = $user_details["localitatea_nasterii"];
        $user_new->generateAuthKey();
        $user_new->setPassword(12345678);
        $user_new->email = $user_details["email"];
        $user_new->localitate_id = $user_details["localitate_id"];
        $user_new->minister_id = $user_details["minister_id"];
        $user_new->institutie_id = $user_details["institutie_id"];

        if(isset($user_details["institutie_subordonata_id"])){
            $user_new->institutie_subordonata_id = $user_details["institutie_subordonata_id"];
        }

        $user_new->status = $user_details["status"];

        if($user_new->save() && isset($user_details["rol"])){
            $userRole = new AuthAssignment();
            $userRole->item_name = $user_details["rol"];
            $userRole->user_id = $user_new->id;

            return $userRole->save();
        }else{
            return false;
        }
    }
}
