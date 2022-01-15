<?php

namespace frontend\controllers;

class ModelController extends \yii\web\Controller
{
    public static function getIdFromModelString($model)
    {
        // parsare model string
        $urlData = parse_url($model);

        // get the query
        $queryString = $urlData["query"];

        // get id= position
        $id_string_position = strpos($queryString, "id=");

        $custom_id = substr($queryString, $id_string_position);
        $custom_id_final = substr($custom_id, 3);

        return (int) $custom_id_final;
    }

}
