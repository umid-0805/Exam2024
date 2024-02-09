<?php

namespace common\models\query;

use common\models\Option;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

class OptionQuery extends ActiveQuery
{
    public function all($db = null): array
    {
        return parent::all($db);
    }

    public function one($db = null): array|ActiveRecord|null
    {
        return parent::one($db);
    }

    public function findBySavolId($id): self
    {
        $this->andWhere(['savollar_id' => $id]);

        return $this;
    }

    public function active(): self
    {
        $this->andWhere(['status' => Option::STATUS_ACTIVE]);

        return $this;
    }

    public function isDeleted(): self
    {
        $this->andWhere(['is_deleted' => 0]);

        return $this;
    }
}