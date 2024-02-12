<?php

use common\models\Option;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var  $m */
/** @var $savol_id */
/** @var  $model */
/** @var   $search */


$m = Option::find()->andWhere(['savollar_id' => $savol_id])->one();


$this->title = '( ' . $m->savollar->fan->name . ' )  ' . $m ->savollar->question;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="option-index">


    <h1><?= Html::encode($this->title) ?></h1>


    <p style="display: flex; justify-content: space-between;">
        <?=  Html::a('Create Option', ['create', 'test_id' => $m->savollar->id],  ['class' => 'btn btn-outline-primary'])  ?>
        <?= count($model) > 2 ? Html::a('Tasdiqlash',['tasdiqlash' ], ['class' => 'btn btn-outline-primary', 'id' => 'tasdiqlashBtn', 'data' => ['confirm' => 'Tasdiqlashdan so\'ng foydalanishga ruxsat beriladi ']]) : '' ?>

    </p>




    <form action="" method="get" style="width: 100%; display: flex;">
        <label style="width: 90%;">
            <input name="savol_id" type="search" hidden="hidden" value="<?= $savol_id ?>" style="width: 100%;">
            <input name="search" type="search" value="<?= $search ?>" style="width: 100%;">
        </label>
        <button type="submit" style="width: 10%;">Search</button>
    </form>


    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Options</th>
            <th scope="col">Answers</th>
            <th scope="col">Satus</th>
            <th scope="col">Amallar</th>
        </tr>
        </thead>
        <tbody>
       <?php $i = 1; foreach ($model as $value): ?>
        <tr>
            <th scope="row"><?= $i++ ?></th>
            <td><?= $value->id?></td>
            <td><?= $value->name?></td>
            <td><?= $value->option?></td>
            <td>
                <a href="<?= Url::to(['status', 'id' => $value->id, 'status' => $value->status == 1 ? 1 : 10]) ?>"><?= $value->status == 1 ? '🔴' : '🟢' ?></a>

            </td>
            <td> <a href="<?= Url::to(['view', 'id' => $value->id]) ?>"   title="Ko`rish" data-pjax="0">
                    <img width="14" height="14" src="https://img.icons8.com/ios-filled/50/circular-arrows--v1.png" alt="circular-arrows--v1"/>
                    <svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1.125em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">…</svg>
            </td>

        </tr>
        <?php endforeach; ?>
        </tbody>

</div>
