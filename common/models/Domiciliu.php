<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "domiciliu".
 *
 * @property int $id
 * @property int $domiciliu_user
 * @property int $domiciliu_regiune
 * @property int $domiciliu_judet
 * @property int $domiciliu_localitate
 * @property int $domiciliu_is_resedinta
 * @property int $domiciliu_status
 * @property string|null $domiciliu_data_adaugarii
 *
 * @property User $domiciliuUser
 */
class Domiciliu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'domiciliu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['domiciliu_user', 'domiciliu_regiune', 'domiciliu_judet', 'domiciliu_localitate', 'domiciliu_is_resedinta'], 'required'],
            [['domiciliu_user', 'domiciliu_regiune', 'domiciliu_judet', 'domiciliu_localitate', 'domiciliu_is_resedinta', 'domiciliu_status'], 'integer'],
            [['domiciliu_data_adaugarii'], 'safe'],
            [['domiciliu_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['domiciliu_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'domiciliu_user' => 'Domiciliu User',
            'domiciliu_regiune' => 'Domiciliu Regiune',
            'domiciliu_judet' => 'Domiciliu Judet',
            'domiciliu_localitate' => 'Domiciliu Localitate',
            'domiciliu_is_resedinta' => 'Domiciliu Is Resedinta',
            'domiciliu_status' => 'Domiciliu Status',
            'domiciliu_data_adaugarii' => 'Domiciliu Data Adaugarii',
        ];
    }

    /**
     * Gets query for [[DomiciliuUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDomiciliuUser()
    {
        return $this->hasOne(User::className(), ['id' => 'domiciliu_user']);
    }
}
