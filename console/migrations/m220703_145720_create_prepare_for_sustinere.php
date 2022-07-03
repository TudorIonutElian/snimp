<?php

use yii\db\Migration;

/**
 * Class m220703_145720_create_prepare_for_sustinere
 */
class m220703_145720_create_prepare_for_sustinere extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // adaugare structuri in cadrul ministerului
        $this->batchInsert(
            'ministere_structuri',
            ['minister_id', 'structura_id'],
            [
                [3, 1],
                [3, 2],
                [3, 3],
                [3, 4],
                [3, 5],
                [3, 6],
                [3, 7],
                [3, 8],
                [3, 9],
                [3, 10],
                [3, 11],
                [3, 12],
                [3, 13],
            ]
        );

        // inserare structuri subordonate IGPFR
        $this->batchInsert(
            'institutii_structuri_subordonate',
            ['institutie_parinte_iss', 'institutie_denumire_iss', 'institutie_stare_iss', 'institutie_localitate_id_iss', 'institutie_judet_id_iss', 'institutie_regiune_id_iss'],
            [
                [2, 'Inspectoratul Teritorial al Politiei de Frontieră Giurgiu', 1, 5236, 16, 3],
                [2, 'Inspectoratul Teritorial al Politiei de Frontieră Timișoara', 1, 9760, 28, 5],
                [2, 'Inspectoratul Teritorial al Politiei de Frontieră Iași', 1, 1042, 3, 1],
                [2, 'Inspectoratul Teritorial al Politiei de Frontieră Oradea', 1, 10053, 29, 6],
                [2, 'Inspectoratul Teritorial al Politiei de Frontieră Oradea', 1, 11132, 32, 6],
                [2, 'Garda de Coastă', 1, 3193, 9, 2],
            ]
        );

        // inserare servicii la nivelul IGPF
        $this->batchInsert(
            'institutii_servicii',
            ['is_institutie', 'is_serviciu', 'is_localitate', 'is_open_weekend', 'is_open_nonstop', 'is_active'],
            [
                [2,8,13802,1,1,1],
                [2,16,13802,1,1,1],
                [2,18,13802,1,1,1],
                [2,19,13802,1,1,1],
            ]
        );

        // adaugare user rol director

        $this->insert(
            'user',
            [
                'username' => 'director_itpf_gr',
                'cod_numeric_personal' => '1900725281965',
                'nume' => 'Tudor',
                'prenume' => 'Ionut-Elian',
                'data_nasterii' => '1990-07-25',
                'localitatea_nasterii' => 13802,
                'auth_key' => 'BNfC4Fi_kgO8mzhrw7-vqyOHPQlZqZHh',
                'password_hash' => '$2y$13$w7O6hwOUdFeMmaUR4ZcA3uI41ehxJDng8i/3bd6PW4X5FZCKDMiv2',
                'email' => 'director_itpf_gr@gmail.com',
                'status' => 10,
                'created_at' => '1656873215',
                'updated_at' => '1656873215',
                'localitate_id' => 13802,
                'minister_id' => 3,
                'institutie_id' => 2,
                'institutie_subordonata_id' => 1
            ]
        );

        // adaugare rol director userului de mai sus

        $this->insert(
            'auth_assignment',
            [
                'item_name' => 'director_institutie',
                'user_id' => 26
            ]
        );

        $this->batchInsert(
            'institutii_exceptii',
            ['institutie_id', 'exceptie_id'],
            [
                [2,1],
                [2,2],
                [2,3],
                [2,7]
            ]
        );

        // adaugare puncte de lucru pt IGPF-ITPF Gr
        $this->batchInsert(
          'structuri_subordonate_puncte_lucru',
          [
              'minister_id_sspl',
              'institutie_id_sspl',
              'structura_subordonata_id_sspl',
              'localitate_id_sspl',
              'strada_sspl',
              'numar_strada_sspl',
              'bloc_strada_sspl',
              'scara_bloc_sspl',
              'etaj_bloc_sspl',
              'apartament_sspl',
              'aprobat_administrator_sspl',
          ],
          [
            [3, 2, NULL, 13802, 'Bulevardul Aerogarii', '1', '12', 'A', '-', '-', 1],
            [3, 2, 1, 5236, 'Bulevardul Bucuresti', '10', '12', 'A', '-', '-', 1],
            [3, 2, 1, 5236, 'Bulevardul Zimnicea', '25', '-', '-', '-', '-', 1],
            [3, 2, 1, 5236, 'Soseaua Alexandriei', '100', '-', '-', '-', '-', 1],
          ]
        );

        // adaugare servicii pentru IGPF-ITPF Gr

        $this->batchInsert(
            'structuri_subordonate_servicii',
            [
                'institutie_id_sss',
                'structura_subordonata_id_sss',
                'serviciu_id_sss',
                'localitate_id_sss',
                'is_open_weekend_sss',
                'is_open_nonstop_sss',
                'is_active_sss',

            ],
            [
                [2, 1, 18, 5236, 1, 1, 1],
                [2, 1, 16, 5236, 1, 1, 1],
                [2, 1, 19, 5236, 1, 1, 1],
            ]
        );

        // adaugare tipuri de prestari pentru IGPFR
        $this->batchInsert(
            'prestari',
            ['institutie_id_p', 'serviciu_id_p', 'denumire_p', 'is_open_weekend', 'is_open_nonstop', 'is_active'],
            [
                [2, 19, 'Eliberare aviz protectie civila', 1, 1, 1],
                [2, 19, 'Eliberare duplicat aviz protectie civila', 1, 1, 1],
                [2, 8, 'Eliberare aviz servicii urgenta', 1, 1, 1],
                [2, 8, 'Eliberare duplicat aviz servicii urgenta', 1, 1, 1],
                [2, 8, 'Reinnoire aviz servicii urgenta', 1, 1, 1],
                [2, 16, 'Eliberare Aviz activitati zona frontiera', 1, 1, 1],
                [2, 18, 'Eliberare Aviz import produse medicale', 1, 1, 1],
                [2, 18, 'Verificare eligibilitate viză călătorie', 1, 1, 1],
                [2, 18, 'Eliberare Aviz Import armament', 1, 1, 1],
                [2, 18, 'Eliberare Aviz Export armament', 1, 1, 1],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220703_145720_create_prepare_for_sustinere cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220703_145720_create_prepare_for_sustinere cannot be reverted.\n";

        return false;
    }
    */
}
