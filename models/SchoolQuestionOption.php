<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "school_question_options".
 *
 * @property integer $id
 * @property integer $school_question_id
 * @property string $description
 * @property string $correct_answer
 * @property integer $marks
 * @property string $deleted
 *
 * @property SchoolQuestions $schoolQuestion
 */
class SchoolQuestionOption extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school_question_options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_question_id'], 'required'],
            [['school_question_id', 'marks'], 'integer'],
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
            'school_question_id' => 'School Question ID',
            'description' => 'Description',
            'correct_answer' => 'Correct Answer',
            'marks' => 'Marks',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchoolQuestion()
    {
        return $this->hasOne(SchoolQuestions::className(), ['id' => 'school_question_id']);
    }
}
