<?php

use \yii\db\Migration;

class m190124_110200_add_verification_token_column_to_user_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'verification_token', $this->string()->defaultValue(null));
        // TODO setare minister_id pentru useri
        $this->insert('user', [
            'username' => 'admin',
            'auth_key' => 'h4ERq_aTeIegTHBQrwaPmBBBMhms-wcj',
            'password_hash' => '$2y$13$VAqOd1rTfUeU/POf7uXtze6A0wDJDFD9TWUB5.w6FXyDHVGL0NQwi',
            'email' => 'admin@mail.com',
            'status' => 10,
            'verification_token' => '94NOEVaTTtvIFEkJ2GJHW8KJhTg1y6a8_1641669423'
        ]);

        $this->insert('user', [
            'username' => 'admin_mti',
            'auth_key' => 'h4ERq_aTeIegTHBQrwaPmBBBMhms-wcj',
            'password_hash' => '$2y$13$VAqOd1rTfUeU/POf7uXtze6A0wDJDFD9TWUB5.w6FXyDHVGL0NQwi',
            'email' => 'admin_mti@mail.com',
            'status' => 10,
            'verification_token' => '94NOEVaTTtvIFEkJ2GJHW8KJhTg1y6a8_1641669423'
        ]);

        $this->insert('user', [
            'username' => 'admin_mf',
            'auth_key' => 'h4ERq_aTeIegTHBQrwaPmBBBMhms-wcj',
            'password_hash' => '$2y$13$VAqOd1rTfUeU/POf7uXtze6A0wDJDFD9TWUB5.w6FXyDHVGL0NQwi',
            'email' => 'admin_mf@mail.com',
            'status' => 10,
            'verification_token' => '94NOEVaTTtvIFEkJ2GJHW8KJhTg1y6a8_1641669423'
        ]);

        $this->insert('user', [
            'username' => 'admin_mai',
            'auth_key' => 'h4ERq_aTeIegTHBQrwaPmBBBMhms-wcj',
            'password_hash' => '$2y$13$VAqOd1rTfUeU/POf7uXtze6A0wDJDFD9TWUB5.w6FXyDHVGL0NQwi',
            'email' => 'admin_mai@mail.com',
            'status' => 10,
            'verification_token' => '94NOEVaTTtvIFEkJ2GJHW8KJhTg1y6a8_1641669423'
        ]);

        $this->insert('user', [
            'username' => 'admin_mae',
            'auth_key' => 'h4ERq_aTeIegTHBQrwaPmBBBMhms-wcj',
            'password_hash' => '$2y$13$VAqOd1rTfUeU/POf7uXtze6A0wDJDFD9TWUB5.w6FXyDHVGL0NQwi',
            'email' => 'admin_mae@mail.com',
            'status' => 10,
            'verification_token' => '94NOEVaTTtvIFEkJ2GJHW8KJhTg1y6a8_1641669423'
        ]);

        $this->insert('user', [
            'username' => 'admin_mj',
            'auth_key' => 'h4ERq_aTeIegTHBQrwaPmBBBMhms-wcj',
            'password_hash' => '$2y$13$VAqOd1rTfUeU/POf7uXtze6A0wDJDFD9TWUB5.w6FXyDHVGL0NQwi',
            'email' => 'admin_mj@mail.com',
            'status' => 10,
            'verification_token' => '94NOEVaTTtvIFEkJ2GJHW8KJhTg1y6a8_1641669423'
        ]);

        $this->insert('user', [
            'username' => 'admin_mapn',
            'auth_key' => 'h4ERq_aTeIegTHBQrwaPmBBBMhms-wcj',
            'password_hash' => '$2y$13$VAqOd1rTfUeU/POf7uXtze6A0wDJDFD9TWUB5.w6FXyDHVGL0NQwi',
            'email' => 'admin_mapn@mail.com',
            'status' => 10,
            'verification_token' => '94NOEVaTTtvIFEkJ2GJHW8KJhTg1y6a8_1641669423'
        ]);

        $this->insert('user', [
            'username' => 'admin_meconom',
            'auth_key' => 'h4ERq_aTeIegTHBQrwaPmBBBMhms-wcj',
            'password_hash' => '$2y$13$VAqOd1rTfUeU/POf7uXtze6A0wDJDFD9TWUB5.w6FXyDHVGL0NQwi',
            'email' => 'admin_meconom@mail.com',
            'status' => 10,
            'verification_token' => '94NOEVaTTtvIFEkJ2GJHW8KJhTg1y6a8_1641669423'
        ]);

        $this->insert('user', [
            'username' => 'admin_menergo',
            'auth_key' => 'h4ERq_aTeIegTHBQrwaPmBBBMhms-wcj',
            'password_hash' => '$2y$13$VAqOd1rTfUeU/POf7uXtze6A0wDJDFD9TWUB5.w6FXyDHVGL0NQwi',
            'email' => 'admin_menergo@mail.com',
            'status' => 10,
            'verification_token' => '94NOEVaTTtvIFEkJ2GJHW8KJhTg1y6a8_1641669423'
        ]);

        $this->insert('user', [
            'username' => 'admin_madr',
            'auth_key' => 'h4ERq_aTeIegTHBQrwaPmBBBMhms-wcj',
            'password_hash' => '$2y$13$VAqOd1rTfUeU/POf7uXtze6A0wDJDFD9TWUB5.w6FXyDHVGL0NQwi',
            'email' => 'admin_madr@mail.com',
            'status' => 10,
            'verification_token' => '94NOEVaTTtvIFEkJ2GJHW8KJhTg1y6a8_1641669423'
        ]);

        $this->insert('user', [
            'username' => 'admin_mmap',
            'auth_key' => 'h4ERq_aTeIegTHBQrwaPmBBBMhms-wcj',
            'password_hash' => '$2y$13$VAqOd1rTfUeU/POf7uXtze6A0wDJDFD9TWUB5.w6FXyDHVGL0NQwi',
            'email' => 'admin_mmap@mail.com',
            'status' => 10,
            'verification_token' => '94NOEVaTTtvIFEkJ2GJHW8KJhTg1y6a8_1641669423'
        ]);

        $this->insert('user', [
            'username' => 'admin_mdlpa',
            'auth_key' => 'h4ERq_aTeIegTHBQrwaPmBBBMhms-wcj',
            'password_hash' => '$2y$13$VAqOd1rTfUeU/POf7uXtze6A0wDJDFD9TWUB5.w6FXyDHVGL0NQwi',
            'email' => 'admin_mdlpa@mail.com',
            'status' => 10,
            'verification_token' => '94NOEVaTTtvIFEkJ2GJHW8KJhTg1y6a8_1641669423'
        ]);

        $this->insert('user', [
            'username' => 'admin_mipe',
            'auth_key' => 'h4ERq_aTeIegTHBQrwaPmBBBMhms-wcj',
            'password_hash' => '$2y$13$VAqOd1rTfUeU/POf7uXtze6A0wDJDFD9TWUB5.w6FXyDHVGL0NQwi',
            'email' => 'admin_mipe@mail.com',
            'status' => 10,
            'verification_token' => '94NOEVaTTtvIFEkJ2GJHW8KJhTg1y6a8_1641669423'
        ]);

        $this->insert('user', [
            'username' => 'admin_msss',
            'auth_key' => 'h4ERq_aTeIegTHBQrwaPmBBBMhms-wcj',
            'password_hash' => '$2y$13$VAqOd1rTfUeU/POf7uXtze6A0wDJDFD9TWUB5.w6FXyDHVGL0NQwi',
            'email' => 'admin_msss@mail.com',
            'status' => 10,
            'verification_token' => '94NOEVaTTtvIFEkJ2GJHW8KJhTg1y6a8_1641669423'
        ]);

        $this->insert('user', [
            'username' => 'admin_ms',
            'auth_key' => 'h4ERq_aTeIegTHBQrwaPmBBBMhms-wcj',
            'password_hash' => '$2y$13$VAqOd1rTfUeU/POf7uXtze6A0wDJDFD9TWUB5.w6FXyDHVGL0NQwi',
            'email' => 'admin_ms@mail.com',
            'status' => 10,
            'verification_token' => '94NOEVaTTtvIFEkJ2GJHW8KJhTg1y6a8_1641669423'
        ]);

        $this->insert('user', [
            'username' => 'admin_medu',
            'auth_key' => 'h4ERq_aTeIegTHBQrwaPmBBBMhms-wcj',
            'password_hash' => '$2y$13$VAqOd1rTfUeU/POf7uXtze6A0wDJDFD9TWUB5.w6FXyDHVGL0NQwi',
            'email' => 'admin_medu@mail.com',
            'status' => 10,
            'verification_token' => '94NOEVaTTtvIFEkJ2GJHW8KJhTg1y6a8_1641669423'
        ]);

        $this->insert('user', [
            'username' => 'admin_mat',
            'auth_key' => 'h4ERq_aTeIegTHBQrwaPmBBBMhms-wcj',
            'password_hash' => '$2y$13$VAqOd1rTfUeU/POf7uXtze6A0wDJDFD9TWUB5.w6FXyDHVGL0NQwi',
            'email' => 'admin_mat@mail.com',
            'status' => 10,
            'verification_token' => '94NOEVaTTtvIFEkJ2GJHW8KJhTg1y6a8_1641669423'
        ]);

        $this->insert('user', [
            'username' => 'admin_mcid',
            'auth_key' => 'h4ERq_aTeIegTHBQrwaPmBBBMhms-wcj',
            'password_hash' => '$2y$13$VAqOd1rTfUeU/POf7uXtze6A0wDJDFD9TWUB5.w6FXyDHVGL0NQwi',
            'email' => 'admin_mcid@mail.com',
            'status' => 10,
            'verification_token' => '94NOEVaTTtvIFEkJ2GJHW8KJhTg1y6a8_1641669423'
        ]);

        $this->insert('user', [
            'username' => 'admin_mftes',
            'auth_key' => 'h4ERq_aTeIegTHBQrwaPmBBBMhms-wcj',
            'password_hash' => '$2y$13$VAqOd1rTfUeU/POf7uXtze6A0wDJDFD9TWUB5.w6FXyDHVGL0NQwi',
            'email' => 'admin_mftes@mail.com',
            'status' => 10,
            'verification_token' => '94NOEVaTTtvIFEkJ2GJHW8KJhTg1y6a8_1641669423'
        ]);

        $this->insert('user', [
            'username' => 'admin_mcul',
            'auth_key' => 'h4ERq_aTeIegTHBQrwaPmBBBMhms-wcj',
            'password_hash' => '$2y$13$VAqOd1rTfUeU/POf7uXtze6A0wDJDFD9TWUB5.w6FXyDHVGL0NQwi',
            'email' => 'admin_mcul@mail.com',
            'status' => 10,
            'verification_token' => '94NOEVaTTtvIFEkJ2GJHW8KJhTg1y6a8_1641669423'
        ]);

        $this->insert('user', [
            'username' => 'admin_mspo',
            'auth_key' => 'h4ERq_aTeIegTHBQrwaPmBBBMhms-wcj',
            'password_hash' => '$2y$13$VAqOd1rTfUeU/POf7uXtze6A0wDJDFD9TWUB5.w6FXyDHVGL0NQwi',
            'email' => 'admin_mspo@mail.com',
            'status' => 10,
            'verification_token' => '94NOEVaTTtvIFEkJ2GJHW8KJhTg1y6a8_1641669423'
        ]);
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'verification_token');
    }
}
