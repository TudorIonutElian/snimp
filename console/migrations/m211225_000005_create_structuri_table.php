<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%structuri}}`.
 */
class m211225_000005_create_structuri_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%structura}}', [
            'id' => $this->primaryKey(),
            'structura_minister' => $this->integer(11),
            'structura_nume' => $this->string(255),
            'structura_start_date' => $this->date()->defaultExpression('CURRENT_TIMESTAMP'),
            'structura_end_date' => $this->date()->null(),
            'structura_status' => $this->tinyInteger(1)->defaultValue(1),
        ]);

        // add foreign key for table `minister`
        $this->addForeignKey(
            'fk-structura-minister-id',
            'structura',
            'structura_minister',
            'minister',
            'id',
            'RESTRICT',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-structura-minister-id', 'structura');
        $this->dropTable('{{%structura}}');
    }
}
