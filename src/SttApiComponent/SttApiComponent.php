<?php 
 
namespace frontend\components; 
 
use yii\base\Component; 
use yii\httpclient\Client; 
use yii\base\InvalidConfigException; 
 
class SttApiComponent extends Component 
{ 
    public $apiUrl;
    public $token;
 
    /** 
     * @param string $callid
     * @param string $callurl
     * @return array
     * @throws \yii\base\ErrorException 
     */ 
    public function stt($callid, $callurl) 
    { 
        if (empty($this->apiUrl) || empty($this->token)) { 
            throw new InvalidConfigException('API URL и Token должны быть заданы.'); 
        } 
 
        $client = new Client(); 
 
        $response = $client->createRequest() 
            ->setMethod('POST') 
            ->setUrl($this->apiUrl . '/stt') 
            ->setHeaders([ 
                'Authorization' => 'Bearer ' . $this->token, 
                'Content-Type' => 'application/json', 
            ]) 
            ->setData([ 
                'callid' => $callid, 
                'callurl' => $callurl, 
            ]) 
            ->send(); 
 
        if (!$response->isOk) { 
            throw new \yii\base\ErrorException('Ошибка при обращении к API: ' . $response->statusCode); 
        } 

        return json_decode($response->content, true); 
    } 
} 