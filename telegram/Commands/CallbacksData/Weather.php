<?php

namespace Fenris\Bot;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Класс возвращающий необходимые данные по документации
 *
 * @package Fenris\Bot
 */
class Weather
{
    private $apiKey = 'e3d1be824acc1a4a72bccd01ece7b548';
    private $apiUrl = 'http://api.openweathermap.org/data/2.5/';

    /**
     * Метод для получения и вывода документации
     *
     * @param object $location
     * @return string
     * @throws GuzzleException
     */
    public function getWeather(object $location): string
    {
        if (empty($this->apiKey)) {
            return 'Ошибка с API ключом';
        }

        $params = [
            'lat' => $location->latitude,
            'lon' => $location->longitude,
            'APPID' => $this->apiKey,
            'units' => 'metric',
        ];

        $client = new Client(['base_uri' => $this->apiUrl,]);
        $response = $client->get('weather', ['query' => $params]);
        $data = json_decode($response->getBody(), true);

        $conditions = [
            'clear' => ' ☀️',
            'clouds' => ' ☁️',
            'rain' => ' ☔ ',
            'drizzle' => ' ☔ ',
            'thunderstorm' => ' ⚡️',
            'snow' => ' ❄️',
            'mist' => ' ☁ ️',
        ];
        $conditions_now = strtolower($data['weather'][0]['main']);

        return 'Температура сейчас ' . (int)$data['main']['temp'] . '°C, ощущается как '
            . (int)$data['main']['feels_like'] . '°C' . $conditions[$conditions_now];
    }
}
