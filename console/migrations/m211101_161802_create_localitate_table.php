<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%localitati}}`.
 */
class m211101_161802_create_localitate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%localitate}}', [
            'id' => $this->primaryKey(),
            'localitate_nume' => $this->string('100'),
            'localitate_judet' => $this->integer(11)->notNull(),
            'localitate_status' => $this->tinyInteger(1)->defaultValue(1),
            'localitate_urban' => $this->tinyInteger(1)->notNull(),
            'localitate_resedinta' => $this->tinyInteger(1)->notNull(),
            'localitate_created' => $this->dateTime()->defaultExpression('current_timestamp'),
            'localitate_updated' => $this->dateTime()->defaultExpression('current_timestamp'),
        ]);

        // add foreign key for table `judete`
        $this->addForeignKey(
            'fk-localitate-judet_id',
            'localitate',
            'localitate_judet',
            'judet',
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
        // drop foreign key for table `regiuni`
        $this->dropForeignKey('fk-localitate-judet_id', 'localitate');
        $this->dropTable('{{%localitate}}');
    }
}
