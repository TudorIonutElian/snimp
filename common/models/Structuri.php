<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "structuri".
 *
 * @property int $id
 * @property int $structura_nume
 * @property int $structura_status
 * @property string $structura_start_date
 * @property string $structura_end_date
 */
class Structuri extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'structuri';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['structura_nume', 'structura_start_date', 'structura_end_date'], 'required'],
            [['structura_nume', 'structura_status'], 'integer'],
            [['structura_start_date', 'structura_end_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'structura_nume' => 'Structura Nume',
            'structura_status' => 'Structura Status',
            'structura_start_date' => 'Structura Start Date',
            'structura_end_date' => 'Structura End Date',
        ];
    }
}
