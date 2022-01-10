<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%servicii_program_lucru}}`.
 */
class m220110_210109_create_servicii_program_lucru_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%servicii_program_lucru}}', [
            'id' => $this->primaryKey(),
            'spl_serviciu_id' => $this->integer(11)->notNull(),
            'spl_program_lucru_id' => $this->integer(11)->notNull(),
            'spl_program_lucru_from' => $this->date()->notNull(),
            'spl_program_lucru_to' => $this->date()->notNull(),
            'spl_program_lucru_active' => $this->tinyInteger(1)->defaultValue(1),

        ]);

        $this->addForeignKey(
            'fk_spl_serviciu',
            'servicii_program_lucru',
            'spl_serviciu_id',
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
        $this->dropForeignKey('fk_spl_serviciu', 'servicii_program_lucru');
        $this->dropTable('{{%servicii_program_lucru}}');
    }
}
