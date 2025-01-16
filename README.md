
Установка через Composer
Установите с помощью команды:

composer require kirshet/stt-api-component
Настройка
Добавьте компонент в конфигурацию приложения:

'components' => [
    'sttApi' => [ 
        'class' => 'frontend\components\SttApiComponent', 
        'apiUrl' => '',
        'token' => '',
    ], 
],
Использование в контроллере
use yii\web\Controller;

class CallController extends Controller
{
    public function actionIndex()
    {
        $callid = '';
        $callurl = '';

        $response = \Yii::$app->sttApi->stt([
            'callid' => $callid,
            'callurl' => $callurl,
        ]);

        return $this->render('index', [
            'response' => $response,
        ]);
    }
}
Использование в представлении
<?php
use common\widgets\DialogWidget; 
 
echo DialogWidget::widget([ 
    'callid' => '', 
    'callurl' => '', 
]); 
?>
Пример POST-запроса
Пример тела запроса, который отправляется на API:

{
    "callid": "",
    "callurl": ""
}
Пример ответа API:


[
    {
        "source": "transmitter",
        "start": 2.14,
        "end": 14.96,
        "text": "Здравствуйте, Вы позвонили в аварийно-диспетчерскую службу. Оставайтесь на линии, Вам ответит первый освободившийся оператор. Здравствуйте, диспетчер Наталья, чем могу помочь?",
        "score": -19.951597213745117
    },
    {
        "source": "receiver",
        "start": 16.9,
        "end": 22.68,
        "text": "Вот ко мне приходят ремонтные бригады, и у меня неработает туалет.",
        "score": -0.7827094197273254
    }
]
