<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ministere_servicii".
 *
 * @property int $id
 * @property int $minister_id
 * @property int $tip_serviciu_id
 *
 * @property Minister $minister
 * @property TipuriServiciu $tipServiciu
 */
class MinistereServicii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ministere_servicii';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['minister_id', 'tip_serviciu_id'], 'required'],
            [['minister_id', 'tip_serviciu_id'], 'integer'],
            [['minister_id'], 'exist', 'skipOnError' => true, 'targetClass' => Minister::className(), 'targetAttribute' => ['minister_id' => 'id']],
            [['tip_serviciu_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipuriServiciu::className(), 'targetAttribute' => ['tip_serviciu_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'minister_id' => 'Minister ID',
            'tip_serviciu_id' => 'Tip Serviciu ID',
        ];
    }

    /**
     * Gets query for [[Minister]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMinister()
    {
        return $this->hasOne(Minister::className(), ['id' => 'minister_id']);
    }

    /**
     * Gets query for [[TipServiciu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipServiciu()
    {
        return $this->hasOne(TipuriServiciu::className(), ['id' => 'tip_serviciu_id']);
    }
}
