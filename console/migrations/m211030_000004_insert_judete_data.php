<?php

use yii\db\Migration;

/**
 * Class m211030_000004_insert_judete_data
 */
class m211030_000004_insert_judete_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Inserare judete Regiunea Nord Est
        $this->insert('judet', ['judet_indicativ' => 'BC', 'judet_nume' => 'Bacau', 'judet_regiune'=> 1]);
        $this->insert('judet', ['judet_indicativ' => 'BT', 'judet_nume' => 'Botosani', 'judet_regiune'=> 1]);
        $this->insert('judet', ['judet_indicativ' => 'IS', 'judet_nume' => 'Iasi', 'judet_regiune'=> 1]);
        $this->insert('judet', ['judet_indicativ' => 'NT', 'judet_nume' => 'Neamt', 'judet_regiune'=> 1]);
        $this->insert('judet', ['judet_indicativ' => 'SV', 'judet_nume' => 'Suceava', 'judet_regiune'=> 1]);
        $this->insert('judet', ['judet_indicativ' => 'VS', 'judet_nume' => 'Vaslui', 'judet_regiune'=> 1]);

                // Inserare judete Regiunea Sud Est
        $this->insert('judet', ['judet_indicativ' => 'BR', 'judet_nume' => 'Braila', 'judet_regiune'=> 2]);
        $this->insert('judet', ['judet_indicativ' => 'BZ', 'judet_nume' => 'Buzau', 'judet_regiune'=> 2]);
        $this->insert('judet', ['judet_indicativ' => 'CT', 'judet_nume' => 'Constanta', 'judet_regiune'=> 2]);
        $this->insert('judet', ['judet_indicativ' => 'GL', 'judet_nume' => 'Galati', 'judet_regiune'=> 2]);
        $this->insert('judet', ['judet_indicativ' => 'TL', 'judet_nume' => 'Tulcea', 'judet_regiune'=> 2]);
        $this->insert('judet', ['judet_indicativ' => 'VN', 'judet_nume' => 'Vrancea', 'judet_regiune'=> 2]);

                // Inserare judete Regiunea Sud Est
        $this->insert('judet', ['judet_indicativ' => 'AG', 'judet_nume' => 'Argeș', 'judet_regiune'=> 3]);
        $this->insert('judet', ['judet_indicativ' => 'CL', 'judet_nume' => 'Calarasi', 'judet_regiune'=> 3]);
        $this->insert('judet', ['judet_indicativ' => 'DB', 'judet_nume' => 'Dambovita', 'judet_regiune'=> 3]);
        $this->insert('judet', ['judet_indicativ' => 'GR', 'judet_nume' => 'Giurgiu', 'judet_regiune'=> 3]);
        $this->insert('judet', ['judet_indicativ' => 'IL', 'judet_nume' => 'Ialomita', 'judet_regiune'=> 3]);
        $this->insert('judet', ['judet_indicativ' => 'PH', 'judet_nume' => 'Prahova', 'judet_regiune'=> 3]);
        $this->insert('judet', ['judet_indicativ' => 'TR', 'judet_nume' => 'Teleorman', 'judet_regiune'=> 3]);

                // Inserare judete Regiunea Sud Vest Oltenia
       $this->insert('judet', ['judet_indicativ' => 'DJ', 'judet_nume' => 'Dolj', 'judet_regiune'=> 4]);
       $this->insert('judet', ['judet_indicativ' => 'GJ', 'judet_nume' => 'Gorj', 'judet_regiune'=> 4]);
       $this->insert('judet', ['judet_indicativ' => 'MH', 'judet_nume' => 'Mehedinti', 'judet_regiune'=> 4]);
       $this->insert('judet', ['judet_indicativ' => 'OT', 'judet_nume' => 'Olt', 'judet_regiune'=> 4]);
       $this->insert('judet', ['judet_indicativ' => 'VL', 'judet_nume' => 'Valcea', 'judet_regiune'=> 4]);


                // Inserare judete Regiunea Vest
       $this->insert('judet', ['judet_indicativ' => 'AR', 'judet_nume' => 'Arad', 'judet_regiune'=> 5]);
       $this->insert('judet', ['judet_indicativ' => 'CS', 'judet_nume' => 'Caras-Severin', 'judet_regiune'=> 5]);
       $this->insert('judet', ['judet_indicativ' => 'HD', 'judet_nume' => 'Hunedoara', 'judet_regiune'=> 5]);
       $this->insert('judet', ['judet_indicativ' => 'TM', 'judet_nume' => 'Timis', 'judet_regiune'=> 5]);

                // Inserare judete Regiunea Nord-Vest
       $this->insert('judet', ['judet_indicativ' => 'BH', 'judet_nume' => 'Bihor', 'judet_regiune'=> 6]);
       $this->insert('judet', ['judet_indicativ' => 'BN', 'judet_nume' => 'Bistrita-Nasaud', 'judet_regiune'=> 6]);
       $this->insert('judet', ['judet_indicativ' => 'CJ', 'judet_nume' => 'Cluj', 'judet_regiune'=> 6]);
       $this->insert('judet', ['judet_indicativ' => 'MM', 'judet_nume' => 'Maramures', 'judet_regiune'=> 6]);
       $this->insert('judet', ['judet_indicativ' => 'SM', 'judet_nume' => 'Satu-Mare', 'judet_regiune'=> 6]);
       $this->insert('judet', ['judet_indicativ' => 'SJ', 'judet_nume' => 'Salaj', 'judet_regiune'=> 6]);

                // Inserare judete Regiunea Centru
       $this->insert('judet', ['judet_indicativ' => 'AB', 'judet_nume' => 'Alba', 'judet_regiune'=> 7]);
       $this->insert('judet', ['judet_indicativ' => 'BV', 'judet_nume' => 'Brașov', 'judet_regiune'=> 7]);
       $this->insert('judet', ['judet_indicativ' => 'CV', 'judet_nume' => 'Covasna', 'judet_regiune'=> 7]);
       $this->insert('judet', ['judet_indicativ' => 'HR', 'judet_nume' => 'Harghita', 'judet_regiune'=> 7]);
       $this->insert('judet', ['judet_indicativ' => 'MS', 'judet_nume' => 'Mures', 'judet_regiune'=> 7]);
       $this->insert('judet', ['judet_indicativ' => 'SB', 'judet_nume' => 'Sibiu', 'judet_regiune'=> 7]);

                // Inserare judete Regiunea Bucuresti Ilfo
       $this->insert('judet', ['judet_indicativ' => 'IF', 'judet_nume' => 'Ilfov', 'judet_regiune'=> 8]);
       $this->insert('judet', ['judet_indicativ' => 'B', 'judet_nume' => 'Bucuresti', 'judet_regiune'=> 8]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211030000004_insert_judete_data cannot be reverted.\n";

        return false;
    }
    */
}
