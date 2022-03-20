<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prestari".
 *
 * @property int $id
 * @property int $institutie_id_p
 * @property int $serviciu_id_p
 * @property int $denumire_p
 * @property int|null $stare_p
 *
 * @property Institutie $institutieIdP
 * @property InstitutiiServicii $serviciuIdP
 */
class Prestari extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prestari';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institutie_id_p', 'serviciu_id_p', 'denumire_p'], 'required'],
            [['institutie_id_p', 'serviciu_id_p', 'denumire_p', 'stare_p'], 'integer'],
            [['institutie_id_p'], 'exist', 'skipOnError' => true, 'targetClass' => Institutie::className(), 'targetAttribute' => ['institutie_id_p' => 'id']],
            [['serviciu_id_p'], 'exist', 'skipOnError' => true, 'targetClass' => InstitutiiServicii::className(), 'targetAttribute' => ['serviciu_id_p' => 'is_serviciu']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'institutie_id_p' => 'Institutie Id P',
            'serviciu_id_p' => 'Serviciu Id P',
            'denumire_p' => 'Denumire P',
            'stare_p' => 'Stare P',
        ];
    }

    /**
     * Gets query for [[InstitutieIdP]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitutieIdP()
    {
        return $this->hasOne(Institutie::className(), ['id' => 'institutie_id_p']);
    }

    /**
     * Gets query for [[ServiciuIdP]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServiciuIdP()
    {
        return $this->hasOne(InstitutiiServicii::className(), ['is_serviciu' => 'serviciu_id_p']);
    }
}
