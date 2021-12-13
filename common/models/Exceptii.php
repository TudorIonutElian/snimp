<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "exceptii".
 *
 * @property int $id
 * @property string $denumire_exceptie
 * @property string $start_exceptie
 * @property string $end_exceptie
 * @property int $status_exceptie
 */
class Exceptii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exceptii';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['denumire_exceptie', 'end_exceptie'], 'required'],
            [['start_exceptie', 'end_exceptie'], 'safe'],
            [['status_exceptie'], 'integer'],
            [['denumire_exceptie'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'denumire_exceptie' => 'Denumire Exceptie',
            'start_exceptie' => 'Start Exceptie',
            'end_exceptie' => 'End Exceptie',
            'status_exceptie' => 'Status Exceptie',
        ];
    }
}
