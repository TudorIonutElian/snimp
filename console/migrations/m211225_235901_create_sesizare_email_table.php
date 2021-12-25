<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sesizari_email}}`.
 */
class m211225_235901_create_sesizare_email_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sesizare_email}}', [
            'id' => $this->primaryKey(),
            'sesizare_email_address' => $this->string(255),
            'sesizare_institutie' => $this->integer(11)->notNull(),
            'sesizare_email_data_adaugare' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'sesizare_email_status' => $this->tinyInteger(1)->defaultValue(0),
        ]);

        // add foreign key for table `sesizare_serviciu`
        $this->addForeignKey(
            'fk-sesizare_institutie_email_id',
            'sesizare_email',
            'sesizare_institutie',
            'institutie',
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
        $this->dropTable('{{%sesizare_email}}');
    }
}
