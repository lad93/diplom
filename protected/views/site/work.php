<?php

   echo CHtml::tag('p',array(),'Скачать файл: '.$link);
   echo CHtml::link('Назад',Yii::app()->user->returnUrl);

?>