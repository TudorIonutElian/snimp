<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TipuriExceptie;

/**
 * TipuriExceptieSearch represents the model behind the search form of `common\models\TipuriExceptie`.
 */
class TipuriExceptieSearch extends TipuriExceptie
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'te_exceptie_status'], 'integer'],
            [['te_exceptie_denumire', 'te_exceptie_start', 'te_exceptie_end'], 'safe'],
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
        $query = TipuriExceptie::find();

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
            'te_exceptie_start' => $this->te_exceptie_start,
            'te_exceptie_end' => $this->te_exceptie_end,
            'te_exceptie_status' => $this->te_exceptie_status,
        ]);

        $query->andFilterWhere(['like', 'te_exceptie_denumire', $this->te_exceptie_denumire]);

        return $dataProvider;
    }
}
