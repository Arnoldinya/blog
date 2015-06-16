<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $oArticle->title;
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $oArticle->title;
?>
<div class="article-view">

    <?php 
    if (Yii::$app->user->can('canAdmin')): ?>     
    
        <p>
            <?= Html::a('Редактировать', ['article/update', 'id' => $oArticle->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить', ['article/delete', 'id' => $oArticle->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

    <?php else:?>

        <?php if (Yii::$app->user->identity && $oArticle->user_id==Yii::$app->user->identity->id): ?>
            <?= Html::a('Редактировать', ['article/update', 'id' => $oArticle->id], ['class' => 'btn btn-primary']) ?>
        <?php endif ?>
    <?php endif ?>

    <div class="date">
        <?php echo $oArticle->user->login.' '.date('d.m.Y H:i:s', strtotime($oArticle->date_create));?>
    </div>

    <h1><?= Html::encode($this->title) ?></h1>



    <div>
        <?php echo HtmlPurifier::process($oArticle->text) ?>
    </div>  

    <div>
        <h2>Оставить комментарий</h2>

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($oComment, 'text')->textarea(['rows' => 6]) ?>

        <div class="form-group">
            <?= Html::submitButton('Комментировать', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
    </div>


    <h2>
        Комментарии
    </h2>

    <?php if ($oArticle->comments): ?>
        <?php foreach ($oArticle->comments as $oComment): ?>
            <div class="post">

                <div style="font-weight: bold;">
                    <?php echo $oComment->user ? $oComment->user->login : 'Анонимный пользователь';?>
                </div>


                <?php echo HtmlPurifier::process($oComment->text) ?>
            </div>
        <?php endforeach ?>
    <?php endif ?>

</div>