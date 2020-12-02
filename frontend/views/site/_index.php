<?php
use kartik\dynagrid\DynaGrid;
use kartik\editable\Editable;
use kartik\grid\EditableColumn;
use kartik\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\web\JsExpression;
/* @var $this yii\web\View */

$this->title = 'Поиск Лекарственных Средств';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Поиск Лекарственных Средств</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p>
            <?= DynaGrid::widget([
    'options' => [
        'id' => 'Inform-grid',
    ],
    'gridOptions' => [
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover' => true,
        'exportConfig' => [
            GridView::CSV => [],
        ],
        'panel' => [
            'heading' => '<h3 class="panel-title">' . $this->title . '</h3>',
        ],
        'toolbar'=> [
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class'=>'btn btn-default', 'title' => 'Сбросить фильтры'])
            ],
            '{toggleData}',
        ],
    ],
    'columns' => [
        [
            'attribute' => 'id',
            'visible'=>false, 
        ],
        [
            'format' => 'raw',
            'attribute' => 'torg_name',
            'options'=>['width'=>'30%'],
            'value' => function($model) {
                $url = null;
                if($model->torg_name) {
                    $url = Url::to(['/catalog/view', 'path' => $model->id]);
                    $url = substr($url, 6);
                    $url = Html::tag('a', $model->torg_name, ['href' => $url, 'target' => '_blank']);
                }
                return $url;
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filterWidgetOptions' => [
                'pluginOptions' => [
                    'allowClear' => true,
                    'minimumInputLength' => 3,
                    'ajax' => [
                        'url' => Url::to(['/site/product-name-list']),
                        'dataType' => 'json',
                        'data' => new JsExpression('function(params) { return {q:params.term}; }')
                    ],
                  //  'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                  //  'templateResult' => new JsExpression('function(city) { return city.text; }'),
                  //  'templateSelection' => new JsExpression('function (city) { return city.text; }'),
                ],
                'options' => ['placeholder' => 'Любой'],
            ],
        ],

    ],
]); ?>
        </p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
