<?php

namespace common\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "person".
 *
 * @property int $id
 * @property int $user_id
 * @property string $lastName
 * @property string $firstName
 * @property string|null $phone
 * @property string|null $update_at
 * @property string|null $create_at
 * @property int $status
 * @property int $is_deleted
 *
 * @property User $user
 */
class Person extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [[ 'lastName', 'firstName'], 'required'],
            [['user_id', 'status', 'is_deleted'], 'integer'],
            [['update_at', 'create_at'], 'safe'],
            [['lastName','firstName','phone'],'required'],
            [['lastName', 'firstName', 'phone'], 'string', 'max' => 255],
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
            'lastName' => 'Last Name',
            'firstName' => 'First Name',
            'phone' => 'Phone',
            'update_at' => 'Update At',
            'create_at' => 'Create At',
            'status' => 'Status',
            'is_deleted' => 'Is Deleted',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getPerson(): ActiveQuery
    {
        return $this->hasOne(Person::class, ['id' => 'user_id']);
    }

}
