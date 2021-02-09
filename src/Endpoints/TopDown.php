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
     * get all cities data by UF state code
     *
     * @param [type] $uf
     * @return void
     */
    public function cities($uf) 
    {
        return $this->client->request(
            self::GET,
            Routes::modulateRoute()->routeData("localidades/cidades/operadora/1/tipovinculacao/Credenciado/estado/{$uf}/situacaohabilitacaoprestador/Ativo")
        );
    }

    /**
     * get specialties data by $ibgeCityCode code
     * @param $providerType
     * @param $ibgeCityCode
     * @return \ArrayObject
     */
    public function specialties($providerType, $ibgeCityCode) 
    {
        return $this->client->request(
            self::GET,
            Routes::modulateRoute()->routeData("especialidades/operadora/1/tipovinculacao/{$providerType}/cidadeibge/{$ibgeCityCode}/situacaohabilitacaoprestador/Ativo")
        );
    }

    /**
     * get clinic providers by ibgeCityCode and specialtyId
     * @param $ibgeCityCode
     * @param $specialtyId
     * @param $providerType
     * @return \ArrayObject
     */
    public function providers($ibgeCityCode, $specialtyId, $providerType) 
    {
        return $this->client->request(
            self::GET,
            Routes::modulateRoute()->routeData("prestadores/operadora/1/tipovinculacao/{$providerType}/cidadeibge/{$ibgeCityCode}/especialidade/{$specialtyId}/situacaohabilitacaoprestador/Ativo?limit=2147483647&retornarDadosComplemento=true")
        );
    }
}