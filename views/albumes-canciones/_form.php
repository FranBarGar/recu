<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AlbumesCanciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="albumes-canciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'album_id')->textInput() ?>

    <?= $form->field($model, 'cancion_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
