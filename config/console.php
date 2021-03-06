<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config_local = require(__DIR__ . '/console-local.php');

return \yii\helpers\ArrayHelper::merge([
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'gii'],
    'controllerNamespace' => 'app\commands',
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => array(
            'translations' => array(
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                ],
            ),
        ),
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'scriptUrl' => 'http://'.\yii\helpers\ArrayHelper::getValue($params, 'domain'),
            'rules' => [
                '/<alias:[\w-_]+>' => 'goal/view',
            ]
        ],
        'formatter' => [
            'class' => 'app\helper\Formatter'
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ],
    'params' => $params,
], $config_local);
