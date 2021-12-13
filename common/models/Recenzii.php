<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "recenzii".
 *
 * @property int $id
 * @property int|null $recenzie_institutie
 * @property int|null $recenzie_serviciu
 * @property int|null $recenzie_localitate
 * @property string $recenzie_mesaj
 * @property int $recenzie_adaugata_de
 * @property int $recenzie_stele
 * @property string $recenzie_data_adaugare
 */
class Recenzii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recenzii';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recenzie_institutie', 'recenzie_serviciu', 'recenzie_localitate', 'recenzie_adaugata_de', 'recenzie_stele'], 'integer'],
            [['recenzie_mesaj', 'recenzie_adaugata_de', 'recenzie_stele', 'recenzie_data_adaugare'], 'required'],
            [['recenzie_data_adaugare'], 'safe'],
            [['recenzie_mesaj'], 'string', 'max' => 255],
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
            'recenzie_stele' => 'Recenzie Stele',
            'recenzie_data_adaugare' => 'Recenzie Data Adaugare',
        ];
    }
}
