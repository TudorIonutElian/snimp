<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SesizariEmail;

/**
 * SesizariEmailSearch represents the model behind the search form of `common\models\SesizariEmail`.
 */
class SesizariEmailSearch extends SesizariEmail
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sesizare_email_status'], 'integer'],
            [['sesizare_email', 'sesizare_email_data_adaugare'], 'safe'],
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
        $query = SesizariEmail::find();

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
            'sesizare_email_status' => $this->sesizare_email_status,
            'sesizare_email_data_adaugare' => $this->sesizare_email_data_adaugare,
        ]);

        $query->andFilterWhere(['like', 'sesizare_email', $this->sesizare_email]);

        return $dataProvider;
    }
}
