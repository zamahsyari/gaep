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
 * @property integer $user_id
 * @property string $tag
 * @property integer $subkategori_id
 * @property string $deskripsi
 * @property string $downloads
 * @property string $views
 * @property string $created
 * @property string $modified
 *
 * @property User $user
 * @property Subkategori $subkategori
 */
class Tutorial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file_upload;
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
            [['user_id', 'subkategori_id', 'downloads', 'views'], 'integer'],
            [['deskripsi'], 'string'],
            [['created', 'modified'], 'safe'],
            [['judul'], 'string', 'max' => 250],
            [['file', 'thumb'], 'string', 'max' => 500],
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
            'user_id' => 'User ID',
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubkategori()
    {
        return $this->hasOne(Subkategori::className(), ['id' => 'subkategori_id']);
    }
}
