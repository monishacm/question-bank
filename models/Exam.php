<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "classes".
 *
 * @property integer $id
 * @property string $title
 * @property string $deleted
 *
 * @property Subjects[] $subjects
 */
class Exam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'exams';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['school_id'], 'integer'],
            [['deleted'], 'string'],
            [['title'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'school_id' => "School ID",
            'title' => 'Title',
            'deleted' => 'Deleted',
        ];
    }

    public function getSchool() {
        return $this->hasOne(School::className(), ['id' => 'school_id']);
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->school_id = Yii::$app->session['user']['school_id'];
            }
            return true;
        }

        return false;
    }
}
