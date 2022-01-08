<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "minister".
 *
 * @property int $id
 * @property string|null $minister_denumire
 * @property int|null $minister_localitate
 * @property string|null $minister_adresa
 * @property int|null $minister_created_at
 * @property int|null $minister_updated_at
 * @property int|null $minister_status
 *
 * @property Localitate $ministerLocalitate
 * @property Structura[] $structuras
 */
class Minister extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'minister';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['minister_localitate', 'minister_created_at', 'minister_updated_at', 'minister_status'], 'integer'],
            [['minister_denumire'], 'string', 'max' => 150],
            [['minister_adresa'], 'string', 'max' => 255],
            [['minister_localitate'], 'exist', 'skipOnError' => true, 'targetClass' => Localitate::className(), 'targetAttribute' => ['minister_localitate' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'minister_denumire' => 'Minister Denumire',
            'minister_localitate' => 'Minister Localitate',
            'minister_adresa' => 'Minister Adresa',
            'minister_created_at' => 'Minister Created At',
            'minister_updated_at' => 'Minister Updated At',
            'minister_status' => 'Minister Status',
        ];
    }

    /**
     * Gets query for [[MinisterLocalitate]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocalitate()
    {
        return $this->hasOne(Localitate::className(), ['id' => 'minister_localitate']);
    }

    /**
     * Gets query for [[Structuras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStructuras()
    {
        return $this->hasMany(Structura::className(), ['structura_minister' => 'id']);
    }
}
