<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Nodes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Quests'), 'url' => '/quest'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="node-index">

    <h1><?php echo Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <a class="btn btn-success" href="/node/create?quest_id=<?php echo $quest_id?>"><?=Yii::t('app', 'Create Node')?></a>
	</p>
	

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'quest_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
