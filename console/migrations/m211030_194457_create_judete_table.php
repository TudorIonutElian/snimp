<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%judete}}`.
 */
class m211030_194457_create_judete_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%judete}}', [
            'id' => $this->primaryKey(),
            'judet_nume' => $this->string('100')->unique(),
            'judet_regiune' => $this->integer(11)->notNull(),
            'judet_status' => $this->tinyInteger(1),
            'judet_created' => $this->dateTime()->defaultExpression('current_timestamp'),
            'judet_updated' => $this->dateTime()->defaultExpression('current_timestamp'),
        ]);

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-judet-regiune-id',
            'judete',
            'judet_regiune',
            'regiuni',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%judete}}');
    }
}
