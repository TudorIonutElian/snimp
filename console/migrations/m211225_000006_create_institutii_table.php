<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%institutii}}`.
 */
class m211225_000006_create_institutii_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%institutie}}', [
            'id' => $this->primaryKey(),
            'institutie_minister_id' => $this->integer(11)->notNull(),
            'institutie_structura' => $this->integer(11)->notNull(),
            'institutie_denumire' => $this->string(255)->notNull(),
            'institutie_localitate_id' => $this->integer(11)->notNull(),
            'institutie_data_creare' => $this->date()->defaultExpression('CURRENT_TIMESTAMP'),
            'institutie_contact_public' => $this->string(30)->null(),
            'institutie_email_public' => $this->string(30)->null(),
            'institutie_status' => $this->tinyInteger(1)->defaultValue(1),
        ]);

        // add foreign key for table `minister`
        $this->addForeignKey(
            'fk-institutie_minister_id',
            'institutie',
            'institutie_minister_id',
            'minister',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        // add foreign key for table `structuri`
        $this->addForeignKey(
            'fk-institutie_structura_id',
            'institutie',
            'institutie_structura',
            'structura',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        /*
        $this->insert('institutie', [
            'institutie_structura' => '',
            'institutie_denumire' => '',
            'institutie_localitate_id' => '',
        ]);
        */
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-institutie_minister_id', 'institutie');
        $this->dropForeignKey('fk-institutie_structura_id', 'institutie');
        $this->dropTable('{{%institutie}}');
    }
}
