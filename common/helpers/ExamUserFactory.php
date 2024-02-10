<?php

namespace common\helpers;

use common\models\ExamUser;

class ExamUserFactory
{
    public function create(int $savollar_id, int $option_id): ExamUser
    {
        $model = new ExamUser();
        $model->savollar_id = $savollar_id;
        $model->option_id = $option_id;

        return $model;
    }
}