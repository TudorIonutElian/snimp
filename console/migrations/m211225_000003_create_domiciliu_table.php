<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%domiciliu}}`.
 */
class m211225_000003_create_domiciliu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%domiciliu}}', [
            'id' => $this->primaryKey(),
            'domiciliu_user' => $this->integer(11)->notNull(),
            'domiciliu_regiune' => $this->integer(11)->notNull(),
            'domiciliu_judet' => $this->integer(11)->notNull(),
            'domiciliu_localitate' => $this->integer(11)->notNull(),
            'domiciliu_is_resedinta' => $this->integer(11)->notNull(),
            'domiciliu_status' => $this->tinyInteger(1)->notNull()->defaultValue(0),
            'domiciliu_data_adaugarii' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP')
        ]);

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-domiciliu_user_id',
            'domiciliu',
            'domiciliu_user',
            'user',
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
        $this->dropForeignKey('fk-domiciliu_user_id', 'domiciliu');
        $this->dropTable('{{%domiciliu}}');
    }
}
