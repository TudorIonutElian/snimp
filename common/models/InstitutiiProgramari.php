<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "institutii_programari".
 *
 * @property int $id
 * @property int $ip_institutie_id
 * @property int $ip_user_id
 * @property string $ip_date_time
 * @property int $ip_localitate_id
 * @property int $ip_validata_de
 * @property int $ip_status
 * @property string|null $ip_data_finalizare
 */
class InstitutiiProgramari extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'institutii_programari';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ip_institutie_id', 'ip_user_id', 'ip_date_time', 'ip_localitate_id', 'ip_validata_de'], 'required'],
            [['ip_institutie_id', 'ip_user_id', 'ip_localitate_id', 'ip_validata_de', 'ip_status'], 'integer'],
            [['ip_date_time', 'ip_data_finalizare'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip_institutie_id' => 'Ip Institutie ID',
            'ip_user_id' => 'Ip User ID',
            'ip_date_time' => 'Ip Date Time',
            'ip_localitate_id' => 'Ip Localitate ID',
            'ip_validata_de' => 'Ip Validata De',
            'ip_status' => 'Ip Status',
            'ip_data_finalizare' => 'Ip Data Finalizare',
        ];
    }
}
