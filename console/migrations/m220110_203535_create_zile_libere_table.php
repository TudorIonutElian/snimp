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

        ]);

        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-01-01']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-02-02']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-01-24']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-04-22']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-04-24']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-04-25']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-05-01']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-06-01']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-06-12']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-08-15']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-11-30']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-12-01']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-12-25']);
        $this->insert('zile_libere', ['anul_calendaristic' => 2021, 'data_calendaristica' => '2022-12-26']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%zile_libere}}');
    }
}
