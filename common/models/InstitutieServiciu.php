<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "institutie_serviciu".
 *
 * @property int $id
 * @property int $is_institutie
 * @property int $is_serviciu
 * @property int $is_localitate
 * @property int|null $is_open_weekend
 * @property int|null $is_open_nonstop
 * @property int|null $is_active
 *
 * @property Institutie $isInstitutie
 * @property Localitate $isLocalitate
 * @property TipuriServiciu $isServiciu
 * @property Programare[] $programares
 * @property Sesizare[] $sesizares
 */
class InstitutieServiciu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'institutie_serviciu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_institutie', 'is_serviciu', 'is_localitate'], 'required'],
            [['is_institutie', 'is_serviciu', 'is_localitate', 'is_open_weekend', 'is_open_nonstop', 'is_active'], 'integer'],
            [['is_institutie'], 'exist', 'skipOnError' => true, 'targetClass' => Institutie::className(), 'targetAttribute' => ['is_institutie' => 'id']],
            [['is_localitate'], 'exist', 'skipOnError' => true, 'targetClass' => Localitate::className(), 'targetAttribute' => ['is_localitate' => 'id']],
            [['is_serviciu'], 'exist', 'skipOnError' => true, 'targetClass' => TipuriServiciu::className(), 'targetAttribute' => ['is_serviciu' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'is_institutie' => 'Is Institutie',
            'is_serviciu' => 'Is Serviciu',
            'is_localitate' => 'Is Localitate',
            'is_open_weekend' => 'Is Open Weekend',
            'is_open_nonstop' => 'Is Open Nonstop',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * Gets query for [[IsInstitutie]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIsInstitutie()
    {
        return $this->hasOne(Institutie::className(), ['id' => 'is_institutie']);
    }

    /**
     * Gets query for [[IsLocalitate]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIsLocalitate()
    {
        return $this->hasOne(Localitate::className(), ['id' => 'is_localitate']);
    }

    /**
     * Gets query for [[IsServiciu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIsServiciu()
    {
        return $this->hasOne(TipuriServiciu::className(), ['id' => 'is_serviciu']);
    }

    /**
     * Gets query for [[Programares]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgramares()
    {
        return $this->hasMany(Programare::className(), ['programare_serviciu' => 'id']);
    }

    /**
     * Gets query for [[Sesizares]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSesizares()
    {
        return $this->hasMany(Sesizare::className(), ['sesizare_serviciu' => 'id']);
    }
}
