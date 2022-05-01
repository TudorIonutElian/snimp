<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%snimp_configurator}}`.
 */
class m220408_173459_create_snimp_configurator_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%snimp_configurator}}', [
            'id_sc' => $this->primaryKey(),
            'modul_sc' => $this->string(100)->notNull(),
            'modul_submodul_sc' => $this->string(100)->notNull(),
            'modul_optiune_sc' => $this->string(100)->notNull(),
            'modul_optiune_valoare_sc' => $this->tinyInteger(1)->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%snimp_configurator}}');
    }
}
