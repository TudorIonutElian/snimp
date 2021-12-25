<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TipuriServiciu;

/**
 * TipuriServiciuSearch represents the model behind the search form of `common\models\TipuriServiciu`.
 */
class TipuriServiciuSearch extends TipuriServiciu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tip_serviciu_active'], 'integer'],
            [['tip_serviciu_denumire', 'tip_serviciu_start_date', 'tip_serviciu_end_date'], 'safe'],
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
        $query = TipuriServiciu::find();

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
            'tip_serviciu_start_date' => $this->tip_serviciu_start_date,
            'tip_serviciu_end_date' => $this->tip_serviciu_end_date,
            'tip_serviciu_active' => $this->tip_serviciu_active,
        ]);

        $query->andFilterWhere(['like', 'tip_serviciu_denumire', $this->tip_serviciu_denumire]);

        return $dataProvider;
    }
}
