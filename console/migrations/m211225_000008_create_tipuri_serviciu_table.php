<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%servicii}}`.
 */
class m211225_000008_create_tipuri_serviciu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tipuri_serviciu}}', [
            'id' => $this->primaryKey(),
            'tip_serviciu_denumire' => $this->string(255)->notNull(),
            'tip_serviciu_start_date' => $this->date()->null(),
            'tip_serviciu_end_date' => $this->date()->null(),
            'tip_serviciu_active' => $this->tinyInteger(1)->defaultValue(1),
        ]);

        $this->insert('tipuri_serviciu', ['tip_serviciu_denumire' => 'Servicii Medicale']);
        $this->insert('tipuri_serviciu', ['tip_serviciu_denumire' => 'Serviii de Achiziții']);
        $this->insert('tipuri_serviciu', ['tip_serviciu_denumire' => 'Servicii Sociale']);
        $this->insert('tipuri_serviciu', ['tip_serviciu_denumire' => 'Servicii Distribuție apă']);
        $this->insert('tipuri_serviciu', ['tip_serviciu_denumire' => 'Servicii Distribuție gaze']);
        $this->insert('tipuri_serviciu', ['tip_serviciu_denumire' => 'Servicii Distribuție energie']);
        $this->insert('tipuri_serviciu', ['tip_serviciu_denumire' => 'Servicii Poștale']);
        $this->insert('tipuri_serviciu', ['tip_serviciu_denumire' => 'Servicii de Urgență']);
        $this->insert('tipuri_serviciu', ['tip_serviciu_denumire' => 'Servicii de Asistență Socială']);
        $this->insert('tipuri_serviciu', ['tip_serviciu_denumire' => 'Servicii de Telecomunicații']);
        $this->insert('tipuri_serviciu', ['tip_serviciu_denumire' => 'Servicii de Stare Civilă']);
        $this->insert('tipuri_serviciu', ['tip_serviciu_denumire' => 'Servicii de Transport Public']);
        $this->insert('tipuri_serviciu', ['tip_serviciu_denumire' => 'Servicii de Învățământ']);
        $this->insert('tipuri_serviciu', ['tip_serviciu_denumire' => 'Servicii de Radio']);
        $this->insert('tipuri_serviciu', ['tip_serviciu_denumire' => 'Servicii de Televiziune']);
        $this->insert('tipuri_serviciu', ['tip_serviciu_denumire' => 'Servicii de Administrație']);
        $this->insert('tipuri_serviciu', ['tip_serviciu_denumire' => 'Servicii de Mediu']);
        $this->insert('tipuri_serviciu', ['tip_serviciu_denumire' => 'Servicii de Apărare Națională']);
        $this->insert('tipuri_serviciu', ['tip_serviciu_denumire' => 'Servicii de Protecție Civilă']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tipuri_serviciu}}');
    }
}
