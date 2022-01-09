<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%institutii_structuri}}`.
 */
class m220108_233229_create_institutii_structuri_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%institutii_structuri}}', [
            'id' => $this->primaryKey(),
            'institutie_id' => $this->integer(11),
            'structura_id' => $this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%institutii_structuri}}');
    }
}
