<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Testlar $model */

$this->title = 'Create Testlar';
$this->params['breadcrumbs'][] = ['label' => 'Testlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testlar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
