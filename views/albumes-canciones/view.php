<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AlbumesCanciones */

$this->title = $model->album_id;
$this->params['breadcrumbs'][] = ['label' => 'Albumes Canciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="albumes-canciones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'album_id' => $model->album_id, 'cancion_id' => $model->cancion_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'album_id' => $model->album_id, 'cancion_id' => $model->cancion_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'album_id',
            'cancion_id',
        ],
    ]) ?>

</div>
