<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Fanlar $model */

$this->title = 'Create Fanlar';
$this->params['breadcrumbs'][] = ['label' => 'Fanlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fanlar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
