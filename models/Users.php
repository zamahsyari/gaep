<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $realname
 * @property integer $country
 * @property double $point
 * @property string $created
 * @property string $modified
 * @property string $last_access
 *
 * @property Tutorial[] $tutorials
 */
class Users extends \yii\db\ActiveRecord
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
            [['username'], 'required'],
            [['country'], 'integer'],
            [['point'], 'number'],
            [['created', 'modified', 'last_access'], 'safe'],
            [['username'], 'string', 'max' => 100],
            [['password', 'email', 'realname'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'realname' => 'Realname',
            'country' => 'Country',
            'point' => 'Point',
            'created' => 'Created',
            'modified' => 'Modified',
            'last_access' => 'Last Access',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTutorials()
    {
        return $this->hasMany(Tutorial::className(), ['username' => 'username']);
    }
}
