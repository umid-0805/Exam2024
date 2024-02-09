
<pre>

<?php

use yii\bootstrap5\ActiveForm;


  $number = 1;
?>
</pre>

<div class="question container-fluid">
  <?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'method' =>  'post',
    'action' => ['view', 'test_id' => $test_id],

    'options' => ['class' => 'form-horizontal'],
  ]) ?>
    <?php foreach($model as $item): ?>
      <h4><?=$number .". ". $item->question ?></h4>
       <br>
      <div class="form-check">
        <br>
          <label for="<?= 'savold' . $item->id ?>"></label><input class="form-check-input" type="radio" name="<?= 'savol' . $item->id ?>" id="<?= 'savold' . $item->id ?>" value=4>
        <label class="form-check-label" for="<?= 'savol' . $item->id ?>">
           <?= $item->option ?>
        </label>
      </div>

      <hr>
    <?php $number++; endforeach; ?>

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