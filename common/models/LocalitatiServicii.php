<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "localitati_servicii".
 *
 * @property int $id
 * @property int $serviciu_id
 * @property int $institutie_id
 * @property int $localitate_id
 * @property int $servicii_weekend
 * @property int $servicii_non_stop
 * @property int $is_active
 */
class LocalitatiServicii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'localitati_servicii';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['serviciu_id', 'institutie_id', 'localitate_id'], 'required'],
            [['serviciu_id', 'institutie_id', 'localitate_id', 'servicii_weekend', 'servicii_non_stop', 'is_active'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'serviciu_id' => 'Serviciu ID',
            'institutie_id' => 'Institutie ID',
            'localitate_id' => 'Localitate ID',
            'servicii_weekend' => 'Servicii Weekend',
            'servicii_non_stop' => 'Servicii Non Stop',
            'is_active' => 'Is Active',
        ];
    }
}
