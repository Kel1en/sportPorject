<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NbaTeam */

$this->title = 'Create Nba Team';
$this->params['breadcrumbs'][] = ['label' => 'Nba Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nba-team-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
