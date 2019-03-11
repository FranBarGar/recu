<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ArtistasCanciones;

/**
 * ArtistasCancionesSearch represents the model behind the search form of `app\models\ArtistasCanciones`.
 */
class ArtistasCancionesSearch extends ArtistasCanciones
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['artista_id', 'cancion_id'], 'integer'],
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
        $query = ArtistasCanciones::find();

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
            'artista_id' => $this->artista_id,
            'cancion_id' => $this->cancion_id,
        ]);

        return $dataProvider;
    }
}
