<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Sesizari;

/**
 * SesizariSearch represents the model behind the search form of `common\models\Sesizari`.
 */
class SesizariSearch extends Sesizari
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sesizare_user_id', 'sesizare_status'], 'integer'],
            [['sesizare_titlu', 'sesizare_continut', 'sesizare_imagine', 'sesizare_ip', 'sesizare_data_creare', 'sesizare_data_solutionare', 'sesizare_comentariu'], 'safe'],
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
        $query = Sesizari::find();

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
            'sesizare_user_id' => $this->sesizare_user_id,
            'sesizare_data_creare' => $this->sesizare_data_creare,
            'sesizare_data_solutionare' => $this->sesizare_data_solutionare,
            'sesizare_status' => $this->sesizare_status,
        ]);

        $query->andFilterWhere(['like', 'sesizare_titlu', $this->sesizare_titlu])
            ->andFilterWhere(['like', 'sesizare_continut', $this->sesizare_continut])
            ->andFilterWhere(['like', 'sesizare_imagine', $this->sesizare_imagine])
            ->andFilterWhere(['like', 'sesizare_ip', $this->sesizare_ip])
            ->andFilterWhere(['like', 'sesizare_comentariu', $this->sesizare_comentariu]);

        return $dataProvider;
    }
}
