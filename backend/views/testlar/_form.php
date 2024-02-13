<?php

use common\models\Fanlar;
use common\models\Savollar;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\Testlar $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="testlar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fanlar_id')->dropDownList(
        ArrayHelper::map(Fanlar::find()->asArray()->all(), 'id', 'name'),['prompt'=>'Test kiritadigan faningizni tanlang']
    )->label(false)?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="d-flex">
        <div class="m-2">
            <?= $form->field($model, 'date')->Input('date') ?>
        </div>

        <div class="m-2">
        <?= $form->field($model, 'start_time')->Input('time') ?>
        </div>
            <div class="m-2">
        <?= $form->field($model, 'end_time')->Input('time')?>
            </div>
    </div>

  <br>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
