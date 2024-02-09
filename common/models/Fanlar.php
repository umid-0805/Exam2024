<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fanlar".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $update_at
 * @property string|null $create_at
 *
 * @property Testlar[] $testlars
 */
class Fanlar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fanlar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            [['update_at', 'create_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'update_at' => 'Update At',
            'create_at' => 'Create At',
        ];
    }

    /**
     * Gets query for [[Testlars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTestlars()
    {
        return $this->hasMany(Testlar::class, ['fanlar_id' => 'id']);
    }
}
