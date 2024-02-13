<?php

use common\models\Savollar;
use common\models\Testlar;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\search\TestlarSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Testlars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testlar-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Test', ['create'], ['class' => 'btn btn-outline-primary']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
          // 'fanlar_id',
            'name',
            'date',
            'start_time',
            'end_time',
           // 'created_at',
            //'updated_at',
            [
                
                'class' => ActionColumn::className(),
                 'template'    => '{view}  {update}  {delete}  {next} ',

                 'buttons' => [

                    'next' => function($url, $model, $key){
                        return Html::a('<img width="15" height="15" src="https://img.icons8.com/external-line-adri-ansyah/64/external-music-music-player-button-line-adri-ansyah-10.png" alt="external-music-music-player-button-line-adri-ansyah-10"/>',
                        Yii::$app->getUrlManager()->createUrl(['savollar/index', 'test_id' => $model->id]),
                        ['class' => 'btn btn-outline-primary btn-sm']);
                    },


                ],
                'urlCreator' => function ($action, Testlar $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
            ],
        ],
    ]); ?>

  
</div>
