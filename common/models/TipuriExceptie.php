<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipuri_exceptie".
 *
 * @property int $id
 * @property string $te_exceptie_denumire
 * @property string $te_exceptie_start
 * @property string|null $te_exceptie_end
 * @property int|null $te_exceptie_status
 */
class TipuriExceptie extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipuri_exceptie';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['te_exceptie_denumire'], 'required'],
            [['te_exceptie_start', 'te_exceptie_end'], 'safe'],
            [['te_exceptie_status'], 'integer'],
            [['te_exceptie_denumire'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'te_exceptie_denumire' => 'Te Exceptie Denumire',
            'te_exceptie_start' => 'Te Exceptie Start',
            'te_exceptie_end' => 'Te Exceptie End',
            'te_exceptie_status' => 'Te Exceptie Status',
        ];
    }
}
