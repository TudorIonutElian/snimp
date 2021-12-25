<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Judet;

/**
 * JudetSearch represents the model behind the search form of `common\models\Judet`.
 */
class JudetSearch extends Judet
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'judet_regiune', 'judet_status'], 'integer'],
            [['judet_indicativ', 'judet_nume', 'judet_created', 'judet_updated'], 'safe'],
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
        $query = Judet::find();

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
            'judet_regiune' => $this->judet_regiune,
            'judet_status' => $this->judet_status,
            'judet_created' => $this->judet_created,
            'judet_updated' => $this->judet_updated,
        ]);

        $query->andFilterWhere(['like', 'judet_indicativ', $this->judet_indicativ])
            ->andFilterWhere(['like', 'judet_nume', $this->judet_nume]);

        return $dataProvider;
    }
}
