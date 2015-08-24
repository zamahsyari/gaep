<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kategori".
 *
 * @property integer $id
 * @property string $name
 * @property string $deskripsi
 *
 * @property Tutorial[] $tutorials
 */
class Kategori extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kategori';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['deskripsi'], 'string'],
            [['name'], 'string', 'max' => 250]
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
            'deskripsi' => 'Deskripsi',
        ];
    }

}
