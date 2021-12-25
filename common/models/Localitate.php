<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "localitate".
 *
 * @property int $id
 * @property string|null $localitate_nume
 * @property int $localitate_judet
 * @property int $localitate_status
 * @property int $localitate_urban
 * @property int $localitate_resedinta
 * @property string|null $localitate_created
 * @property string|null $localitate_updated
 *
 * @property InstitutieServiciu[] $institutieServicius
 * @property Judet $localitateJudet
 * @property Programare[] $programares
 */
class Localitate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'localitate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['localitate_judet', 'localitate_status', 'localitate_urban', 'localitate_resedinta'], 'required'],
            [['localitate_judet', 'localitate_status', 'localitate_urban', 'localitate_resedinta'], 'integer'],
            [['localitate_created', 'localitate_updated'], 'safe'],
            [['localitate_nume'], 'string', 'max' => 100],
            [['localitate_judet'], 'exist', 'skipOnError' => true, 'targetClass' => Judet::className(), 'targetAttribute' => ['localitate_judet' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'localitate_nume' => 'Localitate Nume',
            'localitate_judet' => 'Localitate Judet',
            'localitate_status' => 'Localitate Status',
            'localitate_urban' => 'Localitate Urban',
            'localitate_resedinta' => 'Localitate Resedinta',
            'localitate_created' => 'Localitate Created',
            'localitate_updated' => 'Localitate Updated',
        ];
    }

    /**
     * Gets query for [[InstitutieServicius]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitutieServicius()
    {
        return $this->hasMany(InstitutieServiciu::className(), ['is_localitate' => 'id']);
    }

    /**
     * Gets query for [[LocalitateJudet]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocalitateJudet()
    {
        return $this->hasOne(Judet::className(), ['id' => 'localitate_judet']);
    }

    /**
     * Gets query for [[Programares]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgramares()
    {
        return $this->hasMany(Programare::className(), ['programare_localitate' => 'id']);
    }
}
