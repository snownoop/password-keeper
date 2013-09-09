<?php
$this->pageTitle = $model->name . '-view';
?>

<div class="row">
    <div class="span12">
        <h1>Details:</h1>


        <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'add-image-form',
            'type' => 'horizontal',
            'enableAjaxValidation' => false,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        )); ?>

        <div class="note-back"></div>
        <div class="glasses"></div>
        <div class="note-bottom"></div>


        <fieldset>

            <?php echo $form->textFieldRow($model, 'name', array('class' => 'input-xxlarge update-input view-input', 'disabled' => 'disabled')); ?>
            <?php echo $form->textFieldRow($model, 'login', array('class' => 'input-xxlarge update-input view-input', 'disabled' => 'disabled')); ?>
            <?php echo $form->textFieldRow($model, 'password', array('class' => 'input-xxlarge update-input view-input', 'disabled' => 'disabled')); ?>
            <?php echo $form->textAreaRow($model, 'notes', array('class' => 'input-xxlarge update-input view-input', 'rows' => 16, 'disabled' => 'disabled')); ?>

        </fieldset>

        <div class="buttons">
            <div class="button-back">
                <?php $this->widget('bootstrap.widgets.TbButton', array('label' => 'Back', 'url' => array('/site/dashboard'))); ?>
            </div>
        </div>

        <?php $this->endWidget(); ?>

    </div>
</div>







