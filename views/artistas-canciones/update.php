<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ArtistasCanciones */

$this->title = 'Update Artistas Canciones: ' . $model->artista_id;
$this->params['breadcrumbs'][] = ['label' => 'Artistas Canciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->artista_id, 'url' => ['view', 'artista_id' => $model->artista_id, 'cancion_id' => $model->cancion_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="artistas-canciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
