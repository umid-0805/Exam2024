<?php

namespace common\models;


use common\helpers\ExeptionConstations\Constations;
use common\models\query\OptionQuery;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "option".
 *
 * @property int $id
 * @property string|null $name
 * @property int $savollar_id
 * @property string|null $option
 * @property int $status
 * @property int $is_deleted
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property ExamUser[] $examUsers
 * @property Savollar   $savollar
 */
class Option extends ActiveRecord
{

    const STATUS_ACTIVE = 10;
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'option';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules():array
    {
        return [
            [['savollar_id', 'name', 'option','created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['savollar_id', 'is_deleted', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'option'], 'string', 'max' => 255],

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
            'name' => 'Name',
            'savollar_id' => 'Savollar ID',
            'option' => 'Option',
            'status' => 'Status',
            'is_deleted' => 'is_deleted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[ExamUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExamUsers(): ActiveQuery
    {
        return $this->hasMany(ExamUser::class, ['option_id' => 'id']);
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


    public function deleted(): void
    {
        $this->is_deleted = 1;
        $this->save(false);
    }


    public function statusActive(): void
    {
        switch ($this->status){
            case 10:
                $this->status(1);
                break;
            default:
                $this->status(10);
                break;
        }

    }

    private function status(int $status): void
    {
        $this->status = $status;
        $this->save(false);
        setFlash(Constations::KEY_SUCCESS,Constations::SUCCESS_MESSAGE);
    }


    public static function isTrue(int $id, int $status): bool
    {
        $model = self::find()->findBySavolId($id)->active()->isDeleted()->count();

        if ($status == 10){
            return true;
        }

        if ($model >= 1){
            setFlash(Constations::KEY_ERROR,Constations::ERROR_MESSAGE);
            return false;
        }

        return true;
    }


    public function getExamStatusActive()
    {
        return  self::find()->andWhere(['status' => 10])->andWhere(['is_deleted' => 0])->count();
    }


    public static function find(): OptionQuery
    {
        return new OptionQuery(get_called_class());
    }
}
