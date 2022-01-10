<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ministere_program_lucru}}`.
 */
class m220110_210050_create_ministere_program_lucru_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ministere_program_lucru}}', [
            'id' => $this->primaryKey(),
            'mpl_minister_id' => $this->integer(11)->notNull(),
            'mpl_program_lucru_id' => $this->integer(11)->notNull(),
            'mpl_program_lucru_from' => $this->date()->notNull(),
            'mpl_program_lucru_to' => $this->date()->notNull(),
            'mpl_program_lucru_active' => $this->tinyInteger(1)->defaultValue(1),
        ]);

        $this->addForeignKey(
            'fk_mpl_minister',
            'ministere_program_lucru',
            'mpl_minister_id',
            'minister',
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
        $this->dropForeignKey('fk_mpl_minister', 'ministere_program_lucru');
        $this->dropTable('{{%ministere_program_lucru}}');
    }
}
