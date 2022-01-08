<?php

use \yii\db\Migration;

class m190124_110200_add_verification_token_column_to_user_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'verification_token', $this->string()->defaultValue(null));

        $this->insert('user', [
            'username' => 'admin',
            'auth_key' => 'h4ERq_aTeIegTHBQrwaPmBBBMhms-wcj',
            'password_hash' => '$2y$13$VAqOd1rTfUeU/POf7uXtze6A0wDJDFD9TWUB5.w6FXyDHVGL0NQwi',
            'email' => 'admin@mail.com',
            'status' => 10,
            'verification_token' => '94NOEVaTTtvIFEkJ2GJHW8KJhTg1y6a8_1641669423'
        ]);
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'verification_token');
    }
}
