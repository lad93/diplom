<?php

class Site{

    function __construct($CODE){
        //первый проход

        //создаем объект,который будет содержать всё данные по компилируемому коду
        $APP  = new APPLICATION($CODE);
    }


}