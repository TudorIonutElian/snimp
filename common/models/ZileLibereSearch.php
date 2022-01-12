<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ZileLibere;

/**
 * ZileLibereSearch represents the model behind the search form of `common\models\ZileLibere`.
 */
class ZileLibereSearch extends ZileLibere
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'anul_calendaristic'], 'integer'],
            [['data_calendaristica'], 'safe'],
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
        $query = ZileLibere::find();

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
            'anul_calendaristic' => $this->anul_calendaristic,
            'data_calendaristica' => $this->data_calendaristica,
        ]);

        return $dataProvider;
    }
}
