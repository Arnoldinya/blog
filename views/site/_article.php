<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
?>
<div class="post">

    <div class="date">
    	<?php echo $model->user->login.' '.date('d.m.Y H:i:s', strtotime($model->date_create));?>
    </div>

    <h2>
    	<?php echo Html::encode($model->title) ?>
    </h2>
    
    <div>
    	<?php echo HtmlPurifier::process($model->text) ?>
    	<div class="comment">
    		<a href="<?php echo Url::toRoute(['site/article', 'id' => $model->id]);?>">Комментарии (<?php echo count($model->comments);?>)</a>
    	</div>
    </div>    
</div>