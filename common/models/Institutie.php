<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "institutie".
 *
 * @property int $id
 * @property int $institutie_structura
 * @property string $institutie_denumire
 * @property int $institutie_localitate_id
 * @property string|null $institutie_data_creare
 * @property int|null $institutie_status
 *
 * @property InstitutieServiciu[] $institutieServicius
 * @property Structura $institutieStructura
 * @property Programare[] $programares
 * @property SesizareEmail[] $sesizareEmails
 * @property Sesizare[] $sesizares
 */
class Institutie extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'institutie';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institutie_structura', 'institutie_denumire', 'institutie_localitate_id'], 'required'],
            [['institutie_structura', 'institutie_localitate_id', 'institutie_status'], 'integer'],
            [['institutie_data_creare'], 'safe'],
            [['institutie_denumire'], 'string', 'max' => 255],
            [['institutie_structura'], 'exist', 'skipOnError' => true, 'targetClass' => Structura::className(), 'targetAttribute' => ['institutie_structura' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'institutie_structura' => 'Institutie Structura',
            'institutie_denumire' => 'Institutie Denumire',
            'institutie_localitate_id' => 'Institutie Localitate ID',
            'institutie_data_creare' => 'Institutie Data Creare',
            'institutie_status' => 'Institutie Status',
        ];
    }

    /**
     * Gets query for [[InstitutieServicius]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitutieServicius()
    {
        return $this->hasMany(InstitutieServiciu::className(), ['is_institutie' => 'id']);
    }

    /**
     * Gets query for [[InstitutieStructura]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitutieStructura()
    {
        return $this->hasOne(Structura::className(), ['id' => 'institutie_structura']);
    }

    /**
     * Gets query for [[Programares]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgramares()
    {
        return $this->hasMany(Programare::className(), ['programare_institutie' => 'id']);
    }

    /**
     * Gets query for [[SesizareEmails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSesizareEmails()
    {
        return $this->hasMany(SesizareEmail::className(), ['sesizare_institutie' => 'id']);
    }

    /**
     * Gets query for [[Sesizares]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSesizares()
    {
        return $this->hasMany(Sesizare::className(), ['sesizare_institutie' => 'id']);
    }
}
