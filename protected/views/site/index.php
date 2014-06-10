<?php
/* @var $this SiteController */
    echo CHtml::beginForm(Yii::app()->request->baseUrl.'/index.php/site/work','post',array('id' => 'formCode'));
    echo CHtml::tag('p',array(),'Введите код сюда:');
    echo CHtml::textArea('code','',array('rows'=>20, 'width' => '70%', 'class' => 'code'));
    echo CHtml::tag('br');
    echo CHtml::submitButton('Отправить код',array('class'=>'btn btn-primary'));
    echo CHtml::endForm();
?>

