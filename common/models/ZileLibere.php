<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "zile_libere".
 *
 * @property int $id
 * @property int|null $anul_calendaristic
 * @property string $data_calendaristica
 * @property string|null $data_explicatie
 */
class ZileLibere extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zile_libere';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['anul_calendaristic'], 'integer'],
            [['data_calendaristica'], 'required'],
            [['data_calendaristica'], 'safe'],
            [['data_explicatie'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'anul_calendaristic' => 'Anul Calendaristic',
            'data_calendaristica' => 'Data Calendaristica',
            'data_explicatie' => 'Data Explicatie',
        ];
    }
}
