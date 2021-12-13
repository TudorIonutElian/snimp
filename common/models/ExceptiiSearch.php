<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Exceptii;

/**
 * ExceptiiSearch represents the model behind the search form of `common\models\Exceptii`.
 */
class ExceptiiSearch extends Exceptii
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status_exceptie'], 'integer'],
            [['denumire_exceptie', 'start_exceptie', 'end_exceptie'], 'safe'],
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
        $query = Exceptii::find();

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
            'start_exceptie' => $this->start_exceptie,
            'end_exceptie' => $this->end_exceptie,
            'status_exceptie' => $this->status_exceptie,
        ]);

        $query->andFilterWhere(['like', 'denumire_exceptie', $this->denumire_exceptie]);

        return $dataProvider;
    }
}
