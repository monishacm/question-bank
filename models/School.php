<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schools".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $created_date
 * @property string $deleted
 *
 * @property SchoolQuestions[] $schoolQuestions
 */
class School extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schools';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address'], 'required'],
            [['created_date'], 'safe'],
            [['deleted'], 'string'],
            [['name', 'address'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'created_date' => 'Created Date',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchoolQuestions()
    {
        return $this->hasMany(SchoolQuestions::className(), ['school_id' => 'id']);
    }
}
