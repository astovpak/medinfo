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

<?php //var_dump($torgnames) ?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Поиск</h1>
        <p class="lead"> лекарственных средств в Крыму</p>
        <p>
        <form id="search" autocomplete="off" action="/site/product-name-list">
          <div class="autocomplete" style="width:500px;">
            <input id="myInput" type="text" name="search" placeholder="Наименование лекарственного средства">
          </div>
           <input type="submit" value="Поиск">
        </form>
        </p>
    </div>
    <div id="result">
        
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


<script>
  var torgnames=<?php echo json_encode($torgnames); ?>;
  // alert(torgnames[1]);

</script>