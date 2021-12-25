<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Regiune;

/**
 * RegiuneSearch represents the model behind the search form of `common\models\Regiune`.
 */
class RegiuneSearch extends Regiune
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'regiune_status'], 'integer'],
            [['regiune_nume', 'regiune_created', 'regiune_updated'], 'safe'],
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
        $query = Regiune::find();

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
            'regiune_status' => $this->regiune_status,
            'regiune_created' => $this->regiune_created,
            'regiune_updated' => $this->regiune_updated,
        ]);

        $query->andFilterWhere(['like', 'regiune_nume', $this->regiune_nume]);

        return $dataProvider;
    }
}
