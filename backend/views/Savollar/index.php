<?php

use common\models\Savollar;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\search\SavollarSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/**@var  $test_id */

$this->title = 'Savollar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="savollar-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Savol qushish', ['create', 'test' => $test_id], ['class' => 'btn  btn-primary']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [

                'attribute' => 'fan_id',
                'value' => function ($data) {
                    return $data->test->name;
                }
            ],

            'question',
            'success_answer',

            [

                'attribute' => 'test_id',
                'value' => function ($data) {
                    return $data->test->name;
                }
            ],

            [

                'class' => ActionColumn::className(),
                'template'    => '{view}  {update}  {delete}  {add} ',

                'buttons' => [

                    'add' => function($url, $model, $key){
                        return Html::a('<img width="12" height="12" src="https://img.icons8.com/fluency-systems-filled/48/plus-math.png" alt="plus-math"/>',
                            Yii::$app->getUrlManager()->createUrl(['option/create', 'test_id' => $model->id]),
                            ['class' => 'btn btn-outline-primary btn-sm']);
                    },




                ],
                'urlCreator' => function ($action, Savollar $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
