<?php

use app\helper\Icon;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $goal app\models\Goal */
/* @var $logRows app\models\Log[] */
/* @var $taskRows app\models\Task[] */
/* @var $logModel app\models\Log */
/* @var $taskCount int */

$this->title = $goal->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goal-view">

    <h1><?= Html::encode($goal->title) ?> <small>(<?= Html::encode($goal->alias) ?>)</small></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $goal->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <div class="row">
        <div class="col-sm-6">

            <div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= (int)$goal->percent ?>%;">
                        <?= (int)$goal->percent ?>%
                    </div>
                </div>
            </div>

            <div>
                <label><?= Yii::t('goal', 'Status') ?></label>
                <?= Html::encode($goal->status->title) ?>
            </div>

            <div>
                <label><?= Yii::t('goal', 'Priority') ?></label>
                <?= Html::encode($goal->priority->title) ?>
            </div>

            <div>
                <label><?= Yii::t('goal', 'Type') ?></label>
                <?= Html::encode($goal->type->title) ?>
            </div>

        </div>
        <div class="col-sm-6">

            <div>
                <label><?= Yii::t('goal', 'Created At') ?></label>
                <?= Yii::$app->formatter->asDate($goal->created_at) ?>
                (<?= Yii::$app->formatter->asRelativeTime($goal->created_at) ?>)
            </div>

            <div>
                <label><?= Yii::t('goal', 'Updated At') ?></label>
                <?= Yii::$app->formatter->asDatetime($goal->updated_at) ?>
                (<?= Yii::$app->formatter->asRelativeTime($goal->updated_at) ?>)
            </div>

            <div>
                <label><?= Yii::t('goal', 'To Be Done At') ?></label>
                <?= Yii::$app->formatter->asDate($goal->to_be_done_at) ?>
                <? if ($goal->to_be_done_at): ?>
                    (<?= Yii::$app->formatter->asRelativeTimeHighlight($goal->to_be_done_at) ?>)
                <? endif; ?>
            </div>

            <? if ($goal->done_at): ?>
            <div>
                <label><?= Yii::t('goal', 'Done At') ?></label>
                <?= Yii::$app->formatter->asDate($goal->done_at) ?>
                (<?= Yii::$app->formatter->asRelativeTime($goal->done_at) ?>)
            </div>
            <? endif; ?>
            <? if ($goal->icon): ?>
            <div>
                <label><?= Yii::t('goal', 'Icon') ?></label>
                <?= Icon::getIconHtml($goal->icon) ?>
            </div>
            <? endif; ?>

        </div>
    </div>

    <div>
        <label><?= Yii::t('goal', 'Description') ?></label>
        <p><?= \Yii::$app->formatter->asWiki($goal->description) ?></p>
    </div>

    <table class="table table-striped table-bordered">
        <tbody>
        <tr>
            <th>S</th>
            <th title="<?= Html::encode(Yii::t('smart', 'specific_hint')) ?>"><?= Yii::t('goal', 'Smart Specific') ?></th>
            <td><?= \Yii::$app->formatter->asWiki($goal->smart_specific) ?></td>
        </tr>
        <tr>
            <th>M</th>
            <th title="<?= Html::encode(Yii::t('smart', 'measurable_hint')) ?>"><?= Yii::t('goal', 'Smart Measurable') ?></th>
            <td><?= \Yii::$app->formatter->asWiki($goal->smart_measurable) ?></td>
        </tr>
        <tr>
            <th>A</th>
            <th title="<?= Html::encode(Yii::t('smart', 'achievable_hint')) ?>"><?= Yii::t('goal', 'Smart Achievable') ?></th>
            <td><?= \Yii::$app->formatter->asWiki($goal->smart_achievable) ?></td>
        </tr>
        <tr>
            <th>R</th>
            <th title="<?= Html::encode(Yii::t('smart', 'relevant_hint')) ?>"><?= Yii::t('goal', 'Smart Relevant') ?></th>
            <td><?= \Yii::$app->formatter->asWiki($goal->smart_relevant) ?></td>
        </tr>
        <tr>
            <th>T</th>
            <th title="<?= Html::encode(Yii::t('smart', 'time_bound_hint')) ?>"><?= Yii::t('goal', 'Smart Time Bound') ?></th>
            <td><?= \Yii::$app->formatter->asWiki($goal->smart_time_bound) ?></td>
        </tr>
        </tbody>
    </table>

    <?= $this->render('first_tasks', [
        'taskRows' => $taskRows,
        'taskCount' => $taskCount,
        'goal' => $goal
    ]) ?>

    <?= $this->render('counters', [
        'goal' => $goal
    ]) ?>

    <?= $this->render('last_log_rows', [
        'logRows' => $logRows,
        'logModel' => $logModel,
        'goal' => $goal
    ]) ?>


</div>
