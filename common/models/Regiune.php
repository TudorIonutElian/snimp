<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "regiune".
 *
 * @property int $id
 * @property string|null $regiune_nume
 * @property int|null $regiune_status
 * @property string|null $regiune_created
 * @property string|null $regiune_updated
 *
 * @property Judet[] $judets
 */
class Regiune extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'regiune';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['regiune_status'], 'integer'],
            [['regiune_status', 'regiune_created', 'regiune_updated'], 'safe'],
            [['regiune_nume'], 'string', 'max' => 100],
            [['regiune_nume'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'regiune_nume' => 'Regiune Nume',
            'regiune_status' => 'Regiune Status',
            'regiune_created' => 'Regiune Created',
            'regiune_updated' => 'Regiune Updated',
        ];
    }

    /**
     * Gets query for [[Judets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJudete()
    {
        return $this->hasMany(Judet::className(), ['judet_regiune' => 'id']);
    }
}
