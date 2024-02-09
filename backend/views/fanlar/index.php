<?php

use common\models\Fanlar;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\search\FanlarSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Fanlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fanlar-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Fanlar qushish', ['create'], ['class' => 'btn btn-outline-primary']) ?>
    </p>    

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'name',

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Fanlar $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
        
    ]); ?>

    <?php Pjax::end(); ?>

</div>

