<?php

namespace frontend\controllers;

use Yii;

class SystemController extends \yii\web\Controller
{
    public static function userIsAdmin()
    {
        return !Yii::$app->user->getIsGuest() && Yii::$app->user->can("admin");
    }

    public static function userIsAdminMinister(){
        return !\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin_minister');
    }

    public static function userIsAdminInstitutie(){
        return !\Yii::$app->user->getIsGuest() && \Yii::$app->user->can('admin_institutie');
    }

    public static function canManageUsers(){
        return !\Yii::$app->user->getIsGuest() && (
            \Yii::$app->user->can('admin_institutie') ||
            \Yii::$app->user->can('admin_minister') ||
            Yii::$app->user->can("admin")
        );
    }

}
