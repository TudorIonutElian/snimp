<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "institutii_structuri_subordonate".
 *
 * @property int $id_iss
 * @property int $institutie_parinte_iss
 * @property string $institutie_denumire_iss
 * @property string|null $institutie_data_creare_iss
 * @property string|null $institutie_data_actualizare_iss
 * @property int|null $institutie_stare_iss
 *
 * @property Institutie $institutieParinteIss
 */
class InstitutiiStructuriSubordonate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'institutii_structuri_subordonate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institutie_parinte_iss', 'institutie_denumire_iss'], 'required'],
            [['institutie_parinte_iss', 'institutie_stare_iss'], 'integer'],
            [['institutie_data_creare_iss', 'institutie_data_actualizare_iss'], 'safe'],
            [['institutie_denumire_iss'], 'string', 'max' => 100],
            [['institutie_parinte_iss'], 'exist', 'skipOnError' => true, 'targetClass' => Institutie::className(), 'targetAttribute' => ['institutie_parinte_iss' => 'id']],
            [['institutie_localitate_id_iss'], 'exist', 'skipOnError' => true, 'targetClass' => Localitate::className(), 'targetAttribute' => ['institutie_localitate_id_iss' => 'id']],
            [['institutie_judet_id_iss'], 'exist', 'skipOnError' => true, 'targetClass' => Judet::className(), 'targetAttribute' => ['institutie_judet_id_iss' => 'id']],
            [['institutie_regiune_id_iss'], 'exist', 'skipOnError' => true, 'targetClass' => Regiune::className(), 'targetAttribute' => ['institutie_regiune_id_iss' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_iss' => 'Id Iss',
            'institutie_parinte_iss' => 'Institutie Parinte Iss',
            'institutie_localitate_id_iss' => 'Localitate',
            'institutie_judet_id_iss' => 'Judet',
            'institutie_regiune_id_iss' => 'Regiune',
            'institutie_denumire_iss' => 'Institutie Denumire Iss',
            'institutie_data_creare_iss' => 'Institutie Data Creare Iss',
            'institutie_data_actualizare_iss' => 'Institutie Data Actualizare Iss',
            'institutie_stare_iss' => 'Institutie Stare Iss',
        ];
    }

    /**
     * Gets query for [[InstitutieParinteIss]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitutieParinte()
    {
        return $this->hasOne(Institutie::className(), ['id' => 'institutie_parinte_iss']);
    }
}
