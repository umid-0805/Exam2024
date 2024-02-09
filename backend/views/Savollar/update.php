<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Savollar $model */

$this->title = 'Update Savollar: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Savollar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="savollar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
