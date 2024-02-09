
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
        <br><?php $option = \common\models\Option::find()->andWhere(['savollar_id' => $item->id])->isDeleted()->all()  ?>
            <?php foreach ($option as $value): ?>
             <?= '( ' . $value->name . ' ) ' .   $value->option . '<br>' ?>
            <?php endforeach; ?>

<!--          <label for="--><?php //= 'savold' . $item->id ?><!--"></label><input class="form-check-input" type="radio" name="--><?php //= 'savol' . $item->id ?><!--" id="--><?php //= 'savold' . $item->id ?><!--" value=4>-->
<!--          <label class="form-check-label" for="--><?php //= 'savol' . $item->id ?><!--"></label>-->
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