<?php


namespace frontend\controllers;

use Yii;
use GuzzleHttp\Client; // подключаем Guzzle
use yii\helpers\Url;

class ParserController extends \yii\web\Controller
{
    public function actionYandex()
    {
        // создаем экземпляр класса
        $client = new Client();
        // отправляем запрос к странице Яндекса
        $res = $client->request('GET', 'https://www.flashscore.ru/basketball/usa/nba/results/');
        // получаем данные между открывающим и закрывающим тегами body
        $body = $res->getBody();

        // вывод страницы Яндекса в представление
        return $this->render('yandex', ['body' => $body]);
    }

}