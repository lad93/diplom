<?php

abstract class Command {


    protected $NAME = ''; //название команды
    protected $OPERANDS = 0; //количество операндов
    protected $BASE_COMMANDS = array();  //набор базовых команд для данного класса


} 