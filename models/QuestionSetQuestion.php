<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question_set_questions".
 *
 * @property integer $id
 * @property integer $question_set_id
 * @property integer $question_id
 * @property integer $marks
 * @property string $deleted
 */
class QuestionSetQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_set_questions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_set_id', 'question_id'], 'required'],
            [['question_set_id', 'question_id', 'marks'], 'integer'],
            [['deleted'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question_set_id' => 'Question Set ID',
            'question_id' => 'Question ID',
            'marks' => 'Marks',
            'deleted' => 'Deleted',
        ];
    }
}
