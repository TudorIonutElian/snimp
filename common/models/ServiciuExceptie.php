<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "serviciu_exceptie".
 *
 * @property int $id
 * @property int $se_serviciu
 * @property string|null $se_serviciu_start_exceptie
 * @property string|null $se_serviciu_end_exceptie
 * @property int|null $se_serviciu_added_by
 * @property int|null $se_serviciu_active
 *
 * @property TipuriServiciu $seServiciu
 */
class ServiciuExceptie extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'serviciu_exceptie';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['se_serviciu'], 'required'],
            [['se_serviciu', 'se_serviciu_added_by', 'se_serviciu_active'], 'integer'],
            [['se_serviciu_start_exceptie', 'se_serviciu_end_exceptie'], 'safe'],
            [['se_serviciu'], 'exist', 'skipOnError' => true, 'targetClass' => TipuriServiciu::className(), 'targetAttribute' => ['se_serviciu' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'se_serviciu' => 'Se Serviciu',
            'se_serviciu_start_exceptie' => 'Se Serviciu Start Exceptie',
            'se_serviciu_end_exceptie' => 'Se Serviciu End Exceptie',
            'se_serviciu_added_by' => 'Se Serviciu Added By',
            'se_serviciu_active' => 'Se Serviciu Active',
        ];
    }

    /**
     * Gets query for [[SeServiciu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeServiciu()
    {
        return $this->hasOne(TipuriServiciu::className(), ['id' => 'se_serviciu']);
    }
}
