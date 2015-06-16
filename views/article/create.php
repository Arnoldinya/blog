<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = 'Написать статью';
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['site/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'oArticle' => $oArticle,
    ]) ?>

</div>
