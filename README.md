Установка через Composer
Установите виджет с помощью команды:

composer require kirshet/yii2-dialog-widget
Использование в представлении

use common\widgets\DialogWidget;

// Вызов виджета с параметрами callid и callurl
echo DialogWidget::widget([
    'callid' => '11196663',
    'callurl' => 'https://ooo-tehnologija-i-servis.megapbx.ru/api/v2/call-records/record/2024-12-02/62c8e98e-8186-48db-b0f9-994701586c8d/79202603864_in_2024_12_02-15_38_11_79191366941_fmsf.mp3',
]);
Настройка автозагрузки

{
    "name": "kirshet/yii2-dialog-widget",
    "description": "A Dialog Widget for user interactions in Yii2 applications.",
    "type": "library",
    "license": "MIT",
    "autoload": {
        "psr-4": {
            "kirshet\\yii2\\": "src/"
        }
    },
    "authors": [
        {
            "name": "Kirill Shetko",
            "email": "kirshet2000@gmail.com"
        }
    ],
    "minimum-stability": "stable",
    "extra": {
        "installer-paths": {
            "common/widgets/DialogWidget": ["kirshet/yii2"]
        }
    }
}
Использование в контроллере

use yii\web\Controller;

class CallController extends Controller
{
    public function actionIndex()
    {
        $callid = '11196663';
        $callurl = 'https://ooo-tehnologija-i-servis.megapbx.ru/api/v2/call-records/record/2024-12-02/62c8e98e-8186-48db-b0f9-994701586c8d/79202603864_in_2024_12_02-15_38_11_79191366941_fmsf.mp3';

        return $this->render('index', [
            'callid' => $callid,
            'callurl' => $callurl,
        ]);
    }
}
И в представлении:

use common\widgets\DialogWidget;

echo DialogWidget::widget([
    'callid' => $callid,
    'callurl' => $callurl,
]);