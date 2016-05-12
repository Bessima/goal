<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Goal */

$this->title = Yii::t('goal', 'Create Goal');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
