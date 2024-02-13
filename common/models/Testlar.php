<?php

namespace common\models;

use yii\db\ActiveQuery;

/**
 * This is the model class for table "testlar".
 *
 * @property int $id
 * @property int $fanlar_id
 * @property string|null $name
 * @property int|null $date
 * @property int|null $start_time
 * @property int|null $end_time
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
    public static function tableName(): string
    {
        return 'testlar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['fanlar_id', 'date', 'start_time', 'end_time', 'name'], 'required'],
            [['fanlar_id'], 'integer'],
            [['date', 'start_time', 'end_time'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['end_time'], 'startendTime'],
            [['date'], 'date', 'format' => 'yyyy-MM-dd'],
            [['date'], 'compare', 'operator' => '>=', 'compareValue' => date('Y-m-d')],
            [['fanlar_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fanlar::class, 'targetAttribute' => ['fanlar_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'fanlar_id' => 'Fanlar ID',
            'name' => 'Name',
            'date' => 'Date',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Fanlar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFanlar(): ActiveQuery
    {
        return $this->hasOne(Fanlar::class, ['id' => 'fanlar_id']);
    }

    /**
     * Gets query for [[Savollars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSavollars(): ActiveQuery
    {
        return $this->hasMany(Savollar::class, ['test_id' => 'id']);
    }


    public function deleted(): void
    {
        $this->is_deleted = 1;
        $this->save(false);
    }
    public function startendTime($attribute, $params): void
    {
        $start = strtotime($this->start_time);
        $end = strtotime($this->end_time);

        $minutes = round(abs($end - $start) / 60);
        $hours = round(abs($end - $start) / 3600);

        if ($start >= $end || ($minutes < 30)) {
            $this->addError($attribute, 'Tugash vaqti boshlanish vaqtidan kamida 30 daqiqa kech bo\'lishi kerak.');
        } elseif ($hours > 2) {
            $this->addError($attribute, 'Boshlanish vaqti va tugash vaqti o\'rtasidagi farq ko\'pi bilan 2 soat  bo\'lishi kerak.');
        }

    }

}
