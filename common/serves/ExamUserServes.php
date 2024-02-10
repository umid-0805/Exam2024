<?php

namespace common\serves;

use common\helpers\ExamUserFactory;
class ExamUserServes
{
    public function saveDate($post): bool
    {
        foreach ($post as $key => $value) {
            if ($key !== '_csrf-frontend') {
                $model = new ExamUserFactory;
                $model->create(stringToInt($key), $value)->save(false);
            }
        }
        setFlash('success', 'saqlandi');
        return true;
    }

}