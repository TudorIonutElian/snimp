<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Recenzie;

/**
 * RecenzieSearch represents the model behind the search form of `common\models\Recenzie`.
 */
class RecenzieSearch extends Recenzie
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'recenzie_institutie', 'recenzie_serviciu', 'recenzie_localitate', 'recenzie_adaugata_de', 'recenzie_numar_stele'], 'integer'],
            [['recenzie_mesaj', 'recenzie_contact_email', 'recenzie_contact_mobil', 'recenzie_data_adaugare'], 'safe'],
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
        $query = Recenzie::find();

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
            'recenzie_institutie' => $this->recenzie_institutie,
            'recenzie_serviciu' => $this->recenzie_serviciu,
            'recenzie_localitate' => $this->recenzie_localitate,
            'recenzie_adaugata_de' => $this->recenzie_adaugata_de,
            'recenzie_numar_stele' => $this->recenzie_numar_stele,
            'recenzie_data_adaugare' => $this->recenzie_data_adaugare,
        ]);

        $query->andFilterWhere(['like', 'recenzie_mesaj', $this->recenzie_mesaj])
            ->andFilterWhere(['like', 'recenzie_contact_email', $this->recenzie_contact_email])
            ->andFilterWhere(['like', 'recenzie_contact_mobil', $this->recenzie_contact_mobil]);

        return $dataProvider;
    }
}
