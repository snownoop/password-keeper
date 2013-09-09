<?php
/**
 * Created by JetBrains PhpStorm.
 * User: snownoob
 * Date: 4/10/13
 * Time: 8:28 AM
 * To change this template use File | Settings | File Templates.
 */

$this->pageTitle = 'Sign in';
?>

<div class="row">
    <div class="span12">

        <?php $this->widget('bootstrap.widgets.TbAlert'); ?>

        <h1>Dashboard</h1>


        <?php $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'dashboard-table',
            'type' => '',
            'dataProvider' => $model->search(),
//            'filter'=>$model,
            'enablePagination' => true,
            'template' => "{items}",
            'columns' => array(
//                array('name' => 'id', 'header' => '#'),
                array(
                    'name' => 'name',
                    'header' => 'Resource name',
                ),
                array(
                    'name' => 'login',
                    'header' => 'Login/email',
                ),
                array(
                    'name' => 'password',
                    'header' => 'Password',
                    'value' => '$data->decodedPassword',
                ),
                array(
                    'name' => 'complexity',
                    'header' => 'Complexity',
                    'value' => '$data->complexityValue',
                    'type' => 'html',
                ),
                array(
                    'class' => 'bootstrap.widgets.TbButtonColumn',
                    'template' => '{view}{update}{delete}',
                ),
            ),
        )); ?>

        <div class="buttons">
            <div class="button-new">
                <?php $this->widget('bootstrap.widgets.TbButton', array('label' => 'Add new +', 'type'=>'success', 'url' => array('/site/add'))); ?>
            </div>
        </div>

    </div>
</div>