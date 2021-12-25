<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InstitutieServiciu;

/**
 * InstitutieServiciuSearch represents the model behind the search form of `common\models\InstitutieServiciu`.
 */
class InstitutieServiciuSearch extends InstitutieServiciu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'is_institutie', 'is_serviciu', 'is_localitate', 'is_open_weekend', 'is_open_nonstop', 'is_active'], 'integer'],
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
        $query = InstitutieServiciu::find();

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
            'is_institutie' => $this->is_institutie,
            'is_serviciu' => $this->is_serviciu,
            'is_localitate' => $this->is_localitate,
            'is_open_weekend' => $this->is_open_weekend,
            'is_open_nonstop' => $this->is_open_nonstop,
            'is_active' => $this->is_active,
        ]);

        return $dataProvider;
    }
}
