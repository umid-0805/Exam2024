<?php
declare(strict_types=1);

namespace backend\models\forms;

use yii\base\Model;

class SavollarCreateForm extends Model
{
    private string|null $question = null;

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(?string $question): void
    {
        $this->question = $question;
    }


    public function rules(): array
    {
        return [
            [['question'], 'required'],
            [['question'], 'string', 'max' => 255],
        ];
    }
}