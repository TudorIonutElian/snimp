<?php

use yii\db\Migration;

/**
 * Class m211030_000002_insert_regiuni_data
 */
class m211030_000002_insert_regiuni_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('regiune', ['regiune_nume'  => 'Regiunea Nord-Est']);
        $this->insert('regiune', ['regiune_nume'  => 'Regiunea Sud-Est']);
        $this->insert('regiune', ['regiune_nume'  => 'Regiunea Sud - Muntenia']);
        $this->insert('regiune', ['regiune_nume'  => 'Regiunea Sud-Vest Oltenia']);
        $this->insert('regiune', ['regiune_nume'  => 'Regiunea Vest']);
        $this->insert('regiune', ['regiune_nume'  => 'Regiunea Nord-Vest']);
        $this->insert('regiune', ['regiune_nume'  => 'Regiunea Centru']);
        $this->insert('regiune', ['regiune_nume'  => 'Regiunea București - Ilfov']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }
}
