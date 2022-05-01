<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "structuri_subordonate_servicii".
 *
 * @property int $id_sss
 * @property int $institutie_id_sss
 * @property int $structura_subordonata_id_sss
 * @property int $serviciu_id_sss
 * @property int $localitate_id_sss
 * @property int|null $is_open_weekend_sss
 * @property int|null $is_open_nonstop_sss
 * @property int|null $is_active_sss
 *
 * @property Institutie $institutieIdSss
 * @property Localitate $localitateIdSss
 * @property TipuriServiciu $serviciuIdSss
 */
class StructuriSubordonateServicii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'structuri_subordonate_servicii';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institutie_id_sss', 'structura_subordonata_id_sss', 'serviciu_id_sss', 'localitate_id_sss'], 'required'],
            [['institutie_id_sss', 'structura_subordonata_id_sss', 'serviciu_id_sss', 'localitate_id_sss', 'is_open_weekend_sss', 'is_open_nonstop_sss', 'is_active_sss'], 'integer'],
            [['institutie_id_sss'], 'exist', 'skipOnError' => true, 'targetClass' => Institutie::className(), 'targetAttribute' => ['institutie_id_sss' => 'id']],
            [['localitate_id_sss'], 'exist', 'skipOnError' => true, 'targetClass' => Localitate::className(), 'targetAttribute' => ['localitate_id_sss' => 'id']],
            [['serviciu_id_sss'], 'exist', 'skipOnError' => true, 'targetClass' => TipuriServiciu::className(), 'targetAttribute' => ['serviciu_id_sss' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sss' => 'Id Sss',
            'institutie_id_sss' => 'Institutie Id Sss',
            'structura_subordonata_id_sss' => 'Structura Subordonata Id Sss',
            'serviciu_id_sss' => 'Serviciu Id Sss',
            'localitate_id_sss' => 'Localitate Id Sss',
            'is_open_weekend_sss' => 'Is Open Weekend Sss',
            'is_open_nonstop_sss' => 'Is Open Nonstop Sss',
            'is_active_sss' => 'Is Active Sss',
        ];
    }

    /**
     * Gets query for [[InstitutieIdSss]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitutie()
    {
        return $this->hasOne(Institutie::className(), ['id' => 'institutie_id_sss']);
    }

    /**
     * Gets query for [[LocalitateIdSss]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocalitateIdSss()
    {
        return $this->hasOne(Localitate::className(), ['id' => 'localitate_id_sss']);
    }

    /**
     * Gets query for [[ServiciuIdSss]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServiciuIdSss()
    {
        return $this->hasOne(TipuriServiciu::className(), ['id' => 'serviciu_id_sss']);
    }
}
