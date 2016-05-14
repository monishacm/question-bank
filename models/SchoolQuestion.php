<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "school_questions".
 *
 * @property integer $id
 * @property integer $school_id
 * @property integer $chapter_id
 * @property integer $added_by
 * @property string $description
 * @property string $qtype
 * @property integer $marks
 * @property string $status
 * @property string $created_date
 * @property string $deleted
 *
 * @property SchoolQuestionOptions[] $schoolQuestionOptions
 * @property Chapters $chapter
 * @property Schools $school
 * @property Users $addedBy
 */
class SchoolQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school_questions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['chapter_id', 'qtype'], 'required'],
            [['school_id', 'chapter_id', 'added_by', 'marks'], 'integer'],
            [['description', 'qtype', 'status', 'deleted'], 'string'],
            [['created_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'school_id' => 'School ID',
            'chapter_id' => 'Chapter ID',
            'added_by' => 'Added By',
            'description' => 'Description',
            'qtype' => 'Qtype',
            'marks' => 'Marks',
            'status' => 'Status',
            'created_date' => 'Created Date',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptions()
    {
        return $this->hasMany(SchoolQuestionOption::className(), ['school_question_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChapter()
    {
        return $this->hasOne(Chapter::className(), ['id' => 'chapter_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchool()
    {
        return $this->hasOne(School::className(), ['id' => 'school_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'added_by']);
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->added_by = Yii::$app->user->id;
                $this->school_id = Yii::$app->session['user']['school_id'];
            }
            return true;
        }

        return false;
    }
}
