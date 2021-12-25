<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sesizare_email".
 *
 * @property int $id
 * @property string|null $sesizare_email_address
 * @property int $sesizare_institutie
 * @property string|null $sesizare_email_data_adaugare
 * @property int|null $sesizare_email_status
 *
 * @property Institutie $sesizareInstitutie
 */
class SesizareEmail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sesizare_email';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sesizare_institutie'], 'required'],
            [['sesizare_institutie', 'sesizare_email_status'], 'integer'],
            [['sesizare_email_data_adaugare'], 'safe'],
            [['sesizare_email_address'], 'string', 'max' => 255],
            [['sesizare_institutie'], 'exist', 'skipOnError' => true, 'targetClass' => Institutie::className(), 'targetAttribute' => ['sesizare_institutie' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sesizare_email_address' => 'Sesizare Email Address',
            'sesizare_institutie' => 'Sesizare Institutie',
            'sesizare_email_data_adaugare' => 'Sesizare Email Data Adaugare',
            'sesizare_email_status' => 'Sesizare Email Status',
        ];
    }

    /**
     * Gets query for [[SesizareInstitutie]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSesizareInstitutie()
    {
        return $this->hasOne(Institutie::className(), ['id' => 'sesizare_institutie']);
    }
}
