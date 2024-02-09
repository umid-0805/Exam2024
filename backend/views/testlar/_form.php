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

    <?= $form->field($model, 'question_count')->textInput()
     ?>

  

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
