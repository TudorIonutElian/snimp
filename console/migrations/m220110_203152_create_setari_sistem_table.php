<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%setari_sistem}}`.
 */
class m220110_203152_create_setari_sistem_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%setari_sistem}}', [
            'id' => $this->primaryKey(),
            'ss_modul' => $this->string(25),
            'ss_setare_denumire' => $this->string(25),
            'ss_setare_key' => $this->string(25),
            'ss_setare_valoare' => $this->string(25),
            'ss_setare_created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'ss_setare_updated_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'ss_setare_deleted_at' => $this->dateTime()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%setari_sistem}}');
    }
}
