<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Savollar $model */

$this->title = 'testni boshlash';
$this->params['breadcrumbs'][] = ['label' => 'Exam', 'url' => ['savollar/index']];  
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testni boshlash">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_post', [
        'model' => $model,
    ]) ?>


</div>