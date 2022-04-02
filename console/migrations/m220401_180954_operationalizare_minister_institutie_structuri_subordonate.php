<?php

use yii\db\Migration;

/**
 * Class m220401_180954_operationalizare_minister_institutie_structuri_subordonate
 */
class m220401_180954_operationalizare_minister_institutie_structuri_subordonate extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // CONFIGURARE MINISTERUL AFACERILOR INTERNE
        // INSERARE SERVICII
        $this->insert('ministere_servicii', ['minister_id' => 3, 'tip_serviciu_id' => 8]);
        $this->insert('ministere_servicii', ['minister_id' => 3, 'tip_serviciu_id' => 9]);
        $this->insert('ministere_servicii', ['minister_id' => 3, 'tip_serviciu_id' => 13]);
        $this->insert('ministere_servicii', ['minister_id' => 3, 'tip_serviciu_id' => 14]);
        $this->insert('ministere_servicii', ['minister_id' => 3, 'tip_serviciu_id' => 16]);
        $this->insert('ministere_servicii', ['minister_id' => 3, 'tip_serviciu_id' => 17]);
        $this->insert('ministere_servicii', ['minister_id' => 3, 'tip_serviciu_id' => 18]);
        $this->insert('ministere_servicii', ['minister_id' => 3, 'tip_serviciu_id' => 19]);


        // INSERARE STRUCTURI
        $this->insert('ministere_structuri', ['minister_id' => 3, 'structura_id' => 1]);
        $this->insert('ministere_structuri', ['minister_id' => 3, 'structura_id' => 4]);
        $this->insert('ministere_structuri', ['minister_id' => 3, 'structura_id' => 5]);
        $this->insert('ministere_structuri', ['minister_id' => 3, 'structura_id' => 6]);
        $this->insert('ministere_structuri', ['minister_id' => 3, 'structura_id' => 7]);
        $this->insert('ministere_structuri', ['minister_id' => 3, 'structura_id' => 10]);
        $this->insert('ministere_structuri', ['minister_id' => 3, 'structura_id' => 11]);
        $this->insert('ministere_structuri', ['minister_id' => 3, 'structura_id' => 13]);

        // INSERARE INSTITUTII
        $this->insert('institutie', [
            'institutie_minister_id' => 3,
            'institutie_structura' => 6,
            'institutie_denumire' => 'Inspectoratul General al Poliției Române',
            'institutie_localitate_id' => 13802,
            'institutie_data_creare' => '2022-04-01',
            'institutie_status' => 1
        ]);

        $this->insert('institutie', [
            'institutie_minister_id' => 3,
            'institutie_structura' => 6,
            'institutie_denumire' => 'Inspectoratul General al Poliției de Frontieră Romane',
            'institutie_localitate_id' => 13802,
            'institutie_data_creare' => '2022-04-01',
            'institutie_status' => 1
        ]);

        $this->insert('institutie', [
            'institutie_minister_id' => 3,
            'institutie_structura' => 6,
            'institutie_denumire' => 'Inspectoratul General pentru Situații de Urgență',
            'institutie_localitate_id' => 13802,
            'institutie_data_creare' => '2022-04-01',
            'institutie_status' => 1
        ]);

        $this->insert('institutie', [
            'institutie_minister_id' => 3,
            'institutie_structura' => 6,
            'institutie_denumire' => 'Inspectoratul General al Jandarmeriei Române',
            'institutie_localitate_id' => 13802,
            'institutie_data_creare' => '2022-04-01',
            'institutie_status' => 1
        ]);

        // INSERARE EXCEPTII
        $this->insert('ministere_exceptii', ['minister_id' => 3, 'exceptie_id' => 1]);
        $this->insert('ministere_exceptii', ['minister_id' => 3, 'exceptie_id' => 2]);
        $this->insert('ministere_exceptii', ['minister_id' => 3, 'exceptie_id' => 3]);
        $this->insert('ministere_exceptii', ['minister_id' => 3, 'exceptie_id' => 4]);
        $this->insert('ministere_exceptii', ['minister_id' => 3, 'exceptie_id' => 5]);
        $this->insert('ministere_exceptii', ['minister_id' => 3, 'exceptie_id' => 7]);

        // INSERARE UTILIZATORI MAI
        $this->insert('user', [
            'username' => 'admin_igpr',
            'cod_numeric_personal' => '1900725281965',
            'nume' => 'Tudor',
            'prenume' => 'Ionuț-Elian',
            'data_nasterii' => '1990-07-25',
            'localitatea_nasterii' => 13802,
            'auth_key' => 'qb9SxW5TIMe-w4Do4sm4yzZtr5hJRRbQ',
            'password_hash' => '$2y$13$L45w/xYLOmNCg6YkjAtQvODnwtDXChSMe7hA5i2gxktn1JRvBKDrW',
            'email' => 'admin_igpr@mail.com',
            'status' => 10,
            'created_at' => '1648917752',
            'updated_at' => '1648917752',
            'localitate_id' => 13802,
            'minister_id' => 3,
            'institutie_id' => 1,
        ]);

        $this->insert('auth_assignment', ['item_name' => 'admin_institutie', 'user_id' => 22]);

        $this->insert('user', [
            'username' => 'admin_igpf',
            'cod_numeric_personal' => '1900725281965',
            'nume' => 'Tudor',
            'prenume' => 'Ionuț-Elian',
            'data_nasterii' => '1990-07-25',
            'localitatea_nasterii' => 13802,
            'auth_key' => 'qb9SxW5TIMe-w4Do4sm4yzZtr5hJRRbQ',
            'password_hash' => '$2y$13$L45w/xYLOmNCg6YkjAtQvODnwtDXChSMe7hA5i2gxktn1JRvBKDrW',
            'email' => 'admin_igpf@mail.com',
            'status' => 10,
            'created_at' => '1648917752',
            'updated_at' => '1648917752',
            'localitate_id' => 13802,
            'minister_id' => 3,
            'institutie_id' => 2,
        ]);

        $this->insert('auth_assignment', ['item_name' => 'admin_institutie', 'user_id' => 23]);

        $this->insert('user', [
            'username' => 'admin_isu',
            'cod_numeric_personal' => '1900725281965',
            'nume' => 'Tudor',
            'prenume' => 'Ionuț-Elian',
            'data_nasterii' => '1990-07-25',
            'localitatea_nasterii' => 13802,
            'auth_key' => 'qb9SxW5TIMe-w4Do4sm4yzZtr5hJRRbQ',
            'password_hash' => '$2y$13$L45w/xYLOmNCg6YkjAtQvODnwtDXChSMe7hA5i2gxktn1JRvBKDrW',
            'email' => 'admin_isu@mail.com',
            'status' => 10,
            'created_at' => '1648917752',
            'updated_at' => '1648917752',
            'localitate_id' => 13802,
            'minister_id' => 3,
            'institutie_id' => 3,
        ]);

        $this->insert('auth_assignment', ['item_name' => 'admin_institutie', 'user_id' => 24]);

        $this->insert('user', [
            'username' => 'admin_igjr',
            'cod_numeric_personal' => '1900725281965',
            'nume' => 'Tudor',
            'prenume' => 'Ionuț-Elian',
            'data_nasterii' => '1990-07-25',
            'localitatea_nasterii' => 13802,
            'auth_key' => 'qb9SxW5TIMe-w4Do4sm4yzZtr5hJRRbQ',
            'password_hash' => '$2y$13$L45w/xYLOmNCg6YkjAtQvODnwtDXChSMe7hA5i2gxktn1JRvBKDrW',
            'email' => 'admin_igjr@mail.com',
            'status' => 10,
            'created_at' => '1648917752',
            'updated_at' => '1648917752',
            'localitate_id' => 13802,
            'minister_id' => 3,
            'institutie_id' => 4,
        ]);

        $this->insert('auth_assignment', ['item_name' => 'admin_institutie', 'user_id' => 25]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220401_180954_operationalizare_minister_institutie_structuri_subordonate cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220401_180954_operationalizare_minister_institutie_structuri_subordonate cannot be reverted.\n";

        return false;
    }
    */
}
