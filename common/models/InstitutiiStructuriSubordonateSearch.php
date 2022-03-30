<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InstitutiiStructuriSubordonate;

/**
 * InstitutiiStructuriSubordonateSearch represents the model behind the search form of `common\models\InstitutiiStructuriSubordonate`.
 */
class InstitutiiStructuriSubordonateSearch extends InstitutiiStructuriSubordonate
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_iss', 'institutie_parinte_iss', 'institutie_stare_iss'], 'integer'],
            [['institutie_denumire_iss', 'institutie_data_creare_iss', 'institutie_data_actualizare_iss'], 'safe'],
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
        $query = InstitutiiStructuriSubordonate::find();

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
            'id_iss' => $this->id_iss,
            'institutie_parinte_iss' => $this->institutie_parinte_iss,
            'institutie_data_creare_iss' => $this->institutie_data_creare_iss,
            'institutie_data_actualizare_iss' => $this->institutie_data_actualizare_iss,
            'institutie_stare_iss' => $this->institutie_stare_iss,
        ]);

        $query->andFilterWhere(['like', 'institutie_denumire_iss', $this->institutie_denumire_iss]);

        return $dataProvider;
    }
}
