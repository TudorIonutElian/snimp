<?php

namespace frontend\controllers;

use Yii;

class StringController extends \yii\web\Controller
{
    //=======================getStringRegiune

    public static function getStringRegiune(){
        // Preluare ACTION ID din url
        $actionID = Yii::$app->controller->action->id;

        // Creare variabila de titlu si initializare blank
        $titlu_modificabil_regiune = "";

        // Verificare ACTION ID
        if($actionID === 'create'){
            $titlu_modificabil_regiune = 'Adaugă Regiune';
        }else if($actionID === 'update'){
            $titlu_modificabil_regiune = 'Actualizează Regiune';
        }

        // Returnare variabila
        return $titlu_modificabil_regiune;
    }

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


    //=======================getUserFromString
    public static function getUserFromString(){
        // Preluare ACTION ID din url
        $actionID = Yii::$app->controller->action->id;

        // Creare variabila de titlu si initializare blank
        $titlu_modificabil_user = "";

        // Verificare ACTION ID
        if($actionID === 'create'){
            $titlu_modificabil_user = 'Adaugă Utilizator';
        }else if($actionID === 'update'){
            $titlu_modificabil_user = 'Actualizează Utilizator';
        }

        // Returnare variabila
        return $titlu_modificabil_user;
    }

    //=======================getRolString
    public static function getRolString(){
        // Preluare ACTION ID din url
        $actionID = Yii::$app->controller->action->id;

        // Creare variabila de titlu si initializare blank
        $titlu_modificabil_rol = "";

        // Verificare ACTION ID
        if($actionID === 'create'){
            $titlu_modificabil_rol = 'Adaugă Rol Utilizator';
        }else if($actionID === 'update'){
            $titlu_modificabil_rol = 'Actualizează Rol Utilizator';
        }

        // Returnare variabila
        return $titlu_modificabil_rol;
    }

    //=======================getStructuraString
    public static function getStructuraString()
    {
        // Preluare ACTION ID din url
        $actionID = Yii::$app->controller->action->id;

        // Creare variabila de titlu si initializare blank
        $titlu_modificabil_structura = "";

        // Verificare ACTION ID
        if ($actionID === 'create') {
            $titlu_modificabil_structura = 'Adaugă Structura';
        } else if ($actionID === 'update') {
            $titlu_modificabil_structura = 'Actualizează Structura';
        }

        // Returnare variabila
        return $titlu_modificabil_structura;
    }




}
