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
 * @property string $strada_sspl
 * @property string $numar_strada_sspl
 * @property string $bloc_strada_sspl
 * @property string $scara_bloc_sspl
 * @property string $etaj_bloc_sspl
 * @property string $apartament_sspl
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
            [['minister_id_sspl', 'institutie_id_sspl', 'structura_subordonata_id_sspl', 'localitate_id_sspl', 'strada_sspl', 'numar_strada_sspl', 'bloc_strada_sspl', 'scara_bloc_sspl', 'etaj_bloc_sspl', 'apartament_sspl'], 'required'],
            [['minister_id_sspl', 'institutie_id_sspl', 'structura_subordonata_id_sspl', 'localitate_id_sspl'], 'integer'],
            [['strada_sspl'], 'string', 'max' => 11],
            [['numar_strada_sspl', 'bloc_strada_sspl', 'scara_bloc_sspl'], 'string', 'max' => 5],
            [['etaj_bloc_sspl'], 'string', 'max' => 3],
            [['apartament_sspl'], 'string', 'max' => 4],
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
            'strada_sspl' => 'Strada Sspl',
            'numar_strada_sspl' => 'Numar Strada Sspl',
            'bloc_strada_sspl' => 'Bloc Strada Sspl',
            'scara_bloc_sspl' => 'Scara Bloc Sspl',
            'etaj_bloc_sspl' => 'Etaj Bloc Sspl',
            'apartament_sspl' => 'Apartament Sspl',
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
