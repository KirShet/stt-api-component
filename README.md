
Установка через Composer
Установите с помощью команды:

composer require kirshet/stt-api-component
Настройка
Добавьте компонент в конфигурацию приложения:

'components' => [
    'sttApi' => [ 
        'class' => 'frontend\components\SttApiComponent', 
        'apiUrl' => 'http://192.168.0.113:8000',
        'token' => 'Ux1lVPyOFFFwv16fS4munCyz8I1vZQWhgni6zXf1hqyZ0heODvHYsjXUNi5yWo9W',
    ], 
],
Использование в контроллере
use yii\web\Controller;

class CallController extends Controller
{
    public function actionIndex()
    {
        $callid = '11196663';
        $callurl = 'https://ooo-tehnologija-i-servis.megapbx.ru/api/v2/call-records/record/2024-12-02/62c8e98e-8186-48db-b0f9-994701586c8d/79202603864_in_2024_12_02-15_38_11_79191366941_fmsf.mp3';

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
    'callid' => '11196663', 
    'callurl' => 'https://ooo-tehnologija-i-servis.megapbx.ru/api/v2/call-records/record/2024-12-02/62c8e98e-8186-48db-b0f9-994701586c8d/79202603864_in_2024_12_02-15_38_11_79191366941_fmsf.mp3', 
]); 
?>
Пример POST-запроса
Пример тела запроса, который отправляется на API:

{
    "callid": "11196663",
    "callurl": "https://ooo-tehnologija-i-servis.megapbx.ru/api/v2/call-records/record/2024-12-02/62c8e98e-8186-48db-b0f9-994701586c8d/79202603864_in_2024_12_02-15_38_11_79191366941_fmsf.mp3"
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