<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model \app\modules\settings\models\Priority */

$this->title = Yii::t('priority', 'Create Priority');
$this->params['breadcrumbs'][] = ['label' => Yii::t('priority', 'Priorities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="priority-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
