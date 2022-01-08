<?php

use yii\db\Migration;

/**
 * Class m220108_134757_create_insert_auth_items
 */
class m220108_134757_create_insert_auth_items extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('auth_item', ['name'  => 'admin', 'type' => 1, 'description' => 'admin', 'rule_name'=> '', 'data'=> 'Administrator Sistem']);
        $this->insert('auth_item', ['name'  => 'admin_minister', 'type' => 1, 'description' => 'admin_minister', 'rule_name'=> '', 'data'=> 'Administrator Minister']);
        $this->insert('auth_item', ['name'  => 'admin_structura', 'type' => 1, 'description' => 'admin_structura', 'rule_name'=> '', 'data'=> 'Administrator structura']);
        $this->insert('auth_item', ['name'  => 'admin_institutie', 'type' => 1, 'description' => 'admin_institutie', 'rule_name'=> '', 'data'=> 'Administrator institutie']);
        $this->insert('auth_item', ['name'  => 'admin_serviciu', 'type' => 1, 'description' => 'admin_serviciu', 'rule_name'=> '', 'data'=> 'Administrator serviciu']);

        $this->insert('auth_item', ['name'  => 'director_institutie', 'type' => 1, 'description' => 'director_institutie', 'rule_name'=> '', 'data'=> 'Director institutie']);

        $this->insert('auth_item', ['name'  => 'sef_serviciu', 'type' => 1, 'description' => 'sef_serviciu', 'rule_name'=> '', 'data'=> 'Sef serviciu']);
        $this->insert('auth_item', ['name'  => 'lucrator_serviciu', 'type' => 1, 'description' => 'lucrator_serviciu', 'rule_name'=> '', 'data'=> 'Lucrator serviciu']);
        $this->insert('auth_item', ['name'  => 'contribuabil', 'type' => 1, 'description' => 'Contribuabil', 'rule_name'=> '', 'data'=> 'Contribuabil']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220108_134757_create_insert_auth_items cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220108_134757_create_insert_auth_items cannot be reverted.\n";

        return false;
    }
    */
}
