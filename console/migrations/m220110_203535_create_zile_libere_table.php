<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%zile_libere}}`.
 */
class m220110_203535_create_zile_libere_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%zile_libere}}', [
            'id' => $this->primaryKey(),
            'anul_calendaristic' => $this->integer(4),
            'data_calendaristica' => $this->date()->notNull(),
            'data_explicatie' => $this->string(50)->null(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%zile_libere}}');
    }
}
