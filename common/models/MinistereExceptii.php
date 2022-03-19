<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ministere_exceptii".
 *
 * @property int $id
 * @property int $minister_id
 * @property int $exceptie_id
 *
 * @property TipuriExceptie $exceptie
 * @property Minister $minister
 */
class MinistereExceptii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ministere_exceptii';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['minister_id', 'exceptie_id'], 'required'],
            [['minister_id', 'exceptie_id'], 'integer'],
            [['exceptie_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipuriExceptie::className(), 'targetAttribute' => ['exceptie_id' => 'id']],
            [['minister_id'], 'exist', 'skipOnError' => true, 'targetClass' => Minister::className(), 'targetAttribute' => ['minister_id' => 'id']],
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
     * Gets query for [[Minister]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMinister()
    {
        return $this->hasOne(Minister::className(), ['id' => 'minister_id']);
    }
}
