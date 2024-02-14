<?php
declare(strict_types=1);

namespace common\serves;

use backend\models\forms\SavollarCreateForm;
use common\helpers\SavollarFactory;
use common\models\Testlar;

class SavollarServes
{
    public function __construct(private readonly SavollarCreateForm $savollarCreateForm)
    {
    }

    public function saveData(int $id): bool
    {
        return (new SavollarFactory)->create(
            $this->savollarCreateForm->getQuestion(),
            Testlar::findOne($id)->fanlar_id,
            5,
            $id
        )->save();
    }

}