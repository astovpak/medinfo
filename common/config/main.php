<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'modules' => [
       'dynagrid'=> [
            'class'=>'\kartik\dynagrid\Module',
            'defaultPageSize' => 20,
        ],
        'gridview'=> [
            'class'=>'\kartik\grid\Module',
        ], 
    ],
];
