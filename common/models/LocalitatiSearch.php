<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Localitati;

/**
 * LocalitatiSearch represents the model behind the search form of `common\models\Localitati`.
 */
class LocalitatiSearch extends Localitati
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'localitate_judet', 'localitate_status', 'localitate_urban', 'localitate_resedinta'], 'integer'],
            [['localitate_nume', 'localitate_created', 'localitate_updated'], 'safe'],
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
        $query = Localitati::find();

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
            'localitate_judet' => $this->localitate_judet,
            'localitate_status' => $this->localitate_status,
            'localitate_urban' => $this->localitate_urban,
            'localitate_resedinta' => $this->localitate_resedinta,
            'localitate_created' => $this->localitate_created,
            'localitate_updated' => $this->localitate_updated,
        ]);

        $query->andFilterWhere(['like', 'localitate_nume', $this->localitate_nume]);

        return $dataProvider;
    }
}
