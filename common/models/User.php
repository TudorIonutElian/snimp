<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $cod_numeric_personal
 * @property string $nume
 * @property string $prenume
 * @property string|null $nume_anterior
 * @property string|null $data_nasterii
 * @property int|null $localitatea_nasterii
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int|null $localitate_id
 * @property string|null $verification_token
 *
 * @property Domiciliu[] $domicilius
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'cod_numeric_personal', 'nume', 'prenume', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['data_nasterii'], 'safe'],
            [['localitatea_nasterii', 'status', 'created_at', 'updated_at', 'localitate_id'], 'integer'],
            [['username', 'nume', 'prenume', 'nume_anterior', 'password_hash', 'password_reset_token', 'email', 'verification_token'], 'string', 'max' => 255],
            [['cod_numeric_personal'], 'string', 'max' => 13],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'cod_numeric_personal' => 'Cod Numeric Personal',
            'nume' => 'Nume',
            'prenume' => 'Prenume',
            'nume_anterior' => 'Nume Anterior',
            'data_nasterii' => 'Data Nasterii',
            'localitatea_nasterii' => 'Localitatea Nasterii',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'localitate_id' => 'Localitate ID',
            'verification_token' => 'Verification Token',
        ];
    }

    /**
     * Gets query for [[Domicilius]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDomicilius()
    {
        return $this->hasMany(Domiciliu::className(), ['domiciliu_user' => 'id']);
    }
}
