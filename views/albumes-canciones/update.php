<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AlbumesCanciones */

$this->title = 'Update Albumes Canciones: ' . $model->album_id;
$this->params['breadcrumbs'][] = ['label' => 'Albumes Canciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->album_id, 'url' => ['view', 'album_id' => $model->album_id, 'cancion_id' => $model->cancion_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="albumes-canciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
