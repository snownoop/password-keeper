<?php
/**
 * Created by JetBrains PhpStorm.
 * User: snownoob
 * Date: 4/9/13
 * Time: 10:27 AM
 * To change this template use File | Settings | File Templates.
 */

$this->pageTitle= 'Sign up';
?>

<?php $this->widget('bootstrap.widgets.TbAlert'); ?>

<div class="row">
    <div class="span6 offset3" style="margin-top: 50px;">

        <?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
            'heading' => 'Sign up',
        )); ?>

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
        <?php echo $form->passwordFieldRow($model, 'repeat_password', array('class' => 'span4')); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'size' => 'large', 'label' => 'Sign up!')); ?>

        <?php $this->endWidget(); ?>

        <?php $this->endWidget(); ?>

    </div>
</div>