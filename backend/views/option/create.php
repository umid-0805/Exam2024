<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Option $model */
/** @var $savol_id  */

$this->title = 'Create Option';
$this->params['breadcrumbs'][] = ['label' => 'Option', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="option-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'savol_id' => $savol_id
    ]) ?>

</div>
