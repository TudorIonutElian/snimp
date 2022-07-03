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
