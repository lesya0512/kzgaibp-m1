<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Statement $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="statement-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'id_user')->textInput() ?> -->

    <!-- редактирование статуса для админа -->

    <?php 
        if(Yii::$app->user->identity->username == 'help') 
        echo $form->field($model, 'id_status')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Status::find()->all(), 'id', 'status'));
    ?>

    <!-- . -->

    <?php 
        if(Yii::$app->user->identity->id) 
        echo $form->field($model, 'id_category')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'category'));
    ?>

    <?php 
        if(Yii::$app->user->identity->id) 
        echo $form->field($model, 'id_otdel')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Otdel::find()->all(), 'id', 'otdel'));
    ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
