<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chapters".
 *
 * @property integer $id
 * @property integer $subject_id
 * @property string $title
 * @property string $status
 * @property string $deleted
 *
 * @property Subjects $subject
 */
class Chapter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chapters';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject_id', 'title'], 'required'],
            [['subject_id'], 'integer'],
            [['status', 'deleted'], 'string'],
            [['title'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject_id' => 'Subject ID',
            'title' => 'Title',
            'status' => 'Status',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }
}
