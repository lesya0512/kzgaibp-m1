<?php

use app\models\Statement;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\StatementSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Statements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statement-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Statement', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            ['attribute' => 'id_user',
                'value' => function($model){
                    return $model->user->fio;
                }
            ],
            ['attribute' => 'id_category',
                'value' => function($model){
                    return $model->category->category;
                }
            ],
            ['attribute' => 'id_otdel',
                'value' => function($model){
                    return $model->otdel->otdel;
                }
            ],
            'description',
            ['attribute' => 'id_status',
                'value' => function($model){
                    return $model->status->status;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Statement $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
