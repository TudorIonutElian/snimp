<?php

namespace frontend\controllers;

use Yii;

class StringController extends \yii\web\Controller
{
    //=======================getJudetFromString

    public static function getJudetFromRoute(){
        // Preluare ACTION ID din url
        $actionID = Yii::$app->controller->action->id;

        // Creare variabila de titlu si initializare blank
        $titlu_modificabil_judet = "";

        // Verificare ACTION ID
        if($actionID === 'create'){
            $titlu_modificabil_judet = 'Adaugă Județ';
        }else if($actionID === 'update'){
            $titlu_modificabil_judet = 'Actualizează Județ';
        }

        // Returnare variabila
        return $titlu_modificabil_judet;
    }

    //=======================getLocalitateFromString
    public static function getLocalitateFromRoute(){
        // Preluare ACTION ID din url
        $actionID = Yii::$app->controller->action->id;

        // Creare variabila de titlu si initializare blank
        $titlu_modificabil_localitate = "";

        // Verificare ACTION ID
        if($actionID === 'create'){
            $titlu_modificabil_localitate = 'Adaugă Localitate';
        }else if($actionID === 'update'){
            $titlu_modificabil_localitate = 'Actualizează Localitate';
        }

        // Returnare variabila
        return $titlu_modificabil_localitate;
    }

    //=======================getMinisterFromString
    public static function getMinisterFromString(){
        // Preluare ACTION ID din url
        $actionID = Yii::$app->controller->action->id;

        // Creare variabila de titlu si initializare blank
        $titlu_modificabil_minister = "";

        // Verificare ACTION ID
        if($actionID === 'create'){
            $titlu_modificabil_minister = 'Adaugă Minister';
        }else if($actionID === 'update'){
            $titlu_modificabil_minister = 'Actualizează Minister';
        }

        // Returnare variabila
        return $titlu_modificabil_minister;
    }

}
