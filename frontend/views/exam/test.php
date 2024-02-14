<?php
/** @var common\models\Testlar $model */
use yii\helpers\Url;
?>

<div class="row">


    <?php foreach ($model as $value):?>


        <div class="col-lg-3">
            <div class="card">
                <h5 class="card-header">Test nomi: <?= $value->name ?></h5>
                <div class="card-body">
                    <p>Savollar soni: </p>

                kun <?= date('Y-m-d') ?>
                soat <?= date('H:i:s') ?>
                </div>
                <div class="card-footer text-center">
                    <?php if (getUserIntity()): ?>
                        <a href="<?= Url::toRoute(['tests?id=' . $value->id]) ?>"
                           class="btn btn-primary">Boshlash</a>
                    <?php else: ?>
                        <a href="<?= Url::toRoute(['exam/view', 'id' => $value->id]) ?>"
                           class="btn btn-success">Natija</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>


    <?php endforeach; ?>

</div>
