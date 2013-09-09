<?php
$this->pageTitle = 'Add new record';
?>

<div class="row">
    <div class="span12">
        <h1>Update:</h1>

        <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'add-image-form',
            'type' => 'horizontal',
            'enableAjaxValidation' => false,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        )); ?>

        <div class="note-back"></div>
        <div class="karandash"></div>
        <div class="note-bottom"></div>


        <fieldset>

            <?php echo $form->textFieldRow($model, 'name', array('class' => 'input-xxlarge update-input')); ?>
            <?php echo $form->textFieldRow($model, 'login', array('class' => 'input-xxlarge update-input')); ?>
            <?php echo $form->textFieldRow($model, 'password', array('class' => 'input-xxlarge update-input')); ?>
            <?php echo $form->textAreaRow($model, 'notes', array('class' => 'input-xxlarge update-input', 'rows' => 16)); ?>

        </fieldset>

        <div class="buttons">
            <div class="button-back">
                <?php $this->widget('bootstrap.widgets.TbButton', array('label' => 'Back', 'url' => array('/site/dashboard'))); ?>
            </div>

            <div class="button-save">
                <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => 'Save')); ?>
            </div>
        </div>

        <?php $this->endWidget(); ?>

    </div>
</div>