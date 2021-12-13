<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "institutie".
 *
 * @property int $id
 * @property int $instititutie_structura
 * @property string $institutie_denumire
 * @property int $institutie_status
 * @property string $institutie_data_creare
 * @property int $institutie_localitate_id
 */
class Institutie extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'institutie';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['instititutie_structura', 'institutie_denumire', 'institutie_localitate_id'], 'required'],
            [['instititutie_structura', 'institutie_status', 'institutie_localitate_id'], 'integer'],
            [['institutie_data_creare'], 'safe'],
            [['institutie_denumire'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'instititutie_structura' => 'Instititutie Structura',
            'institutie_denumire' => 'Institutie Denumire',
            'institutie_status' => 'Institutie Status',
            'institutie_data_creare' => 'Institutie Data Creare',
            'institutie_localitate_id' => 'Institutie Localitate ID',
        ];
    }
}
