<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%setari}}`.
 */
class m220108_232142_create_setari_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%setari}}', [
            'id' => $this->primaryKey(),
            'setari_activitate' => $this->string(10)->notNull(),
            'setari_necesita_autentificare' => $this->tinyInteger(1)->defaultValue(0),
            'setari_necesita_email' => $this->tinyInteger(1)->defaultValue(0),
            'setari_necesita_mobil' => $this->tinyInteger(1)->defaultValue(0),
            'setari_necesita_prelucrare_date' => $this->tinyInteger(1)->defaultValue(0),
            'setari_necesita_accord_prelucrare_date' => $this->tinyInteger(1)->defaultValue(0),
            'setari_permisiune_adaugare' => $this->string(15)->notNull(),
            'setari_permisiune_modificare' => $this->string(15)->notNull(),
            'setari_permisiune_stergere' => $this->string(15)->notNull(),
            'setari_start_date' => $this->date()->notNull(),
            'setari_active' => $this->tinyInteger(1)->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%setari}}');
    }
}
