<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Option $model */

$this->title = 'Update Option: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Options', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
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

    </div>
</th>

