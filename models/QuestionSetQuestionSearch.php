<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\QuestionSetQuestion;

/**
 * QuestionSetQuestionSearch represents the model behind the search form about `app\models\QuestionSetQuestion`.
 */
class QuestionSetQuestionSearch extends QuestionSetQuestion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'question_set_id', 'question_id', 'marks'], 'integer'],
            [['deleted'], 'safe'],
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
        $query = QuestionSetQuestion::find();

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
            'question_set_id' => $this->question_set_id,
            'question_id' => $this->question_id,
            'marks' => $this->marks,
        ]);

        $query->andFilterWhere(['like', 'deleted', $this->deleted]);

        return $dataProvider;
    }
}
