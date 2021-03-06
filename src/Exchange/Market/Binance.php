<?php


namespace Mokka\Exchange\Market;

use GuzzleHttp\Client;
use Mokka\Exchange\ExchangeInterface;

class Binance implements ExchangeInterface
{

    /**
     * @var
     */
    private static $apiService;

    public function __construct($config)
    {
        self::$apiService = new BinanceApiService($config['api_key'],$config['api_secret']);
    }

    /**
     * Get symbol price from source
     * @param $symbol
     * @return float
     */
    public function getPrice($symbol) : float
    {
        $client = new Client();

        $response = $client->get("https://api.binance.com/api/v3/ticker/price?symbol={$symbol}");

        $response = json_decode($response->getBody()->getContents(), TRUE);

        return (float) $response['price'];
    }

    /**
     * Get historical prices
     * @param $symbol
     * @return array
     */
    public function getHistoricalPrices($symbol): array
    {
        // TODO: Implement getHistoricalPrices() method.
    }

    /**
     * Put buy order
     * @return mixed
     */
    public function buyOrder()
    {
        return true;
    }

    /**
     * Put sell order
     * @return mixed
     */
    public function sellOrder()
    {
        // TODO: Implement sellOrder() method.
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'binance';
    }


}