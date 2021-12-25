<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "judet".
 *
 * @property int $id
 * @property string|null $judet_indicativ
 * @property string|null $judet_nume
 * @property int $judet_regiune
 * @property int|null $judet_status
 * @property string|null $judet_created
 * @property string|null $judet_updated
 *
 * @property Regiune $judetRegiune
 * @property Localitate[] $localitates
 */
class Judet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judet_regiune'], 'required'],
            [['judet_regiune', 'judet_status'], 'integer'],
            [['judet_created', 'judet_updated'], 'safe'],
            [['judet_indicativ'], 'string', 'max' => 2],
            [['judet_nume'], 'string', 'max' => 100],
            [['judet_indicativ'], 'unique'],
            [['judet_nume'], 'unique'],
            [['judet_regiune'], 'exist', 'skipOnError' => true, 'targetClass' => Regiune::className(), 'targetAttribute' => ['judet_regiune' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judet_indicativ' => 'Judet Indicativ',
            'judet_nume' => 'Judet Nume',
            'judet_regiune' => 'Judet Regiune',
            'judet_status' => 'Judet Status',
            'judet_created' => 'Judet Created',
            'judet_updated' => 'Judet Updated',
        ];
    }

    /**
     * Gets query for [[JudetRegiune]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJudetRegiune()
    {
        return $this->hasOne(Regiune::className(), ['id' => 'judet_regiune']);
    }

    /**
     * Gets query for [[Localitates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocalitates()
    {
        return $this->hasMany(Localitate::className(), ['localitate_judet' => 'id']);
    }
}
