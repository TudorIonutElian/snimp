<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sesizari}}`.
 */
class m211225_235900_create_sesizari_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sesizare}}', [
            'id' => $this->primaryKey(),
            'sesizare_titlu' => $this->string(150)->notNull(),
            'sesizare_continut' => $this->text()->notNull(),
            'sesizare_imagine' => $this->string(150)->null(),
            'sesizare_ip' => $this->string(15)->notNull(),
            'sesizare_user_id' => $this->integer(11)->null(),
            'sesizare_data_creare' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'sesizare_data_solutionare' => $this->dateTime()->null(),
            'sesizare_comentariu' => $this->text()->notNull(),
            'sesizare_status' => $this->tinyInteger(1)->defaultValue(0),
            'sesizare_institutie' => $this->integer(11)->null(),
            'sesizare_serviciu' => $this->integer(11)->null(),
        ]);

        // add foreign key for table `sesizare_institutie`
        $this->addForeignKey(
            'fk-sesizare_institutie_id',
            'sesizare',
            'sesizare_institutie',
            'institutie',
            'id',
            'RESTRICT',
            'CASCADE'
        );
        // add foreign key for table `sesizare_serviciu`
        $this->addForeignKey(
            'fk-sesizare_serviciu_id',
            'sesizare',
            'sesizare_serviciu',
            'institutie_serviciu',
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
        $this->dropTable('{{%sesizare}}');
    }
}
