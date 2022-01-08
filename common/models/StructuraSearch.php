<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Structura;

/**
 * StructuraSearch represents the model behind the search form of `common\models\Structura`.
 */
class StructuraSearch extends Structura
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'structura_minister', 'structura_status'], 'integer'],
            [['structura_nume', 'structura_start_date', 'structura_end_date'], 'safe'],
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
        $query = Structura::find();

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
            'structura_minister' => $this->structura_minister,
            'structura_start_date' => $this->structura_start_date,
            'structura_end_date' => $this->structura_end_date,
            'structura_status' => $this->structura_status,
        ]);

        $query->andFilterWhere(['like', 'structura_nume', $this->structura_nume]);

        return $dataProvider;
    }
}
