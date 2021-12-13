<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ServiciiExceptii;

/**
 * ServiciiExceptiiSearch represents the model behind the search form of `common\models\ServiciiExceptii`.
 */
class ServiciiExceptiiSearch extends ServiciiExceptii
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_se', 'serviciu_id_se', 'added_by_se', 'is_active_se'], 'integer'],
            [['start_exceptie_se', 'end_exceptie_se'], 'safe'],
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
        $query = ServiciiExceptii::find();

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
            'id_se' => $this->id_se,
            'serviciu_id_se' => $this->serviciu_id_se,
            'start_exceptie_se' => $this->start_exceptie_se,
            'end_exceptie_se' => $this->end_exceptie_se,
            'added_by_se' => $this->added_by_se,
            'is_active_se' => $this->is_active_se,
        ]);

        return $dataProvider;
    }
}
