<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question_options".
 *
 * @property integer $id
 * @property integer $question_id
 * @property string $description
 * @property string $correct_answer
 * @property integer $marks
 * @property string $deleted
 */
class QuestionOption extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_id'], 'required'],
            [['question_id', 'marks'], 'integer'],
            [['correct_answer', 'deleted'], 'string'],
            [['description'], 'string', 'max' => 1024]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question_id' => 'Question ID',
            'description' => 'Description',
            'correct_answer' => 'Correct Answer',
            'marks' => 'Marks',
            'deleted' => 'Deleted',
        ];
    }
}
