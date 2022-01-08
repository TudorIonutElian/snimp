<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "structura".
 *
 * @property int $id
 * @property int|null $structura_minister
 * @property string|null $structura_nume
 * @property string|null $structura_start_date
 * @property string|null $structura_end_date
 * @property int|null $structura_status
 *
 * @property Institutie[] $instituties
 * @property Minister $structuraMinister
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
            [['structura_minister', 'structura_status'], 'integer'],
            [['structura_start_date', 'structura_end_date'], 'safe'],
            [['structura_nume'], 'string', 'max' => 255],
            [['structura_minister'], 'exist', 'skipOnError' => true, 'targetClass' => Minister::className(), 'targetAttribute' => ['structura_minister' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'structura_minister' => 'Structura Minister',
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

    /**
     * Gets query for [[StructuraMinister]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStructuraMinister()
    {
        return $this->hasOne(Minister::className(), ['id' => 'structura_minister']);
    }
}
