<?php

$this->pageTitle = $model->name.'-view';
?>

<div class="row">
    <div class="span12">
        <h1>Details:</h1>


        <?php $this->widget('bootstrap.widgets.TbDetailView', array(
            'type' => '',
            'data'=>$model,
            'attributes'=>array(
                array('name'=>'name', 'label'=>'Resourse name'),
                array('name'=>'login', 'label'=>'Login'),
                array('name'=>'password', 'label'=>'Password'),
                array(
                    'name' => 'complexity',
                    'header' => 'Complexity',
                    'value' => $model->getComplexityValue(),
                    'type' => 'html',

                ),
                array('name'=>'notes', 'label'=>'Notes'),
            ),
        )); ?>

    </div>
</div>







