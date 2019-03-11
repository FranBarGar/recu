<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlbumesCancionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Albumes Canciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="albumes-canciones-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Albumes Canciones', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'album_id',
            'cancion_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
