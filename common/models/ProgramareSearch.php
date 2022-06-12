<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Programare;

/**
 * ProgramareSearch represents the model behind the search form of `common\models\Programare`.
 */
class ProgramareSearch extends Programare
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'programare_minister', 'programare_institutie', 'programare_serviciu', 'programare_localitate', 'programare_user', 'programare_validata_de', 'programare_data_finalizare', 'programare_document_solicitat'], 'integer'],
            [['programare_datetime', 'programare_numar_unic', 'programare_data_numar_unic'], 'safe'],
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
        $query = Programare::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
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
            'programare_minister' => $this->programare_minister,
            'programare_institutie' => $this->programare_institutie,
            'programare_serviciu' => $this->programare_serviciu,
            'programare_localitate' => $this->programare_localitate,
            'programare_user' => $this->programare_user,
            'programare_datetime' => $this->programare_datetime,
            'programare_validata_de' => $this->programare_validata_de,
            'programare_data_numar_unic' => $this->programare_data_numar_unic,
            'programare_data_finalizare' => $this->programare_data_finalizare,
            'programare_document_solicitat' => $this->programare_document_solicitat,
        ]);

        $query->andFilterWhere(['like', 'programare_numar_unic', $this->programare_numar_unic]);

        return $dataProvider;
    }
}
