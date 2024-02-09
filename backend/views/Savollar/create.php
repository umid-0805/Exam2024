<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Savollar $model */

$this->title = 'Create Savollar';
$this->params['breadcrumbs'][] = ['label' => 'Savollar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="savollar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
