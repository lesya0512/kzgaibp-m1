<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Otdel $model */

$this->title = 'Update Otdel: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Otdels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="otdel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
