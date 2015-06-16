<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = 'Update Article: ' . ' ' . $oArticle->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['site/index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="article-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'oArticle' => $oArticle,
    ]) ?>

</div>
