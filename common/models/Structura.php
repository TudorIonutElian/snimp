<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "structura".
 *
 * @property int $id
 * @property string|null $structura_nume
 * @property string|null $structura_start_date
 * @property string|null $structura_end_date
 * @property int|null $structura_status
 *
 * @property Institutie[] $instituties
 */
class Structura extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'structura';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['structura_start_date', 'structura_end_date'], 'safe'],
            [['structura_status'], 'integer'],
            [['structura_nume'], 'string', 'max' => 255],
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
            'structura_start_date' => 'Structura Start Date',
            'structura_end_date' => 'Structura End Date',
            'structura_status' => 'Structura Status',
        ];
    }

    /**
     * Gets query for [[Instituties]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstituties()
    {
        return $this->hasMany(Institutie::className(), ['institutie_structura' => 'id']);
    }
}
