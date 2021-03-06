<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \app\modules\settings\models\Type */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => Yii::t('type', 'Type'),
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('type', 'Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
