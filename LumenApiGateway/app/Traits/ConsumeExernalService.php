<?php

namespace \App\Traits;
use GuzzleHttp\Client;

trait ConsumeExernalService {
    /**
     * send a request to any services
     * @param $method
     * @param $requestUrl
     * @param $form_params
     * @param $headers
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */

    public function performRequest($method,$requestUrl,$form_params = [],$headers = []) {
        $client = new Client(['base_uri'=>$this->baseUri]);

        $response = $client->request($method, $requestUrl, ['form_params' => $form_params,'headers'=>$headers]);

        return $response->getBody()->getContents();

    }

}
