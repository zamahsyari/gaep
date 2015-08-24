<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tutorial".
 *
 * @property integer $id
 * @property string $judul
 * @property string $file
 * @property string $thumb
 * @property string $username
 * @property string $tag
 * @property integer $subkategori_id
 * @property string $deskripsi
 * @property string $downloads
 * @property string $views
 * @property string $created
 * @property string $modified
 *
 * @property Subkategori $subkategori
 * @property Users $username0
 */
class Tutorial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tutorial';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subkategori_id', 'downloads', 'views'], 'integer'],
            [['deskripsi'], 'string'],
            [['created', 'modified'], 'safe'],
            [['judul'], 'string', 'max' => 250],
            [['file', 'thumb'], 'string', 'max' => 500],
            [['username'], 'string', 'max' => 100],
            [['tag'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul',
            'file' => 'File',
            'thumb' => 'Thumb',
            'username' => 'Username',
            'tag' => 'Tag',
            'subkategori_id' => 'Subkategori ID',
            'deskripsi' => 'Deskripsi',
            'downloads' => 'Downloads',
            'views' => 'Views',
            'created' => 'Created',
            'modified' => 'Modified',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubkategori()
    {
        return $this->hasOne(Subkategori::className(), ['id' => 'subkategori_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsername0()
    {
        return $this->hasOne(Users::className(), ['username' => 'username']);
    }
}
