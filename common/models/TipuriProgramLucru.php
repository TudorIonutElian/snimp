<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipuri_program_lucru".
 *
 * @property int $id
 * @property string $tpl_ora_start
 * @property string $tpl_ora_sfarsit
 * @property int|null $tpl_is_active
 *
 * @property InstitutiiProgramLucru[] $institutiiProgramLucrus
 */
class TipuriProgramLucru extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipuri_program_lucru';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tpl_ora_start', 'tpl_ora_sfarsit'], 'required'],
            [['tpl_is_active'], 'integer'],
            [['tpl_ora_start', 'tpl_ora_sfarsit'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tpl_ora_start' => 'Tpl Ora Start',
            'tpl_ora_sfarsit' => 'Tpl Ora Sfarsit',
            'tpl_is_active' => 'Tpl Is Active',
        ];
    }

    /**
     * Gets query for [[InstitutiiProgramLucrus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitutiiProgramLucrus()
    {
        return $this->hasMany(InstitutiiProgramLucru::className(), ['ipl_program_lucru_id' => 'id']);
    }
}
