<?php

namespace app\controllers;

use app\models\Goal;
use app\models\Task;

class DashboardController extends \yii\web\Controller
{
    public function actionIndex()
    {
        // nearest tasks
        $taskQuery = Task::find()
            ->where(['closed' => 0])
            ->orderBy('date')
            ->limit(10)
        ;
        $tasksCount = $taskQuery->count();
        $tasks = $taskQuery->andWhere('date')->all();

        // tasks without date
        $tasksWithoutDateQuery = Task::find()
            ->where(['closed' => 0])
            ->andWhere('date is NULL')
            ->orderBy('id')
            ->limit(10)
        ;
        $tasksWithoutDateCount = $tasksWithoutDateQuery->count();
        $tasksWithoutDate = $tasksWithoutDateQuery->all();

        // overdue tasks
        $tasksOverdueQuery = Task::find()
            ->where(['closed' => 0])
            ->andWhere('date < NOW()')
            ->orderBy('date')
            ->limit(10)
        ;
        $tasksOverdueCount = $tasksOverdueQuery->count();
        $tasksOverdue = $tasksOverdueQuery->all();


        /********************************************************************/

        // nearest goals
        $goalQuery = Goal::find()
            ->innerJoinWith('status')
            ->where('status.closed=0')
            ->orderBy('to_be_done_at')
            ->limit(3)
        ;
        $goalsCount = $goalQuery->count();
        $goals = $goalQuery->andWhere('to_be_done_at')->all();

        // goals without date
        $goalsWithoutDateQuery = Goal::find()
            ->innerJoinWith('status')
            ->where('status.closed=0')
            ->andWhere('to_be_done_at is NULL')
            ->orderBy('goal.id')
            ->limit(10)
        ;
        $goalsWithoutDateCount = $goalsWithoutDateQuery->count();
        $goalsWithoutDate = $goalsWithoutDateQuery->all();

        // overdue goals
        $goalsOverdueQuery = Goal::find()
            ->innerJoinWith('status')
            ->where('status.closed=0')
            ->andWhere('to_be_done_at < NOW()')
            ->orderBy('goal.id')
            ->limit(10)
        ;
        $goalsOverdueCount = $goalsOverdueQuery->count();
        $goalsOverdue = $goalsOverdueQuery->all();

        return $this->render('index', [
            'tasks' => $tasks,
            'tasksCount' => $tasksCount,
            'tasksWithoutDate' => $tasksWithoutDate,
            'tasksWithoutDateCount' => $tasksWithoutDateCount,
            'tasksOverdue' => $tasksOverdue,
            'tasksOverdueCount' => $tasksOverdueCount,
            'goals' => $goals,
            'goalsCount' => $goalsCount,
            'goalsWithoutDate' => $goalsWithoutDate,
            'goalsWithoutDateCount' => $goalsWithoutDateCount,
            'goalsOverdue' => $goalsOverdue,
            'goalsOverdueCount' => $goalsOverdueCount,
        ]);
    }

}
