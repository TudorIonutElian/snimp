<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%institutii_structuri_subordonate}}`.
 */
class m220330_213631_create_institutii_structuri_subordonate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%institutii_structuri_subordonate}}', [
            'id_iss' => $this->primaryKey(),
            'institutie_parinte_iss'             => $this->integer()->notNull(),
            'institutie_denumire_iss'            => $this->string(100)->notNull(),
            'institutie_data_creare_iss'         => $this->date()->defaultExpression('current_timestamp'),
            'institutie_data_actualizare_iss'    => $this->date()->defaultExpression('current_timestamp'),
            'institutie_stare_iss'               => $this->tinyInteger(1)->defaultValue(1),
            'institutie_localitate_id_iss'       => $this->integer()->notNull(),
            'institutie_judet_id_iss'            => $this->integer()->notNull(),
            'institutie_regiune_id_iss'          => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk_iss_localitate_id',
            'institutii_structuri_subordonate',
            'institutie_localitate_id_iss',
            'localitate',
            'id',
            'cascade',
            'cascade'
        );

        $this->addForeignKey(
            'fk_iss_judet_id',
            'institutii_structuri_subordonate',
            'institutie_judet_id_iss',
            'judet',
            'id',
            'cascade',
            'cascade'
        );

        $this->addForeignKey(
            'fk_iss_regiune_id',
            'institutii_structuri_subordonate',
            'institutie_regiune_id_iss',
            'regiune',
            'id',
            'cascade',
            'cascade'
        );

        $this->addForeignKey(
            'fk_iss_parinte_id',
            'institutii_structuri_subordonate',
            'institutie_parinte_iss',
            'institutie',
            'id',
            'cascade',
            'cascade'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_iss_parinte_id', 'institutii_structuri_subordonate');
        $this->dropForeignKey('fk_iss_localitate_id', 'institutii_structuri_subordonate');
        $this->dropTable('{{%institutii_structuri_subordonate}}');
    }
}
