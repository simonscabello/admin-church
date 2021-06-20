<?php


namespace App\Services;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class BibleApiService
{
    private static function url()
    {
        return config('app.bibleapi_url');
    }

    private static function headers(): array
    {
        return [
            'Authorization' => 'Bearer ' . config('app.bibleapi_token'),
            'Accept' => 'application/json'
        ];
    }

    /**
     * Service constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    public function getRandomVerse()
    {
        try {
            $response = $this->client->get(
                self::url(),
                ['headers' => self::headers()]
            );

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            return $e->getMessage();
        } catch (GuzzleException $e) {
            return $e->getMessage();
        }
    }
}
