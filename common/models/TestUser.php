<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "test_user".
 *
 * @property int $id
 * @property int $user_id
 * @property int $testlar_id
 * @property int|null $success_count
 * @property string|null $end_date
 *
 * @property Testlar $testlar
 * @property User $user
 */
class TestUser extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'test_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['user_id', 'test_id'], 'required'],
            [['user_id', 'test_id', 'success_count'], 'integer'],
            [['end_date','start_date'], 'safe'],
            [['test_id'], 'exist', 'skipOnError' => true, 'targetClass' => Testlar::class, 'targetAttribute' => ['test_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'testlar_id' => 'Testlar ID',
            'success_count' => 'Success Count',
            'end_date' => 'End Date',
            'start_date'=>'Start Date'
        ];
    }

    /**
     * Gets query for [[Testlar]].
     *
     * @return ActiveQuery
     */
    public function getTestlar(): ActiveQuery
    {
        return $this->hasOne(Testlar::class, ['id' => 'testlar_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return ActiveQuery
     */
    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
