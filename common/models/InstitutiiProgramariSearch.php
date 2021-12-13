<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InstitutiiProgramari;

/**
 * InstitutiiProgramariSearch represents the model behind the search form of `common\models\InstitutiiProgramari`.
 */
class InstitutiiProgramariSearch extends InstitutiiProgramari
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ip_institutie_id', 'ip_user_id', 'ip_localitate_id', 'ip_validata_de', 'ip_status'], 'integer'],
            [['ip_date_time', 'ip_data_finalizare'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = InstitutiiProgramari::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'ip_institutie_id' => $this->ip_institutie_id,
            'ip_user_id' => $this->ip_user_id,
            'ip_date_time' => $this->ip_date_time,
            'ip_localitate_id' => $this->ip_localitate_id,
            'ip_validata_de' => $this->ip_validata_de,
            'ip_status' => $this->ip_status,
            'ip_data_finalizare' => $this->ip_data_finalizare,
        ]);

        return $dataProvider;
    }
}
