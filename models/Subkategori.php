<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subkategori".
 *
 * @property integer $id
 * @property integer $kategori_id
 * @property string $nama
 * @property string $deskripsi
 * @property string $icon
 *
 * @property Kategori $kategori
 * @property Tutorial[] $tutorials
 */
class Subkategori extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subkategori';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'kategori_id'], 'integer'],
            [['deskripsi'], 'string'],
            [['nama'], 'string', 'max' => 250],
            [['icon'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kategori_id' => 'Kategori ID',
            'nama' => 'Nama',
            'deskripsi' => 'Deskripsi',
            'icon' => 'Icon',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategori()
    {
        return $this->hasOne(Kategori::className(), ['id' => 'kategori_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTutorials()
    {
        return $this->hasMany(Tutorial::className(), ['subkategori_id' => 'id']);
    }
}
