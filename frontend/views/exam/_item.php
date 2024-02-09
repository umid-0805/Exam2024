<?php




?>
<div class="col-lg-3">

  <div class="card">
      <div class="container">
    <div class="card-body">
    <?php foreach($model as $value): ?>
    <h5 class="card-title">Fan nomi: <?= $value->fan_nomi?></h5>
      <p class="card-text">
      <h5 class="card-title">Test soni: <?= $value->question_count ?></h5>
        <a href="<?= \yii\helpers\Url::to(['tests?id='.$value->id])?>" class="button">Testga kirish</a>
    <?php endforeach; ?>
    </div>
    <div class="card">



      <small class="text-muted"><a href=""></a></small>
    </div>

  </div>
    </div>
</div>