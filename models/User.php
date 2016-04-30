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
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'full_name'], 'required'],
            [['email'], 'email'],
            [['full_name', 'phone_no'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'email' => 'Email',
            'password' => 'Password',
            'roll' => 'Roll',
            'full_name' => "Full Name",
            'deleted' => 'Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchool()
    {
        return $this->hasOne(School::className(), ['school_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if($this->isNewRecord) {
            $this->created_date = date("Y-m-d H:i:s");
            $this->password = md5($this->password);

            if($this->school_id) $this->roll = "teacher";
        }

        return parent::beforeSave($insert);
    }
}
