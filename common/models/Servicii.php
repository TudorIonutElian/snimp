<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "servicii".
 *
 * @property int $id
 * @property int $serviciu_denumire_s
 * @property int $serviciu_active_s
 * @property string $serviciu_active_since_s
 * @property string|null $serviciu_until_s
 */
class Servicii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'servicii';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['serviciu_denumire_s', 'serviciu_active_since_s'], 'required'],
            [['serviciu_denumire_s', 'serviciu_active_s'], 'integer'],
            [['serviciu_active_since_s', 'serviciu_until_s'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'serviciu_denumire_s' => 'Serviciu Denumire S',
            'serviciu_active_s' => 'Serviciu Active S',
            'serviciu_active_since_s' => 'Serviciu Active Since S',
            'serviciu_until_s' => 'Serviciu Until S',
        ];
    }
}
