<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SesizareEmail;

/**
 * SesizareEmailSearch represents the model behind the search form of `common\models\SesizareEmail`.
 */
class SesizareEmailSearch extends SesizareEmail
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sesizare_institutie', 'sesizare_email_status'], 'integer'],
            [['sesizare_email_address', 'sesizare_email_data_adaugare'], 'safe'],
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
        $query = SesizareEmail::find();

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
            'sesizare_institutie' => $this->sesizare_institutie,
            'sesizare_email_data_adaugare' => $this->sesizare_email_data_adaugare,
            'sesizare_email_status' => $this->sesizare_email_status,
        ]);

        $query->andFilterWhere(['like', 'sesizare_email_address', $this->sesizare_email_address]);

        return $dataProvider;
    }
}
