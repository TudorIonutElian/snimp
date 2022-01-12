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

        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-01-01', 'data_explicatie' => 'Anul Nou']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-02-02', 'data_explicatie' => 'Anul Nou']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-01-24', 'data_explicatie' => 'Ziua Unirii Principatelor Române']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-04-22', 'data_explicatie' => 'Vinerea Mare']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-04-24', 'data_explicatie' => 'Paște ortodox 2022']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-04-25', 'data_explicatie' => 'Paște ortodox 2022']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-05-01', 'data_explicatie' => 'Ziua Muncii']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-06-01', 'data_explicatie' => 'Ziua Copilului']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-06-12', 'data_explicatie' => 'Rusalii']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-06-13', 'data_explicatie' => 'A doua zi de Rusalii']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-08-15', 'data_explicatie' => 'Adormirea Maicii Domnului']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-11-30', 'data_explicatie' => 'Sfântul Andrei']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-12-01', 'data_explicatie' => 'Ziua Națională a României']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-12-25', 'data_explicatie' => 'Crăciunul']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-12-26', 'data_explicatie' => 'A doua zi de Crăciun']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%zile_libere}}');
    }
}
