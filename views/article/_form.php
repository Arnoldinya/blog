<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($oArticle, 'title')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($oArticle, 'text')->textarea(['rows' => 6]) ?>
    <div class="form-group">
        <?= Html::submitButton($oArticle->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $oArticle->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
