<?php
/* @var $this SiteController */

$this->pageTitle = 'About';

?>
<div class="view_wrapper">

    <div class="block block_1">
        <div class="block_title">
        </div>
        <div class="block_content">
            <div class="block_image">
                <?php echo CHtml::image(Yii::app()->controller->createAbsoluteUrl(Yii::app()->params['pathToImages'] . DIRECTORY_SEPARATOR . 'lamp.png')); ?>
            </div>
            <div class="block_text">
                How many times you had troubles like: "Oh God, it was so long time ago, when I signed up that website.
                I just couldn't remember my login and password." ? I also came across all that problems a huge
                couples of time. So i had to register a new account, losing all the stuff, followers, documents, achivements, etc
                that was connected with the main account. Due to not instant and not very good support of "Forgot password" service,
                an idea was created in out brains...
            </div>
        </div>
    </div>

    <div class="block block_2">
        <div class="block_title">
        </div>
        <div class="block_content">
            <div class="block_image">
                <?php echo CHtml::image(Yii::app()->controller->createAbsoluteUrl("/images/1password.png")); ?>
            </div>
            <div class="block_text">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo,
                egestas id, condimentum at, laoreet mattis, massa. Sed eleifend nonummy diam. Praesent mauris ante,
                elementum et, bibendum at, posuere sit amet, nibh. Duis tincidunt lectus quis dui viverra vestibulum.
                Suspendisse vulputate aliquam dui. Nulla elementum dui ut augue. Aliquam vehicula mi at mauris. Maecenas
                placerat, nisl at consequat rhoncus, sem nunc gravida justo, quis eleifend arcu velit quis lacus. Morbi
                magna magna, tincidunt a, mattis non, imperdiet vitae, tellus. Sed odio est, auctor ac, sollicitudin in,
                consequat vitae, orci. Fusce id felis. Vivamus sollicitudin metus eget eros.
            </div>
        </div>
    </div>

    <div class="block block_3">
        <div class="block_title">
        </div>
        <div class="block_content">
            <div class="block_text">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo,
                egestas id, condimentum at, laoreet mattis, massa. Sed eleifend nonummy diam. Praesent mauris ante,
                elementum et, bibendum at, posuere sit amet, nibh. Duis tincidunt lectus quis dui viverra vestibulum.
                Suspendisse vulputate aliquam dui. Nulla elementum dui ut augue. Aliquam vehicula mi at mauris. Maecenas
                placerat, nisl at consequat rhoncus, sem nunc gravida justo, quis eleifend arcu velit quis lacus. Morbi
                magna magna, tincidunt a, mattis non, imperdiet vitae, tellus. Sed odio est, auctor ac, sollicitudin in,
                consequat vitae, orci. Fusce id felis. Vivamus sollicitudin metus eget eros.
            </div>
            <div class="block_image">
                <?php echo CHtml::image(Yii::app()->controller->createAbsoluteUrl("/images/1password.png")); ?>
            </div>
        </div>
    </div>

</div>


