<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question_sets".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $school_id
 * @property string $question_type
 * @property string $notes
 * @property integer $marks
 * @property string $created_date
 * @property string $deleted
 *
 * @property Users $user
 * @property Schools $school
 */
class QuestionSet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_sets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'school_id', 'question_type'], 'required'],
            [['user_id', 'school_id', 'marks'], 'integer'],
            [['question_type', 'deleted'], 'string'],
            [['created_date'], 'safe'],
            [['notes'], 'string', 'max' => 1024]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'school_id' => 'School ID',
            'question_type' => 'Exam Type',
            'notes' => 'Notes',
            'marks' => 'Marks',
            'created_date' => 'Created Date',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchool()
    {
        return $this->hasOne(School::className(), ['id' => 'school_id']);
    }
}
