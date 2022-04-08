<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "programare".
 *
 * @property int $id
 * @property int $programare_institutie
 * @property int $programare_serviciu
 * @property int $programare_localitate
 * @property int|null $programare_user
 * @property string $programare_datetime
 * @property int|null $programare_validata_de
 * @property string|null $programare_numar_unic
 * @property string|null $programare_data_numar_unic
 * @property int|null $programare_data_finalizare
 *
 * @property Institutie $programareInstitutie
 * @property Localitate $programareLocalitate
 * @property int $programare_document_solicitat [int(11)]
 */
class Programare extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'programare';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['programare_minister', 'programare_institutie', 'programare_serviciu', 'programare_localitate', 'programare_datetime'], 'required'],
            [['programare_minister', 'programare_institutie', 'programare_serviciu', 'programare_localitate', 'programare_user', 'programare_validata_de', 'programare_data_finalizare'], 'integer'],
            [['programare_datetime', 'programare_data_numar_unic'], 'safe'],
            [['programare_numar_unic'], 'string', 'max' => 10],
            [['programare_institutie'], 'exist', 'skipOnError' => true, 'targetClass' => Institutie::className(), 'targetAttribute' => ['programare_institutie' => 'id']],
            [['programare_localitate'], 'exist', 'skipOnError' => true, 'targetClass' => Localitate::className(), 'targetAttribute' => ['programare_localitate' => 'id']],
            [['programare_serviciu'], 'exist', 'skipOnError' => true, 'targetClass' => InstitutiiServicii::className(), 'targetAttribute' => ['programare_serviciu' => 'id']],
            [['programare_minister'], 'exist', 'skipOnError' => true, 'targetClass' => Minister::className(), 'targetAttribute' => ['programare_minister' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'programare_minister' => 'Minister',
            'programare_institutie' => 'Institutie',
            'programare_serviciu' => 'Programare Serviciu',
            'programare_localitate' => 'Programare Localitate',
            'programare_user' => 'Programare User',
            'programare_datetime' => 'Programare Datetime',
            'programare_validata_de' => 'Programare Validata De',
            'programare_numar_unic' => 'Programare Numar Unic',
            'programare_data_numar_unic' => 'Programare Data Numar Unic',
            'programare_data_finalizare' => 'Programare Data Finalizare',
        ];
    }

    /**
     * Gets query for [[ProgramareInstitutie]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgramareMinister()
    {
        return $this->hasOne(Minister::className(), ['id' => 'programare_minister']);
    }

    /**
     * Gets query for [[ProgramareInstitutie]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgramareInstitutie()
    {
        return $this->hasOne(Institutie::className(), ['id' => 'programare_institutie']);
    }

    /**
     * Gets query for [[ProgramareLocalitate]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgramareLocalitate()
    {
        return $this->hasOne(Localitate::className(), ['id' => 'programare_localitate']);
    }

    /**
     * Gets query for [[ProgramareServiciu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgramareServiciu()
    {
        return $this->hasOne(InstitutieServiciu::className(), ['id' => 'programare_serviciu']);
    }
}
