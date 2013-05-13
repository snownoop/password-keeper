<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm */

$this->pageTitle = 'Sign in';
?>

<div class="row">
    <div class="span6 offset3" style="margin-top: 50px;">
        <?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
            'heading' => 'Sign in',
        ));?>

        <br><br>

        <?php /** @var BootActiveForm $form */
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'verticalForm',
            'htmlOptions' => array('class' => 'well'),
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        )); ?>
        <?php echo $form->textFieldRow($model, 'email', array('class' => 'span4')); ?>
        <?php echo $form->passwordFieldRow($model, 'password', array('class' => 'span4')); ?>
        <?php echo $form->checkboxRow($model, 'rememberMe'); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'size' => 'large', 'label' => 'Sign in!')); ?>

        <?php $this->endWidget(); ?>

        <?php $this->endWidget(); ?>

    </div>
</div>