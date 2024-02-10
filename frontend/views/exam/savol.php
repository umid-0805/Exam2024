<?php
/** @var common\models\Savollar $model */
use yii\bootstrap5\ActiveForm;
?>

<div class="question container-fluid">
  <?php $form = ActiveForm::begin(['id' => 'login-form', 'method' =>  'post', 'action' => ['create']]) ?>

    <?php $i = 1; foreach($model as $item): ?>

        <h4><?="$i . $item->question"?></h4>

          <?= $this->render('option', ['option' => $item->option]) ?>

       <?php $i++; endforeach; ?>

    <input type="submit" class="btn btn-primary" value="Testni yakunlash">

  <?php ActiveForm::end() ?>

</div>

<style>
  .question{
    border: 1px rgba(0, 0, 0, 0.24) solid;
    border-radius: 12px;
    padding: 20px 24px;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
  }
</style>