<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "structuri_subordonate_puncte_lucru".
 *
 * @property int $id_sspl
 * @property int $minister_id_sspl
 * @property int $institutie_id_sspl
 * @property int $structura_subordonata_id_sspl
 * @property int $localitate_id_sspl
 *
 * @property Institutie $institutieIdSspl
 * @property Localitate $localitateIdSspl
 * @property Minister $ministerIdSspl
 * @property InstitutiiStructuriSubordonate $structuraSubordonataIdSspl
 */
class StructuriSubordonatePuncteLucru extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'structuri_subordonate_puncte_lucru';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['minister_id_sspl', 'institutie_id_sspl', 'structura_subordonata_id_sspl', 'localitate_id_sspl'], 'required'],
            [['minister_id_sspl', 'institutie_id_sspl', 'structura_subordonata_id_sspl', 'localitate_id_sspl'], 'integer'],
            [['institutie_id_sspl'], 'exist', 'skipOnError' => true, 'targetClass' => Institutie::className(), 'targetAttribute' => ['institutie_id_sspl' => 'id']],
            [['localitate_id_sspl'], 'exist', 'skipOnError' => true, 'targetClass' => Localitate::className(), 'targetAttribute' => ['localitate_id_sspl' => 'id']],
            [['minister_id_sspl'], 'exist', 'skipOnError' => true, 'targetClass' => Minister::className(), 'targetAttribute' => ['minister_id_sspl' => 'id']],
            [['structura_subordonata_id_sspl'], 'exist', 'skipOnError' => true, 'targetClass' => InstitutiiStructuriSubordonate::className(), 'targetAttribute' => ['structura_subordonata_id_sspl' => 'id_iss']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sspl' => 'Id Sspl',
            'minister_id_sspl' => 'Minister Id Sspl',
            'institutie_id_sspl' => 'Institutie Id Sspl',
            'structura_subordonata_id_sspl' => 'Structura Subordonata Id Sspl',
            'localitate_id_sspl' => 'Localitate Id Sspl',
        ];
    }

    /**
     * Gets query for [[InstitutieIdSspl]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitutieIdSspl()
    {
        return $this->hasOne(Institutie::className(), ['id' => 'institutie_id_sspl']);
    }

    /**
     * Gets query for [[LocalitateIdSspl]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocalitateIdSspl()
    {
        return $this->hasOne(Localitate::className(), ['id' => 'localitate_id_sspl']);
    }

    /**
     * Gets query for [[MinisterIdSspl]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMinisterIdSspl()
    {
        return $this->hasOne(Minister::className(), ['id' => 'minister_id_sspl']);
    }

    /**
     * Gets query for [[StructuraSubordonataIdSspl]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStructuraSubordonataIdSspl()
    {
        return $this->hasOne(InstitutiiStructuriSubordonate::className(), ['id_iss' => 'structura_subordonata_id_sspl']);
    }
}
