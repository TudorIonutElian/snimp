<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LocalitatiServicii;

/**
 * LocalitatiServiciiSearch represents the model behind the search form of `common\models\LocalitatiServicii`.
 */
class LocalitatiServiciiSearch extends LocalitatiServicii
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'serviciu_id', 'institutie_id', 'localitate_id', 'servicii_weekend', 'servicii_non_stop', 'is_active'], 'integer'],
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
        $query = LocalitatiServicii::find();

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
            'serviciu_id' => $this->serviciu_id,
            'institutie_id' => $this->institutie_id,
            'localitate_id' => $this->localitate_id,
            'servicii_weekend' => $this->servicii_weekend,
            'servicii_non_stop' => $this->servicii_non_stop,
            'is_active' => $this->is_active,
        ]);

        return $dataProvider;
    }
}
