<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%institutii_program_lucru}}`.
 */
class m220110_210100_create_institutii_program_lucru_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%institutii_program_lucru}}', [
            'id' => $this->primaryKey(),
            'ipl_institutie_id' => $this->integer(11)->notNull(),
            'ipl_program_lucru_id' => $this->integer(11)->notNull(),
            'ipl_program_lucru_from' => $this->date()->notNull(),
            'ipl_program_lucru_to' => $this->date()->notNull(),
            'ipl_program_lucru_active' => $this->tinyInteger(1)->defaultValue(1),
        ]);

        $this->addForeignKey(
            'fk_ipl_institutie',
            'institutii_program_lucru',
            'ipl_institutie_id',
            'institutie',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_ipl_program_id',
            'institutii_program_lucru',
            'ipl_program_lucru_id',
            'tipuri_program_lucru',
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
        $this->dropForeignKey('fk_ipl_institutie', 'institutii_program_lucru');
        $this->dropForeignKey('fk_ipl_program_id', 'institutii_program_lucru');
        $this->dropTable('{{%institutii_program_lucru}}');
    }
}
