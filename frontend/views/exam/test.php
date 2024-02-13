<?php
/** @var $model */
?>
    <div class="row">

        <?php use yii\helpers\Url;

        foreach($model as $value): ?>
            <div class="col-lg-3">
                <div class="card">
<!--                    <h4 class="card-header"> Fan nomi: --><?php //= $value->name?><!--</h4>-->
                    <h5 class="card-header">Test nomi: <?= $value->name ?></h5>
                    <div class="card-body">
                  <p>Savollar soni:  <?php //= $value->$this->savollar_id ?></p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="<?= Url::toRoute(['tests?id='.$value->id])?>" class="btn btn-primary">Boshlash</a>
                    </div>
                </div>
            </div>
    
            <?php endforeach; ?>


    </div>
