<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%servicii}}`.
 */
class m211225_000008_create_tipuri_serviciu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tipuri_serviciu}}', [
            'id' => $this->primaryKey(),
            'tip_serviciu_denumire' => $this->string(255)->notNull(),
            'tip_serviciu_start_date' => $this->date()->null(),
            'tip_serviciu_end_date' => $this->date()->null(),
            'tip_serviciu_active' => $this->tinyInteger(1)->defaultValue(1),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tipuri_serviciu}}');
    }
}
