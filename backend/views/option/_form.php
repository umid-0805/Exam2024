<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Option $model */
/** @var yii\widgets\ActiveForm $form */
/** @var $savol_id */
/** @var $option  */

?>

<div class="option-form">


        <?php $form = ActiveForm::begin(); ?>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>

            <th style="width: 450px;"><?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?></th>
            <th style="width: 15px;"><div class="btn-group btn-group-toggle" data-toggle="buttons"></div>

            </th>
            <th class="text-center" style="width: 90px;">
                <button type="button" class="add-house btn btn-success btn-xs"><span class="fa fa-plus"></span></button>
            </th>
        </tr>

<tr>
        <th >
            <?= $form->field($model, 'option')->textInput(['maxlength' => true]) ?>

        </th>
        <th>
            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
            <label for="vehicle1"> Tugri javob</label><br>
        </th>
    <th>
        <img width="48" height="48" src="https://img.icons8.com/fluency/48/add--v1.png" alt="add--v1"/>
    </th>
</tr>
        </thead>

    <?php ActiveForm::end(); ?>


</div>
<th>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

    <?= Html::a('<i class="fa fa-home"></i> Bor varinatlarni kurish', ['index', 'savol_id' => $savol_id], ['class' => 'btn btn-primary']) ?>
</div>
</th>

