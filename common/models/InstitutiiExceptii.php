<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "institutii_exceptii".
 *
 * @property int $id
 * @property int $institutie_id
 * @property int $exceptie_id
 *
 * @property TipuriExceptie $exceptie
 * @property Institutie $institutie
 */
class InstitutiiExceptii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'institutii_exceptii';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institutie_id', 'exceptie_id'], 'required'],
            [['institutie_id', 'exceptie_id'], 'integer'],
            [['exceptie_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipuriExceptie::className(), 'targetAttribute' => ['exceptie_id' => 'id']],
            [['institutie_id'], 'exist', 'skipOnError' => true, 'targetClass' => Institutie::className(), 'targetAttribute' => ['institutie_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'institutie_id' => 'Institutie ID',
            'exceptie_id' => 'Exceptie ID',
        ];
    }

    /**
     * Gets query for [[Exceptie]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExceptie()
    {
        return $this->hasOne(TipuriExceptie::className(), ['id' => 'exceptie_id']);
    }

    /**
     * Gets query for [[Institutie]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstitutie()
    {
        return $this->hasOne(Institutie::className(), ['id' => 'institutie_id']);
    }
}
