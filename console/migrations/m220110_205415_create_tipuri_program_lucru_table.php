<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tipuri_program_lucru}}`.
 */
class m220110_205415_create_tipuri_program_lucru_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tipuri_program_lucru}}', [
            'id' => $this->primaryKey(),
            'tpl_ora_start' => $this->string(10)->notNull(),
            'tpl_ora_sfarsit' => $this->string(10)->notNull(),
            'tpl_is_active' => $this->tinyInteger(1)->defaultValue(1)
        ]);

        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '00:00', 'tpl_ora_sfarsit' => '08:00']);
        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '01:00', 'tpl_ora_sfarsit' => '09:00']);
        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '02:00', 'tpl_ora_sfarsit' => '10:00']);
        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '03:00', 'tpl_ora_sfarsit' => '11:00']);
        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '04:00', 'tpl_ora_sfarsit' => '12:00']);
        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '05:00', 'tpl_ora_sfarsit' => '13:00']);
        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '06:00', 'tpl_ora_sfarsit' => '14:00']);
        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '07:00', 'tpl_ora_sfarsit' => '15:00']);
        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '08:00', 'tpl_ora_sfarsit' => '16:00']);
        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '09:00', 'tpl_ora_sfarsit' => '17:00']);
        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '10:00', 'tpl_ora_sfarsit' => '18:00']);
        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '11:00', 'tpl_ora_sfarsit' => '19:00']);
        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '12:00', 'tpl_ora_sfarsit' => '20:00']);
        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '13:00', 'tpl_ora_sfarsit' => '21:00']);
        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '14:00', 'tpl_ora_sfarsit' => '22:00']);
        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '15:00', 'tpl_ora_sfarsit' => '23:00']);
        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '16:00', 'tpl_ora_sfarsit' => '24:00']);
        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '17:00', 'tpl_ora_sfarsit' => '01:00']);
        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '18:00', 'tpl_ora_sfarsit' => '02:00']);
        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '19:00', 'tpl_ora_sfarsit' => '03:00']);
        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '20:00', 'tpl_ora_sfarsit' => '04:00']);
        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '21:00', 'tpl_ora_sfarsit' => '05:00']);
        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '22:00', 'tpl_ora_sfarsit' => '06:00']);
        $this->insert('tipuri_program_lucru', ['tpl_ora_start' => '23:00', 'tpl_ora_sfarsit' => '07:00']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tipuri_program_lucru}}');
    }
}
