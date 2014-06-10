<?php


class APPLICATION {

    private $REG_TAB; //массив регистров и их коды
    private $SEG_TAB; //массив сегментных регистров и их коды
    private $SEGMENT_TABLE; //таблица сегментов, обязательные поля name, len
    private $LABEL_TABLE; //таблица меток, обязательные поля name, sgm, dsp
    private $DATAS_VARS; //массив для переменных в сегменте DATAS

    function __construct($CODE)
    {
        $this->getArrCommands($CODE);
    }


    /*
     * Разбиение нашего кода на поля
     */
    private function getArrCommands($CODE){
        $arCommand = explode("\n",$CODE);   //каждая строчка по отдельности

        //уберем все комментарии из кода
        foreach($arCommand as $k=>&$v){
            if(($pos = strpos($v,';')) !== false){
                $v = substr($v,0,$pos);
            }
        }

        //разбиваем каждую строку на отдельные поля
        foreach($arCommand as $k=>$v){
            preg_match_all('/\S*\s+/i',$v,$m,PREG_PATTERN_ORDER);
            $arCommandField[] = $m;
        }

        //удаляем ненужные знаки
        foreach($arCommandField as $k=>$v){
            foreach($v[0] as $key=>$value){
                if(preg_match('/^[,]\s+/',$value)) unset($arCommandField[$k][0][$key]);
            }
        }
        _print_r($arCommandField);

    }


} 