<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ArtistasCanciones */

$this->title = 'Create Artistas Canciones';
$this->params['breadcrumbs'][] = ['label' => 'Artistas Canciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artistas-canciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
