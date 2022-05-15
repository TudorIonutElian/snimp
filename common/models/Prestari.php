<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prestari".
 *
 * @property int $id
 * @property int $institutie_id_p
 * @property int $serviciu_id_p
 * @property string $denumire_p
 * @property int|null $is_open_weekend
 * @property int|null $is_open_nonstop
 * @property int|null $is_active
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
            [['institutie_id_p', 'serviciu_id_p', 'is_open_weekend', 'is_open_nonstop', 'is_active'], 'integer'],
            [['denumire_p'], 'string', 'max' => 200],
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
            'is_open_weekend' => 'Is Open Weekend',
            'is_open_nonstop' => 'Is Open Nonstop',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * Gets query for [[InstitutieIdP]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitutie()
    {
        return $this->hasOne(Institutie::className(), ['id' => 'institutie_id_p']);
    }

    /**
     * Gets query for [[ServiciuIdP]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServiciu()
    {
        return $this->hasOne(InstitutiiServicii::className(), ['is_serviciu' => 'serviciu_id_p']);
    }

    public function getTipServiciu(){
        return TipuriServiciu::find()->where(['id' => $this->serviciu_id_p])->one();
    }
}
