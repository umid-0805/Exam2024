<?php

namespace app\models;
use common\models\Savollar;
use common\models\Fanlar;

use Yii;

/**
 * This is the model class for table "testlar".
 *
 * @property int $id
 * @property int $fanlar_id
 * @property string|null $name
 * @property int|null $question_count
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Fanlar $fanlar
 * @property Savollar[] $savollars
 */
class Testlar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'testlar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fanlar_id'], 'required'],
            [['fanlar_id', 'question_count'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['fanlar_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fanlar::class, 'targetAttribute' => ['fanlar_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fanlar_id' => 'Fanlar ID',
            'name' => 'Name',
            'question_count' => 'Question Count',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Fanlar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFanlar()
    {
        return $this->hasOne(Fanlar::class, ['id' => 'fanlar_id']);
    }

    /**
     * Gets query for [[Savollars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSavollars()
    {
        return $this->hasMany(Savollar::class, ['test_id' => 'id']);
    }
}
