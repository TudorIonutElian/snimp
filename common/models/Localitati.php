<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "localitati".
 *
 * @property int $id
 * @property string|null $localitate_nume
 * @property int $localitate_judet
 * @property int|null $localitate_status
 * @property int|null $localitate_urban
 * @property int|null $localitate_resedinta
 * @property string|null $localitate_created
 * @property string|null $localitate_updated
 *
 * @property Judete $localitateJudet
 */
class Localitati extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'localitati';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['localitate_judet'], 'required'],
            [['localitate_judet', 'localitate_status', 'localitate_urban', 'localitate_resedinta'], 'integer'],
            [['localitate_created', 'localitate_updated'], 'safe'],
            [['localitate_nume'], 'string', 'max' => 100],
            [['localitate_judet'], 'exist', 'skipOnError' => true, 'targetClass' => Judete::className(), 'targetAttribute' => ['localitate_judet' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'localitate_nume' => 'Localitate Nume',
            'localitate_judet' => 'Localitate Judet',
            'localitate_status' => 'Localitate Status',
            'localitate_urban' => 'Localitate Urban',
            'localitate_resedinta' => 'Localitate Resedinta',
            'localitate_created' => 'Localitate Created',
            'localitate_updated' => 'Localitate Updated',
        ];
    }

    /**
     * Gets query for [[LocalitateJudet]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocalitateJudet()
    {
        return $this->hasOne(Judete::className(), ['id' => 'localitate_judet']);
    }
}
