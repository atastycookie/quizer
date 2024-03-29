<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Nodes').' квеста: '.$quest->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Quests'), 'url' => '/quest'];
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .view-node {
        display: inline-block;
        width: 20px;
        height: 20px;
        vertical-align: middle;
        background-image: url('/images/view.png');
        background-size: 40px auto;
        background-repeat: no-repeat;
        cursor: pointer;
        outline: 0;
    }

    .view-node:hover {
        background-position: -20px 0;
    }

    .update-node {
        display: inline-block;
        width: 20px;
        height: 20px;
        vertical-align: middle;
        background-image: url('/images/edit.png');
        background-size: 40px auto;
        background-repeat: no-repeat;
        cursor: pointer;
        outline: 0;
    }

    .update-node:hover {
        background-position: -20px 0;
    }

    .hints-node {
        display: inline-block;
        width: 20px;
        height: 20px;
        vertical-align: middle;
        background-image: url('/images/hint.png');
        background-size: 40px auto;
        background-repeat: no-repeat;
        cursor: pointer;
        outline: 0;
    }

    .hints-node:hover {
        background-position: -20px 0;
    }

    .delete-node {
        display: inline-block;
        width: 20px;
        height: 20px;
        vertical-align: middle;
        background-image: url('/images/delete.png');
        background-repeat: no-repeat;
        background-size: 40px auto;
        cursor: pointer;
        outline: 0;
    }

    .delete-node:hover {
        background-position: -20px 0;
    }
</style>

<div class="node-index">

    <h1><?php echo Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <a class="btn btn-success" href="/node/create?quest_id=<?php echo $quest->id?>"><?=Yii::t('app', 'Create Node')?></a>
	</p>
	

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'quest_id',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {hints} {delete}',
                'buttons' => [
                    'view' => function ($url, $data, $key) {
                        return Html::a('', $url, [
                            'class' => 'view-node',
                            'title' => Yii::t('app', 'View Node')
                        ]);
                    },
                    'update' => function ($url, $data, $key) {
                        return Html::a('', $url, [
                            'class' => 'update-node',
                            'title' => Yii::t('app', 'Update Node')
                        ]);
                    },
                    'hints' => function($url, $data, $key) {
                        return Html::a('', $url, [
                            'class' => 'hints-node',
                            'title' => Yii::t('app', 'Node Hints')
                        ]);
                    },
                    'delete' => function ($url, $data, $key) {
                        return Html::a('', $url, [
                            'class' => 'delete-node',
                            'title' => Yii::t('app', 'Delete Node'),
                            'onclick' => 'return confirm(\''.Yii::t('app', 'Are you sure?').'\') ? true : false;'
                        ]);
                    }
                ],
                'contentOptions' =>  ['style' => 'text-align: center;']
            ],
        ],
    ]); ?>

</div>
