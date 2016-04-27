<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "questions".
 *
 * @property integer $id
 * @property integer $chapter_id
 * @property integer $added_by
 * @property string $description
 * @property string $qtype
 * @property integer $marks
 * @property string $status
 * @property string $created_date
 * @property string $deleted
 *
 * @property Chapters $chapter
 * @property Users $addedBy
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'questions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['chapter_id', 'qtype'], 'required'],
            [['chapter_id', 'added_by', 'marks'], 'integer'],
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
    public function getChapter()
    {
        return $this->hasOne(Chapters::className(), ['id' => 'chapter_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddedBy()
    {
        return $this->hasOne(Users::className(), ['id' => 'added_by']);
    }
}