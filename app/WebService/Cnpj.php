<?php

namespace App\WebService;

class Cnpj
{

    /**
     *  Essa é a URL Base para consulta do CNPJ.
     *  @var string
     */
    const URL_BASE = 'https://api-publica.speedio.com.br';

    /**
     *  Função para consultar o CNPJ na API.
     *  @param string $cnpj
     *  @return array
     */

    public function consultarCNPJ($cnpj)
    {
        // Limpando os caracteres.
        $cnpj = preg_replace('/\D/', '', $cnpj);

        return $this->get('/buscarcnpj?cnpj=' . $cnpj);
    }


    /**
     *  Função que irá executar a consulta na API.
     *  @param string $resource
     *  @return array
     */
    public function get($resource)
    {
        $endpoint = self::URL_BASE . $resource;

        // Iniciando o CURL
        $curl = curl_init();

        // Configurações do CURL
        curl_setopt_array($curl, [
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ]);

        // Executando o CURL
        $response = curl_exec($curl);

        // Fechando a Conexão do CURL
        curl_close($curl);

        // Transformando o Retorno Array.
        $responseArray = json_decode($response, true);

        // Validando o Retorno.
        return is_array($responseArray) ? $responseArray : [];
    }
}
