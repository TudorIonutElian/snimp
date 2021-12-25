<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%recenzie}}`.
 */
class m211225_195503_create_recenzie_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%recenzie}}', [
            'id' => $this->primaryKey(),
            'recenzie_institutie' => $this->integer(11)->notNull(),
            'recenzie_serviciu' => $this->integer(11)->notNull(),
            'recenzie_localitate' => $this->integer(11)->notNull(),
            'recenzie_mesaj' => $this->text()->notNull(),
            'recenzie_adaugata_de' => $this->integer(11)->notNull(),
            'recenzie_numar_stele' => $this->integer(1)->notNull(),
            'recenzie_contact_email' => $this->string(255),
            'recenzie_contact_mobil' => $this->string(14),
            'recenzie_data_adaugare' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%recenzie}}');
    }
}
