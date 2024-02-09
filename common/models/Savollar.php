<?php

namespace common\models;

use Yii;
use \yii\db\ActiveQuery;
/**
 * This is the model class for table "savollar".
 *
 * @property int $id
 * @property string|null $question
 * @property int|null $success_answer
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $test_id
 * @property int|null $fan_id
 * @property int|null $test_name
 * @property Testlar $test
 */
class Savollar extends \yii\db\ActiveRecord
{

//    public function beforeSave($insert)
//    {
//
//    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'savollar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['success_answer', 'fan_id', 'test_id'], 'integer',],
            [['created_at', 'updated_at'], 'safe'],
            [['question', 'success_answer', 'test_id'], 'required'],
            [['question'], 'string', 'max' => 255],
            [['test_id'], 'exist', 'skipOnError' => true, 'targetClass' => Testlar::class, 'targetAttribute' => ['test_id' => 'id']],

            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'question' => 'Question',
            'success_answer' => 'Success Answer',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
           'fan_id' => 'Fan ID',
            'test_name' => 'Test Name',
        ];
    }

    /**
     * Gets query for [[Test]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTest(): ActiveQuery
    {
        return $this->hasOne(Testlar::class, ['id' => 'test_id']);
    }

    public function getFan(): ActiveQuery
    {
        return $this->hasOne(Fanlar::class, ['id' => 'fan_id']);
    }


    public static function findByTestId(int $id): array
    {
        return self::find()->where(['test_id' => $id])->all();
    }


    public function statusActive(): void
    {
        switch ($this->status){
            case 10:
                $this->status(01);
                break;
            default:
                $this->status(10);
                break;
        }

    }

    private function status(int $int)
    {
    }
}
