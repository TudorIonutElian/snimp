<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%minister}}`.
 */
class m211225_000004_create_ministere_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%minister}}', [
            'id' => $this->primaryKey(),
            'minister_denumire' => $this->string(150),
            'minister_localitate' => $this->integer(11),
            'minister_adresa' => $this->string(255)->null(),
            'minister_created_at' => $this->integer(11)->defaultExpression('CURRENT_TIMESTAMP'),
            'minister_updated_at' => $this->integer(11)->defaultExpression('CURRENT_TIMESTAMP'),
            'minister_status' => $this->tinyInteger(1)->defaultValue(1),
        ]);

        // add foreign key for table `localitate`
        $this->addForeignKey(
            'fk-minister-localitate-id',
            'minister',
            'minister_localitate',
            'localitate',
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
        $this->dropForeignKey('fk-minister-localitate-id', 'minister');
        $this->dropTable('{{%ministere}}');
    }
}
