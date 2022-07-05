<?php

namespace common\models;

/**
 * This is the model class for table "institutie".
 *
 * @property int $id
 * @property int $institutie_minister_id
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
            [['institutie_minister_id', 'institutie_structura', 'institutie_denumire', 'institutie_localitate_id'], 'required'],
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
            'institutie_minister_id' => 'Minister',
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
    public function getInstitutieServicii()
    {
        return $this->hasMany(InstitutieServicii::className(), ['is_institutie' => 'id']);
    }

    /**
     * Gets query for [[InstitutieStructura]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStructura()
    {
        return $this->hasOne(Structura::className(), ['id' => 'institutie_structura']);
    }


    /**
     * Gets query for [[InstitutieStructura]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMinister()
    {
        return $this->hasOne(Minister::className(), ['id' => 'institutie_minister_id']);
    }

    /**
     * Gets query for [[InstitutieStructura]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocalitate()
    {
        return $this->hasOne(Localitate::className(), ['id' => 'institutie_localitate_id']);
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

    /*==========================================================
     * === Verificare daca institutia are unitati subordonate
     * === pentru a putea adauga utilizatori in cadrul acestora
     * ========================================================*/
    public function hasStructuriSubordonate()
    {
        $numarStructuriSubordonate = InstitutiiStructuriSubordonate::find()
            ->where(['institutie_parinte_iss' => $this->id])
            ->count();
        return (int)$numarStructuriSubordonate > 0;
    }

    public function delete()
    {
        $this->institutie_status = 0;
        return $this->save();
    }
}
