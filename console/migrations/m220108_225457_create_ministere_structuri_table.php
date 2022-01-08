<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ministere_structuri}}`.
 */
class m220108_225457_create_ministere_structuri_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ministere_structuri}}', [
            'id' => $this->primaryKey(),
            'minister_id' => $this->integer(11),
            'structura_id' => $this->integer(11),
        ]);


        // add foreign key for table `minister`
        $this->addForeignKey(
            'fk-minister_id',
            'ministere_structuri',
            'minister_id',
            'minister',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        // add foreign key for table `structura`
        $this->addForeignKey(
            'fk-structura-id',
            'ministere_structuri',
            'structura_id',
            'structura',
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
        $this->dropForeignKey('fk-minister_id', 'ministere_structuri');
        $this->dropForeignKey('fk-structura', 'ministere_structuri');
        $this->dropTable('{{%ministere_structuri}}');
    }
}
