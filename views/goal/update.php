<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Goal */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => Yii::t('goal', 'Goal'),
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => $model->url()];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="goal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
