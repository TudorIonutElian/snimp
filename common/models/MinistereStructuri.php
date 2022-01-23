<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ministere_structuri".
 *
 * @property int $id
 * @property int|null $minister_id
 * @property int|null $structura_id
 *
 * @property Minister $minister
 * @property Structura $structura
 */
class MinistereStructuri extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ministere_structuri';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['minister_id', 'structura_id'], 'integer'],
            [['minister_id', 'structura_id'], 'required', 'message' => 'Câmpul este obligatoriu'],
            [['minister_id'], 'exist', 'skipOnError' => true, 'targetClass' => Minister::className(), 'targetAttribute' => ['minister_id' => 'id']],
            [['structura_id'], 'exist', 'skipOnError' => true, 'targetClass' => Structura::className(), 'targetAttribute' => ['structura_id' => 'id']],
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
            'structura_id' => 'Structura ID',
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
     * Gets query for [[Structura]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStructura()
    {
        return $this->hasOne(Structura::className(), ['id' => 'structura_id']);
    }
}
