<?php
use yii\widgets\ListView;

/* @var $this yii\web\View */
$this->title = 'My Yii Application';

?>
<div class="site-index">

    <h1>
        Статьи
    </h1>
    
    <?php echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_article',
    ]); ?>
</div>
