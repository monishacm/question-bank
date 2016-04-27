<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SchoolSubscription;

/**
 * SchoolSubscriptionSearch represents the model behind the search form about `app\models\SchoolSubscription`.
 */
class SchoolSubscriptionSearch extends SchoolSubscription
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'school_id'], 'integer'],
            [['types', 'start_date', 'expiry', 'deleted'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = SchoolSubscription::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'school_id' => $this->school_id,
            'start_date' => $this->start_date,
            'expiry' => $this->expiry,
        ]);

        $query->andFilterWhere(['like', 'types', $this->types])
            ->andFilterWhere(['like', 'deleted', $this->deleted]);

        return $dataProvider;
    }
}
