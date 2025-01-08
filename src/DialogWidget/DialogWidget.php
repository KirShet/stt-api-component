<?php 
 
namespace common\widgets; 
 
use Yii; 
use yii\base\Widget; 
use frontend\components\SttApiComponent; 
 
class DialogWidget extends Widget 
{ 
    public $callid;
    public $callurl;
 
    /** 
     * @return string HTML-вывод 
     */ 
    public function run() 
    { 
        try { 
            /** @var SttApiComponent $sttApi */ 
            $sttApi = Yii::$app->sttApi; 
            $dialog = $sttApi->stt($this->callid, $this->callurl); 
        } catch (\Exception $e) { 
            return ": " . $e->getMessage(); 
        } 
 
        $html = '<div class="dialog">'; 
        foreach ($dialog as $item) { 
            $source = $item['source'] === 'transmitter' ? 'Диспетчер' : 'Заявитель'; 
            $html .= "<div class='message $item[source]'>
            <strong>$source:</strong> {$item['text']} 
                        <div class='timestamp'>({$item['start']} - {$item['end']})</div> 
                      </div>"; 
        } 
        $html .= '</div>'; 
 
        return $html; 
    } 
} 