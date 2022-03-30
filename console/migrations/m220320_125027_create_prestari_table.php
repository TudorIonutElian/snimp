<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%prestari}}`.
 */
class m220320_125027_create_prestari_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%prestari}}', [
            'id' => $this->primaryKey(),
            'institutie_id_p' => $this->integer(11)->notNull(),
            'serviciu_id_p' => $this->integer(11)->notNull(),
            'denumire_p' => $this->string(200)->notNull(),
            'is_open_weekend' => $this->tinyInteger(1)->defaultValue(0),
            'is_open_nonstop' => $this->tinyInteger(1)->defaultValue(0),
            'is_active' => $this->tinyInteger(1)->defaultValue(1),
        ]);

        $this->addForeignKey(
            'fk-prestari-institutieID',
            'prestari',
            'institutie_id_p',
            'institutie',
            'id',
            'cascade',
            'cascade'
        );

        $this->addForeignKey(
            'fk-prestari-serviciuID',
            'prestari',
            'serviciu_id_p',
            'institutii_servicii',
            'is_serviciu',
            'cascade',
            'cascade'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->$this->dropForeignKey('fk-prestari-institutieID', 'prestari');
        $this->$this->dropForeignKey('fk-prestari-serviciuID', 'prestari');
        $this->dropTable('{{%prestari}}');
    }
}
