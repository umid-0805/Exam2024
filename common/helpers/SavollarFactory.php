<?php
declare(strict_types=1);

namespace common\helpers;
use common\models\Savollar;

class SavollarFactory
{
    public function create(string $question, int $fanId, int $success_answer, int $testId): Savollar
    {
        $model = new Savollar();
        $model->question = $question;
        $model->fan_id = $fanId;
        $model->success_answer = $success_answer;
        $model->test_id = $testId;

        return $model;
    }
}