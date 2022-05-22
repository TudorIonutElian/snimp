<?php

namespace frontend\controllers;

class SetterController extends \yii\web\Controller
{
    public static function setFormModel($model, $input, $value){
        $model->$input = $value;
    }

}
