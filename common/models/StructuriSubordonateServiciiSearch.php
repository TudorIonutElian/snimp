<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StructuriSubordonateServicii;

/**
 * StructuriSubordonateServiciiSearch represents the model behind the search form of `common\models\StructuriSubordonateServicii`.
 */
class StructuriSubordonateServiciiSearch extends StructuriSubordonateServicii
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sss', 'institutie_id_sss', 'structura_subordonata_id_sss', 'serviciu_id_sss', 'localitate_id_sss', 'is_open_weekend_sss', 'is_open_nonstop_sss', 'is_active_sss'], 'integer'],
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
        $query = StructuriSubordonateServicii::find();

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
            'id_sss' => $this->id_sss,
            'institutie_id_sss' => $this->institutie_id_sss,
            'structura_subordonata_id_sss' => $this->structura_subordonata_id_sss,
            'serviciu_id_sss' => $this->serviciu_id_sss,
            'localitate_id_sss' => $this->localitate_id_sss,
            'is_open_weekend_sss' => $this->is_open_weekend_sss,
            'is_open_nonstop_sss' => $this->is_open_nonstop_sss,
            'is_active_sss' => $this->is_active_sss,
        ]);

        return $dataProvider;
    }
}
