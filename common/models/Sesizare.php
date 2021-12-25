<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sesizare".
 *
 * @property int $id
 * @property string $sesizare_titlu
 * @property string $sesizare_continut
 * @property string|null $sesizare_imagine
 * @property string $sesizare_ip
 * @property int|null $sesizare_user_id
 * @property string|null $sesizare_data_creare
 * @property string|null $sesizare_data_solutionare
 * @property string $sesizare_comentariu
 * @property int|null $sesizare_status
 * @property int|null $sesizare_institutie
 * @property int|null $sesizare_serviciu
 *
 * @property Institutie $sesizareInstitutie
 * @property InstitutieServiciu $sesizareServiciu
 */
class Sesizare extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sesizare';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sesizare_titlu', 'sesizare_continut', 'sesizare_ip', 'sesizare_comentariu'], 'required'],
            [['sesizare_continut', 'sesizare_comentariu'], 'string'],
            [['sesizare_user_id', 'sesizare_status', 'sesizare_institutie', 'sesizare_serviciu'], 'integer'],
            [['sesizare_data_creare', 'sesizare_data_solutionare'], 'safe'],
            [['sesizare_titlu', 'sesizare_imagine'], 'string', 'max' => 150],
            [['sesizare_ip'], 'string', 'max' => 15],
            [['sesizare_institutie'], 'exist', 'skipOnError' => true, 'targetClass' => Institutie::className(), 'targetAttribute' => ['sesizare_institutie' => 'id']],
            [['sesizare_serviciu'], 'exist', 'skipOnError' => true, 'targetClass' => InstitutieServiciu::className(), 'targetAttribute' => ['sesizare_serviciu' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sesizare_titlu' => 'Sesizare Titlu',
            'sesizare_continut' => 'Sesizare Continut',
            'sesizare_imagine' => 'Sesizare Imagine',
            'sesizare_ip' => 'Sesizare Ip',
            'sesizare_user_id' => 'Sesizare User ID',
            'sesizare_data_creare' => 'Sesizare Data Creare',
            'sesizare_data_solutionare' => 'Sesizare Data Solutionare',
            'sesizare_comentariu' => 'Sesizare Comentariu',
            'sesizare_status' => 'Sesizare Status',
            'sesizare_institutie' => 'Sesizare Institutie',
            'sesizare_serviciu' => 'Sesizare Serviciu',
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

    /**
     * Gets query for [[SesizareServiciu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSesizareServiciu()
    {
        return $this->hasOne(InstitutieServiciu::className(), ['id' => 'sesizare_serviciu']);
    }
}
