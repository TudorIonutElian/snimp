<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "recenzie".
 *
 * @property int $id
 * @property int $recenzie_institutie
 * @property int $recenzie_serviciu
 * @property int $recenzie_localitate
 * @property string $recenzie_mesaj
 * @property int $recenzie_adaugata_de
 * @property int $recenzie_numar_stele
 * @property string|null $recenzie_contact_email
 * @property string|null $recenzie_contact_mobil
 * @property string|null $recenzie_data_adaugare
 */
class Recenzie extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recenzie';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recenzie_institutie', 'recenzie_serviciu', 'recenzie_localitate', 'recenzie_mesaj', 'recenzie_adaugata_de', 'recenzie_numar_stele'], 'required'],
            [['recenzie_institutie', 'recenzie_serviciu', 'recenzie_localitate', 'recenzie_adaugata_de', 'recenzie_numar_stele'], 'integer'],
            [['recenzie_mesaj'], 'string'],
            [['recenzie_data_adaugare'], 'safe'],
            [['recenzie_contact_email'], 'string', 'max' => 255],
            [['recenzie_contact_mobil'], 'string', 'max' => 14],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'recenzie_institutie' => 'Recenzie Institutie',
            'recenzie_serviciu' => 'Recenzie Serviciu',
            'recenzie_localitate' => 'Recenzie Localitate',
            'recenzie_mesaj' => 'Recenzie Mesaj',
            'recenzie_adaugata_de' => 'Recenzie Adaugata De',
            'recenzie_numar_stele' => 'Recenzie Numar Stele',
            'recenzie_contact_email' => 'Recenzie Contact Email',
            'recenzie_contact_mobil' => 'Recenzie Contact Mobil',
            'recenzie_data_adaugare' => 'Recenzie Data Adaugare',
        ];
    }
}
