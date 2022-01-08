<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Minister;

/**
 * MinisterSearch represents the model behind the search form of `common\models\Minister`.
 */
class MinisterSearch extends Minister
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'minister_localitate', 'minister_created_at', 'minister_updated_at', 'minister_status'], 'integer'],
            [['minister_denumire', 'minister_adresa'], 'safe'],
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
        $query = Minister::find();

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
            'minister_localitate' => $this->minister_localitate,
            'minister_created_at' => $this->minister_created_at,
            'minister_updated_at' => $this->minister_updated_at,
            'minister_status' => $this->minister_status,
        ]);

        $query->andFilterWhere(['like', 'minister_denumire', $this->minister_denumire])
            ->andFilterWhere(['like', 'minister_adresa', $this->minister_adresa]);

        return $dataProvider;
    }
}
