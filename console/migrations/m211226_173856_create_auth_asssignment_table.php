<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%auth_asssignment}}`.
 */
class m211226_173856_create_auth_asssignment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%auth_assignment}}', [
            'item_name' => $this->string(64)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->addPrimaryKey('pk_item_user', 'auth_assignment', ['item_name', 'user_id']);

        $this->addForeignKey(
            'fk_auth_user',
            'auth_assignment',
            'user_id',
            'user',
            'id',
            'RESTRICT',
            'RESTRICT'
        );

        $this->addForeignKey(
            'fk_aa_item',
            'auth_assignment',
            'item_name',
            'auth_item',
            'name',
            'RESTRICT',
            'RESTRICT'
        );

        // ROLURI
        $this->insert('auth_item', ['name'  => 'admin', 'type' => 1, 'description' => 'admin', 'rule_name'=> '', 'data'=> 'Administrator Sistem']);
        $this->insert('auth_item', ['name'  => 'admin_minister', 'type' => 1, 'description' => 'admin_minister', 'rule_name'=> '', 'data'=> 'Administrator Minister']);
        $this->insert('auth_item', ['name'  => 'admin_structura', 'type' => 1, 'description' => 'admin_structura', 'rule_name'=> '', 'data'=> 'Administrator structura']);
        $this->insert('auth_item', ['name'  => 'admin_institutie', 'type' => 1, 'description' => 'admin_institutie', 'rule_name'=> '', 'data'=> 'Administrator institutie']);
        $this->insert('auth_item', ['name'  => 'admin_serviciu', 'type' => 1, 'description' => 'admin_serviciu', 'rule_name'=> '', 'data'=> 'Administrator serviciu']);
        $this->insert('auth_item', ['name'  => 'director_institutie', 'type' => 1, 'description' => 'director_institutie', 'rule_name'=> '', 'data'=> 'Director institutie']);
        $this->insert('auth_item', ['name'  => 'sef_serviciu', 'type' => 1, 'description' => 'sef_serviciu', 'rule_name'=> '', 'data'=> 'Sef serviciu']);
        $this->insert('auth_item', ['name'  => 'lucrator_serviciu', 'type' => 1, 'description' => 'lucrator_serviciu', 'rule_name'=> '', 'data'=> 'Lucrator serviciu']);
        $this->insert('auth_item', ['name'  => 'contribuabil', 'type' => 1, 'description' => 'Contribuabil', 'rule_name'=> '', 'data'=> 'Contribuabil']);

        // PERMISIUNI
        $this->insert('auth_item', ['name'  => 'adaugare_programare', 'type' => 2, 'description' => 'adaugare_programare', 'rule_name'=> '', 'data'=> 'Adaugare programare']);
        $this->insert('auth_item', ['name'  => 'modificare_programare', 'type' => 2, 'description' => 'modificare_programare', 'rule_name'=> '', 'data'=> 'Modificare Programare']);
        $this->insert('auth_item', ['name'  => 'stergere_programare', 'type' => 2, 'description' => 'stergere_programare', 'rule_name'=> '', 'data'=> 'Stergere Programare']);
        $this->insert('auth_item', ['name'  => 'anulare_programare', 'type' => 2, 'description' => 'anulare_programare', 'rule_name'=> '', 'data'=> 'Anulare Programare']);

        $this->insert('auth_item', ['name'  => 'adaugare_exceptie', 'type' => 2, 'description' => 'adaugare_exceptie', 'rule_name'=> '', 'data'=> 'Adăugare Excepție']);
        $this->insert('auth_item', ['name'  => 'setare_exceptie', 'type' => 2, 'description' => 'setare_exceptie', 'rule_name'=> '', 'data'=> 'Setare Excepție']);
        $this->insert('auth_item', ['name'  => 'modificare_exceptie', 'type' => 2, 'description' => 'modificare_exceptie', 'rule_name'=> '', 'data'=> 'Modificare Excepție']);
        $this->insert('auth_item', ['name'  => 'stergere_exceptie', 'type' => 2, 'description' => 'stergere_exceptie', 'rule_name'=> '', 'data'=> 'Ștergere Excepție']);
        $this->insert('auth_item', ['name'  => 'anulare_exceptie', 'type' => 2, 'description' => 'anulare_exceptie', 'rule_name'=> '', 'data'=> 'Anulare Excepție']);

        $this->insert('auth_item', ['name'  => 'validare_exceptie', 'type' => 2, 'description' => 'validare_exceptie', 'rule_name'=> '', 'data'=> 'Validare Exceptie']);

        $this->insert('auth_item', ['name'  => 'adaugare_utilizatori', 'type' => 2, 'description' => 'adaugare_utilizatori', 'rule_name'=> '', 'data'=> 'Adăugare Utilizatori']);
        $this->insert('auth_item', ['name'  => 'stergere_utilizatori', 'type' => 2, 'description' => 'stergere_utilizatori', 'rule_name'=> '', 'data'=> 'Ștergere Utilizatori']);
        $this->insert('auth_item', ['name'  => 'modificare_utilizatori', 'type' => 2, 'description' => 'modificare_utilizatori', 'rule_name'=> '', 'data'=> 'Modificare Utilizatori']);
        $this->insert('auth_item', ['name'  => 'validare_utilizatori', 'type' => 2, 'description' => 'validare_utilizatori', 'rule_name'=> '', 'data'=> 'Validare Utilizatori']);

        $this->insert('auth_item', ['name'  => 'adaugare_institutie', 'type' => 2, 'description' => 'adaugare_institutie', 'rule_name'=> '', 'data'=> 'Adăugare Instituție']);
        $this->insert('auth_item', ['name'  => 'modificare_institutie', 'type' => 2, 'description' => 'modificare_institutie', 'rule_name'=> '', 'data'=> 'Modificare Insttituție']);
        $this->insert('auth_item', ['name'  => 'stergere_institutie', 'type' => 2, 'description' => 'stergere_institutie', 'rule_name'=> '', 'data'=> 'Ștergere Instituție']);

        $this->insert('auth_item', ['name'  => 'adaugare_institutie_serviciu', 'type' => 2, 'description' => 'adaugare_institutie_serviciu', 'rule_name'=> '', 'data'=> 'Adăugare Instituție Serviciu']);
        $this->insert('auth_item', ['name'  => 'stergere_institutie_serviciu', 'type' => 2, 'description' => 'stergere_institutie_serviciu', 'rule_name'=> '', 'data'=> 'Ștergere Instituție Serviciu']);



        $this->insert('auth_assignment', [
           'item_name' => 'admin',
           'user_id' => 1
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 2
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 3
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 4
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 5
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 6
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 7
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 8
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 9
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 10
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 11
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 12
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 13
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 14
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 15
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 16
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 17
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 18
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 19
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 20
        ]);

        $this->insert('auth_assignment', [
            'item_name' => 'admin_minister',
            'user_id' => 21
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_aa_item', 'auth_assignment');
        $this->dropForeignKey('fk_auth_user', 'auth_assignment');
        $this->dropTable('{{%auth_asssignment}}');
    }
}
