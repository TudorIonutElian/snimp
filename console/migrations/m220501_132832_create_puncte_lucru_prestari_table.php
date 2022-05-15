<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%puncte_lucru_prestari}}`.
 */
class m220501_132832_create_puncte_lucru_prestari_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%puncte_lucru_prestari}}', [
            'id_plp' => $this->primaryKey(),
            'punct_lucru_id_plp'                        => $this->integer(11)->notNull(),
            'prestare_id_plp'                           => $this->integer(11)->notNull(),
            'program_ora_inceput_plp'                   => $this->string('5')->notNull(),
            'program_ora_sfarsit_plp'                   => $this->string('5')->notNull(),
            'durata_programare_plp'                     => $this->string('2')->notNull(),
            'lista_documente_solicitate_plp'            => $this->integer(11)->null(),
        ]);

        $this->addForeignKey(
            'fk-plp-punctLucruId',
            'puncte_lucru_prestari',
            'punct_lucru_id_plp',
            'structuri_subordonate_puncte_lucru',
            'id_sspl',
            'restrict',
            'cascade'
        );

        $this->addForeignKey(
            'fk-plp-prestareId',
            'puncte_lucru_prestari',
            'prestare_id_plp',
            'prestari',
            'id',
            'restrict',
            'cascade'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-plp-punctLucruId', 'puncte_lucru_prestari');
        $this->dropForeignKey('fk-plp-prestareId', 'puncte_lucru_prestari');
        $this->dropTable('{{%puncte_lucru_prestari}}');
    }
}
