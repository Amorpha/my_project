<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->  
  <script src="https://www.google.com/jsapi"></script>
  </head>
  <body>
  <?php $this->beginBody() ?>
      <div class="navbar navbar-inverse navbar-static-top">
          <div class="container">
              <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                <i class="fa fa-bars" aria-hidden="true"></i>   
               </button>
              </div>
               <div class="collapse navbar-collapse" id="menu">
                 <ul class="nav navbar-nav">
                  <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i>  Главная</a></li>
                     <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> Контакты</a></li>
                     <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i> О нас</a></li>    
                 </ul>
                </div> 
          </div>
      </div>
	  <?= $content ?> 
<?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage() ?>