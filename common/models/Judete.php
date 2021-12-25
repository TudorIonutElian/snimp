<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "judete".
 *
 * @property int $id
 * @property string|null $judet_indicativ
 * @property string|null $judet_nume
 * @property int $judet_regiune
 * @property int|null $judet_status
 * @property string|null $judet_created
 * @property string|null $judet_updated
 *
 * @property Regiuni $judetRegiune
 * @property Localitati[] $localitatis
 */
class Judete extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judete';
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
            [['judet_nume'], 'string', 'max' => 100],
            [['judet_nume'], 'unique'],
            [['judet_regiune'], 'exist', 'skipOnError' => true, 'targetClass' => Regiuni::className(), 'targetAttribute' => ['judet_regiune' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
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
        return $this->hasOne(Regiuni::className(), ['id' => 'judet_regiune']);
    }

    /**
     * Gets query for [[Localitatis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocalitatis()
    {
        return $this->hasMany(Localitati::className(), ['localitate_judet' => 'id']);
    }
}
