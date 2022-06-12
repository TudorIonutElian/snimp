<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StructuriSubordonatePuncteLucru;

/**
 * StructuriSubordonatePuncteLucruSearch represents the model behind the search form of `common\models\StructuriSubordonatePuncteLucru`.
 */
class StructuriSubordonatePuncteLucruSearch extends StructuriSubordonatePuncteLucru
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sspl', 'minister_id_sspl', 'institutie_id_sspl', 'structura_subordonata_id_sspl', 'localitate_id_sspl'], 'integer'],
            [['strada_sspl', 'numar_strada_sspl', 'bloc_strada_sspl', 'scara_bloc_sspl', 'etaj_bloc_sspl', 'apartament_sspl'], 'safe'],
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
        $query = StructuriSubordonatePuncteLucru::find();

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
            'id_sspl' => $this->id_sspl,
            'minister_id_sspl' => $this->minister_id_sspl,
            'institutie_id_sspl' => $this->institutie_id_sspl,
            'structura_subordonata_id_sspl' => $this->structura_subordonata_id_sspl,
            'localitate_id_sspl' => $this->localitate_id_sspl,
        ]);

        $query->andFilterWhere(['like', 'strada_sspl', $this->strada_sspl])
            ->andFilterWhere(['like', 'numar_strada_sspl', $this->numar_strada_sspl])
            ->andFilterWhere(['like', 'bloc_strada_sspl', $this->bloc_strada_sspl])
            ->andFilterWhere(['like', 'scara_bloc_sspl', $this->scara_bloc_sspl])
            ->andFilterWhere(['like', 'etaj_bloc_sspl', $this->etaj_bloc_sspl])
            ->andFilterWhere(['like', 'apartament_sspl', $this->apartament_sspl]);

        return $dataProvider;
    }

    public function searchPropuneriAprobare($params)
    {
        $query = StructuriSubordonatePuncteLucru::find();
        $query->where([
            'and',
            ['institutie_id_sspl' => \Yii::$app->user->identity->institutie_id],
            ['aprobat_administrator_sspl' => 0]
        ]);

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
            'id_sspl' => $this->id_sspl,
            'minister_id_sspl' => $this->minister_id_sspl,
            'institutie_id_sspl' => $this->institutie_id_sspl,
            'structura_subordonata_id_sspl' => $this->structura_subordonata_id_sspl,
            'localitate_id_sspl' => $this->localitate_id_sspl,
        ]);

        $query->andFilterWhere(['like', 'strada_sspl', $this->strada_sspl])
            ->andFilterWhere(['like', 'numar_strada_sspl', $this->numar_strada_sspl])
            ->andFilterWhere(['like', 'bloc_strada_sspl', $this->bloc_strada_sspl])
            ->andFilterWhere(['like', 'scara_bloc_sspl', $this->scara_bloc_sspl])
            ->andFilterWhere(['like', 'etaj_bloc_sspl', $this->etaj_bloc_sspl])
            ->andFilterWhere(['like', 'apartament_sspl', $this->apartament_sspl]);

        return $dataProvider;
    }
}
