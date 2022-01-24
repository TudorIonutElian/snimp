<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MinistereServicii;

/**
 * MinistereServiciiSearch represents the model behind the search form of `common\models\MinistereServicii`.
 */
class MinistereServiciiSearch extends MinistereServicii
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'minister_id', 'tip_serviciu_id'], 'integer'],
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
        $query = MinistereServicii::find();

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
            'minister_id' => $this->minister_id,
            'tip_serviciu_id' => $this->tip_serviciu_id,
        ]);

        return $dataProvider;
    }
}
