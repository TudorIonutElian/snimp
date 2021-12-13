<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sesizari_email".
 *
 * @property int $id
 * @property string $sesizare_email
 * @property int $sesizare_email_status
 * @property string $sesizare_email_data_adaugare
 */
class SesizariEmail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sesizari_email';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sesizare_email'], 'required'],
            [['sesizare_email_status'], 'integer'],
            [['sesizare_email_data_adaugare'], 'safe'],
            [['sesizare_email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sesizare_email' => 'Sesizare Email',
            'sesizare_email_status' => 'Sesizare Email Status',
            'sesizare_email_data_adaugare' => 'Sesizare Email Data Adaugare',
        ];
    }
}
