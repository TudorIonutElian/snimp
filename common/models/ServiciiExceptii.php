<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "servicii_exceptii".
 *
 * @property int $id_se
 * @property int $serviciu_id_se
 * @property string $start_exceptie_se
 * @property string $end_exceptie_se
 * @property int $added_by_se
 * @property int $is_active_se
 */
class ServiciiExceptii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'servicii_exceptii';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['serviciu_id_se', 'start_exceptie_se', 'end_exceptie_se', 'added_by_se'], 'required'],
            [['serviciu_id_se', 'added_by_se', 'is_active_se'], 'integer'],
            [['start_exceptie_se', 'end_exceptie_se'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_se' => 'Id Se',
            'serviciu_id_se' => 'Serviciu Id Se',
            'start_exceptie_se' => 'Start Exceptie Se',
            'end_exceptie_se' => 'End Exceptie Se',
            'added_by_se' => 'Added By Se',
            'is_active_se' => 'Is Active Se',
        ];
    }
}
