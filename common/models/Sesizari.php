<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sesizari".
 *
 * @property int $id
 * @property string $sesizare_titlu
 * @property string $sesizare_continut
 * @property string $sesizare_imagine
 * @property string $sesizare_ip
 * @property int $sesizare_user_id
 * @property string $sesizare_data_creare
 * @property string|null $sesizare_data_solutionare
 * @property string $sesizare_comentariu
 * @property int $sesizare_status
 */
class Sesizari extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sesizari';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sesizare_titlu', 'sesizare_continut', 'sesizare_imagine', 'sesizare_ip', 'sesizare_user_id', 'sesizare_comentariu'], 'required'],
            [['sesizare_continut'], 'string'],
            [['sesizare_user_id', 'sesizare_status'], 'integer'],
            [['sesizare_data_creare', 'sesizare_data_solutionare'], 'safe'],
            [['sesizare_titlu', 'sesizare_imagine', 'sesizare_comentariu'], 'string', 'max' => 255],
            [['sesizare_ip'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sesizare_titlu' => 'Sesizare Titlu',
            'sesizare_continut' => 'Sesizare Continut',
            'sesizare_imagine' => 'Sesizare Imagine',
            'sesizare_ip' => 'Sesizare Ip',
            'sesizare_user_id' => 'Sesizare User ID',
            'sesizare_data_creare' => 'Sesizare Data Creare',
            'sesizare_data_solutionare' => 'Sesizare Data Solutionare',
            'sesizare_comentariu' => 'Sesizare Comentariu',
            'sesizare_status' => 'Sesizare Status',
        ];
    }
}
