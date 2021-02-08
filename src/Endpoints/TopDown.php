<?php

namespace TopDown\Endpoints;

use TopDown\Endpoints\Endpoint;
use TopDown\Routes;


class TopDown extends Endpoint {

    /**
     * get all data for accredited states (IBGE code, etc.)
     * @return \ArrayObject
     */
    public function states() 
    {
        return $this->client->request(
            self::GET,
            Routes::modulateRoute()->routeData("localidades/estados/operadora/1/tipovinculacao/Credenciado/situacaohabilitacaoprestador/Ativo")
        );
    }

    /**
     * get specialties data by $ibgeCityCode code
     * @param $ibgeCityCode
     * @return \ArrayObject
     */
    public function specialties($ibgeCityCode) 
    {
        return $this->client->request(
            self::GET,
            Routes::modulateRoute()->routeData("especialidades/operadora/1/tipovinculacao/Credenciado/cidadeibge/{$ibgeCityCode}/situacaohabilitacaoprestador/Ativo")
        );
    }

    /**
     * get clinic providers by ibgeCityCode and specialtyId
     * @param $ibgeCityCode
     * @param $specialtyId
     * @return \ArrayObject
     */
    public function providers($ibgeCityCode, $specialtyId) 
    {
        return $this->client->request(
            self::GET,
            Routes::modulateRoute()->routeData("prestadores/operadora/1/tipovinculacao/Credenciado/cidadeibge/{$ibgeCityCode}/especialidade/{$specialtyId}/situacaohabilitacaoprestador/Ativo?limit=2147483647&retornarDadosComplemento=true")
        );
    }
}