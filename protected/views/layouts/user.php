<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <link rel="stylesheet" type="text/css"
          href="<?php echo Yii::app()->baseUrl . Yii::app()->params['pathToStyles']; ?>/styles.css">

    <title><?php echo CHtml::encode($this->pageTitle) . ' :: ' . Yii::app()->name; ?></title>

    <?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>
</head>
<body>

<header>
    <?php $this->widget('bootstrap.widgets.TbNavbar', array(
        'brand' => CHtml::encode(Yii::app()->name),
        'brandUrl' => array('/site/index'),
        'collapse' => true,
        'items' => array(
            array(
                'class' => 'bootstrap.widgets.TbMenu',
                'items' => array(
                    array('label' => 'Sign in', 'url' => array('site/signIn'), 'visible' => Yii::app()->user->isGuest),
                    array('label' => 'Sign up', 'url' => array('site/signUp'), 'visible' => Yii::app()->user->isGuest),
                    array('label' => 'About', 'url' => array('site/about')),
                    array('label' => 'Dashboard', 'url' => array('site/dashboard'), 'visible' => !Yii::app()->user->isGuest)
                ),
            ),
            array(
                'class' => 'bootstrap.widgets.TbMenu',
                'htmlOptions' => array('class' => 'pull-right'),
                'items' => array(
                    array('label' => Yii::app()->user->name, 'url' => '#', 'visible' => !Yii::app()->user->isGuest, 'items' => array(
                        array('label' => 'Preferences', 'url' => array('site/preferences')),
                        '---',
                        array('label' => 'Logout', 'url' => array('site/logout')),
                    )),
                ),
            ),
        ),
    )); ?>
</header>

<div id="main-container" class="wrapper main_wrapper">
    <div class="container">

        <?php $this->widget('bootstrap.widgets.TbAlert', array(
            'block' => true,
            'fade' => true,
            'closeText' => '&times;',
            'alerts' => array(
                'success' => array('block' => true, 'fade' => true, 'closeText' => '&times;'),
                'error' => array('block' => true, 'fade' => true, 'closeText' => '&times;'),
                'info' => array('block' => true, 'fade' => true, 'closeText' => '&times;'),
            ),
        )); ?>

        <?php echo $content; ?>

        <footer>
            <div class="row">
                <div class="span12">
                    <hr class="bs-docs-separator footer_line">
                    <div class="signature user_signature">
                        &copy; <?php echo date('Y') . ' AI-102';?>
                        <span><?php echo '| Novak, Nguen, Pavlichenko, Gordienko, Karluchenko.' ?></span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

</body>
</html>