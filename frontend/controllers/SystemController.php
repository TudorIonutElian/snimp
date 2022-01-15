<?php

namespace frontend\controllers;

use Yii;

class SystemController extends \yii\web\Controller
{
    public static function userIsAdmin()
    {
        return !Yii::$app->user->getIsGuest() && Yii::$app->user->can("admin");
    }

}
