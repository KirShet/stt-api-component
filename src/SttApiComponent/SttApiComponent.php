<?php

namespace kirshet\stt-api-component\SttApiComponent; 

use yii\base\Component;
use yii\httpclient\Client;
 
class SttApiComponent extends Component
{
    public $apiUrl = 'http://192.168.0.113:8000/stt';
    public $apiToken = 'Bearer Ux1lVPyOFFFwv16fS4munCyz8I1vZQWhgni6zXf1hqyZ0heODvHYsjXUNi5yWo9W';

    /**
    * @param string $callId Идентификатор вызова
    * @param string $callUrl Ссылка на запись вызова.
    * @return array|null Возвращает результат ответа или null в случае ошибки.
    */
    public function sendRequest(string $callId, string $callUrl)
    {
        $client = new Client();
 
        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl($this->apiUrl)
            ->setHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => $this->apiToken,
            ])
            ->setContent(json_encode([
                'callid' => $callId,
                'callurl' => $callUrl,
            ]))
            ->send();
 
        if ($response->isOk) {
            return json_decode($response->getContent(), true);
        }
 
        \Yii::error('STT API Error: ' . $response->statusCode, __METHOD__);
        return null;
    }
}
 