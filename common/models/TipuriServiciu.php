<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipuri_serviciu".
 *
 * @property int $id
 * @property string $tip_serviciu_denumire
 * @property string $tip_serviciu_start_date
 * @property string $tip_serviciu_end_date
 * @property int|null $tip_serviciu_active
 *
 * @property InstitutieServiciu[] $institutieServicius
 * @property ServiciuExceptie[] $serviciuExcepties
 */
class TipuriServiciu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipuri_serviciu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tip_serviciu_denumire', 'tip_serviciu_start_date', 'tip_serviciu_end_date'], 'required'],
            [['tip_serviciu_start_date', 'tip_serviciu_end_date'], 'safe'],
            [['tip_serviciu_active'], 'integer'],
            [['tip_serviciu_denumire'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tip_serviciu_denumire' => 'Tip Serviciu Denumire',
            'tip_serviciu_start_date' => 'Tip Serviciu Start Date',
            'tip_serviciu_end_date' => 'Tip Serviciu End Date',
            'tip_serviciu_active' => 'Tip Serviciu Active',
        ];
    }

    /**
     * Gets query for [[InstitutieServicius]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitutieServicius()
    {
        return $this->hasMany(InstitutieServiciu::className(), ['is_serviciu' => 'id']);
    }

    /**
     * Gets query for [[ServiciuExcepties]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServiciuExcepties()
    {
        return $this->hasMany(ServiciuExceptie::className(), ['se_serviciu' => 'id']);
    }
}
