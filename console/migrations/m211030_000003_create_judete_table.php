<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%judete}}`.
 */
class m211030_000003_create_judete_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%judet}}', [
            'id' => $this->primaryKey(),
            'judet_indicativ' => $this->string('2')->unique(),
            'judet_nume' => $this->string('100')->unique(),
            'judet_regiune' => $this->integer(11)->notNull(),
            'judet_status' => $this->tinyInteger(1)->defaultValue(1),
            'judet_created' => $this->dateTime()->defaultExpression('current_timestamp'),
            'judet_updated' => $this->dateTime()->defaultExpression('current_timestamp'),
        ]);

        // add foreign key for table `regiuni`
        $this->addForeignKey(
            'fk-judet-regiune_id',
            'judet',
            'judet_regiune',
            'regiune',
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
        $this->dropForeignKey('fk-judet-regiune_id', 'judet');
        $this->dropTable('{{%judet}}');
    }
}
