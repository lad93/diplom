<?php

class SiteController extends Controller
{
	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}


	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionWork(){
        $model = '';
        if(isset($_POST['code']) && !empty($_POST['code'])){
            //отправим наш код на обработку,в ответ только получим ссылку на скачивание
            $model = new Site($_POST['code']);
            $str = '800900074d6f642e61736de188200000001c547572626f20417373656d626c6572202056657273696f6e20332e319a880f0040e93382bb42074d6f642e61736df888030040e94c960200006888030040a194960700054441544153f1980700602600020101d796070005434f444553f0980700600000030101fc88040040a20191A02A0001000012000100FCFF040002000800FDFF0100F9FF0200FFFF0400010007000900FFFF0500F7FFFFFF18A040000200001EB8000050B800008ED8B400B003CD10BE02008B0E00002B1C9FD0ECD0ECD0ECD0ECD0ECD0ECD0EC80E40180FC01EB01908B04F7D8890433DBE1DCCB549c0d00c8065401c40b5401c4105401e78a0700c10002020000aa';
            exec('start 1.exe '.$str);
        }
        $this->render('work'/*,array('link' => $model)*/);
    }

}