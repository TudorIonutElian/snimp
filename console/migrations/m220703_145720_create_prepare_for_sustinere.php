<?php

use yii\db\Migration;

/**
 * Class m220703_145720_create_prepare_for_sustinere
 */
class m220703_145720_create_prepare_for_sustinere extends Migration
{
    public $nume_familie = [
        'Vlad',
        'Iuliu',
        'George',
        'Horațiu',
        'Petru',
        'Pălici',
        'Niță',
        'Pîndaru',
        'Cristea',
        'Popescu',
        'Pîndaru',
        'Ionescu',
        'Ciocîrlan',
        'Andreescu',
        'Pîndaru',
        'Mărguța',
        'Voinea',
        'Marin',
        'Dumitru',
        'Vîlculescu',
        'Stoica',
        'Buţi',
        'Chirilă',
        'Mărguța',
        'Petrescu',
        'Iancu',
        'Pop',
        'Dobrică',
        'Todică',
        'Găbureanu',
        'Drăghici',
        'Todică',
        'Ciobanu',
        'Găbureanu',
        'Toma',
        'Diaconu',
        'Chiriţă',
        'Buţi',
        'Dumitrescu',
        'Dîrjan',
        'Stan',
        'Cătălin',
        'Angelica',
        'Dumitru',
        'Pușcașu',
        'Niță',
        'Ștefan',
        'Niță',
        'Nicolae',
        'Dobre',
        'Ciobanu',
        'Olteanu',
        'Mălăeru',
        'Cristian',
        'Andreescu',
        'Moldoveanu',
        'Stăruială',
        'Diaconescu',
        'Bratosin',
        'Gherghe',
        'Ursu',
        'Teodorescu',
        'Dragomir',
        'Pavel',
        'Chirilă',
        'Popescu',
        'Țuțea',
        'Tomescu',
        'Bușe',
        'Bîrsan',
        'Florescu',
        'Dumitrescu',
        'Manole',
        'Florea',
        'Pîndaru',
        'Manole',
        'Gherban',
        'Niță',
        'Țuțea',
        'Pavel',
        'Mhădă',
        'Mălâia',
        'Chiriţă',
        'Mihadă',
        'Drăgan',
        'Negoiță',
        'Radu',
        'Slăboiu',
        'Cristea',
        'Tămaș',
        'Tocmelea',
        'Bratosin',
        'Mocanu',
        'Dabija',
    ];

    public $prenume = [
        'Iulian',
        'Săsăran',
        'Horia',
        'Marius',
        'Anton',
        'Ionut',
        'Niță',
        'Elena',
        'Ania',
        'Nicolae',
        'Victor',
        'Maria',
        'Bogdan',
        'Lina',
        'George',
        'Valentina',
        'Florin',
        'Diana',
        'Aurelian',
        'Ionut',
        'Andreea',
        'Sabina',
        'Oana',
        'Valentina',
        'Codrut',
        'Mirel',
        'Georgiana',
        'Victoria',
        'Gabriel',
        'Monica',
    ];

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
                [2, 8, 13802, 1, 1, 1],
                [2, 16, 13802, 1, 1, 1],
                [2, 18, 13802, 1, 1, 1],
                [2, 19, 13802, 1, 1, 1],
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
                [2, 1],
                [2, 2],
                [2, 3],
                [2, 7]
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

        // adaugare lucratori
        $this->adaugaLucratoriServiciu(10);
        $this->adaugareProgramariMAI();
    }

    private function adaugaLucratoriServiciu($number)
    {
        for ($i = 0; $i < $number; $i++) {
            $nume = $this->nume_familie[rand(1, count($this->nume_familie) - 1)];
            $prenume = $this->prenume[rand(1, count($this->prenume) - 1)];

            $user = new \common\models\User();
            $user->username = strtolower($prenume).'.'.strtolower($nume);
            $user->cod_numeric_personal = '1900725281965';
            $user->nume = $nume;
            $user->prenume = $prenume;
            $user->data_nasterii = '1990-07-25';
            $user->localitatea_nasterii = 13802;
            $user->auth_key = 'pkoE6oRupK5xnuH9ugsLs52ruHXS_mfG';
            $user->password_hash = '$2y$13$TkicWzINi4mt5FAHd9LZ7.Kr4rk8MOsL.ORxohBlJeHaNCvtBGNQG';
            $user->email = strtolower($prenume).'.'.strtolower($nume) . '@snimp.ro';
            $user->status = 10;
            $user->created_at = 1656933687;
            $user->updated_at = 1656933687;
            $user->localitate_id = 13802;
            $user->minister_id = 3;
            $user->institutie_id = 2;
            $user->institutie_subordonata_id = 1;

            if ($user->save()) {
                $rolUser = new \common\models\AuthAssignment();
                $rolUser->item_name = 'lucrator_serviciu';
                $rolUser->user_id = $user->id;
                $rolUser->save();
            }

        }
    }

    private function adaugareProgramariMAI(){
        $random_hours = ['08', '09', '10', '11', '12', '13', '14', '15', '16'];
        $random_minutes = ['00', '15', '30', '45'];

        for ($i = 0; $i < 1000; $i++){
            $programare_nume = $this->nume_familie[rand(1, count($this->nume_familie)-1)];
            $programare_prenume = $this->prenume[rand(1, count($this->prenume)-1)];

            $programareNoua = new \common\models\Programare();
            $programareNoua->programare_localitate = 13802;
            $programareNoua->programare_minister = 3;
            $programareNoua->programare_institutie = 2;
            $programareNoua->programare_structura_subordonata = 1;

            $serviciu_id = 16;

            if($i > 200){
                $serviciu_id = 18;
            }

            if($i > 400){
                $serviciu_id = 19;
            }
            $programareNoua->programare_serviciu = $serviciu_id; // 18
            $programareNoua->programare_prestare = 6; //10

            $punct_lucru_id = 2;

            if($i > 200){
                $punct_lucru_id = 3;
            }

            if($i > 600){
                $punct_lucru_id = 4;
            }
            $programareNoua->programare_punct_lucru = $punct_lucru_id; // 2-4;

            $random_date = '2022-07-0'.rand(1, 6);

            $random_hour = $random_hours[rand(0, count($random_hours)-1)];
            $random_minute = $random_minutes[rand(0, count($random_minutes)-1)];

            $fullDate = $random_date.' '.$random_hour.':'.$random_minute;

            $programareNoua->programare_datetime = $fullDate;
            $programareNoua->programare_email    = strtolower($programare_nume).'.'.strtolower($programare_prenume).'@gmail.com';
            $programareNoua->programare_nume     = $programare_nume;
            $programareNoua->programare_prenume  = $programare_prenume;

            $programareNoua->save();
        }
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
