<?php

namespace common\models;


use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "exam_user".
 *
 * @property int $id
 * @property int $savollar_id
 * @property int $option_id
 * @property int $status
 * @property int $success_answer
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Option $option
 * @property Savollar $savollar
 */
class ExamUser extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'exam_user';
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => TimestampBehavior::class,
            ],
            [
                'class' => BlameableBehavior::class,
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['savollar_id', 'option_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['savollar_id', 'option_id', 'status','success_answer' ,'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['option_id'], 'exist', 'skipOnError' => true, 'targetClass' => Option::class, 'targetAttribute' => ['option_id' => 'id']],
            [['savollar_id'], 'exist', 'skipOnError' => true, 'targetClass' => Savollar::class, 'targetAttribute' => ['savollar_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'savollar_id' => 'Savollar ID',
            'option_id' => 'Option ID',
            'status' => 'Status',
            'success_answer'=>'Success_answer',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Option]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOption(): ActiveQuery
    {
        return $this->hasOne(Option::class, ['id' => 'option_id']);
    }

    /**
     * Gets query for [[Savollar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSavollar(): ActiveQuery
    {
        return $this->hasOne(Savollar::class, ['id' => 'savollar_id']);
    }
}
