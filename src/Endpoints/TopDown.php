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
            Routes::modulateRoute()->routeData("localidades/estados/operadora/1/tipovinculacao/Todos/situacaohabilitacaoprestador/Ativo")
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
            Routes::modulateRoute()->routeData("localidades/cidades/operadora/1/tipovinculacao/Todos/estado/{$uf}/situacaohabilitacaoprestador/Ativo")
        );
    }

    /**
     * get specialties data by $ibgeCityCode code
     * @param $ibgeCityCode
     * @param $plan
     * @return \ArrayObject
     */
    public function specialties($ibgeCityCode, $plan) 
    {
        return $this->client->request(
            self::GET,
            Routes::modulateRoute()->routeData("especialidades/operadora/1/tipovinculacao/Todos/cidadeibge/{$ibgeCityCode}/situacaohabilitacaoprestador/Ativo?idPlano={$plan}")
        );
    }

    /**
     * get clinic providers by ibgeCityCode and specialtyId
     * @param $ibgeCityCode
     * @param $specialtyId
     * @param $providerType
     * @param $neighborhood
     * @return \ArrayObject
     */
    public function providers($ibgeCityCode, $specialtyId, $neighborhood = null) 
    {
        if($neighborhood == null) {
            return $this->client->request(
                self::GET,
                Routes::modulateRoute()->routeData("prestadores/operadora/1/tipovinculacao/Todos/cidadeibge/{$ibgeCityCode}/especialidade/{$specialtyId}/situacaohabilitacaoprestador/Ativo?limit=2147483647&retornarDadosComplemento=true")
            );
        } else {
            return $this->client->request(
                self::GET,
                Routes::modulateRoute()->routeData("prestadores/operadora/1/tipovinculacao/Todos/cidadeibge/{$ibgeCityCode}/especialidade/{$specialtyId}/situacaohabilitacaoprestador/Ativo?nomeBairro={$neighborhood}&limit=2147483647&retornarDadosComplemento=true")
            );
        }
    }

    /**
     * get provider types by ibge city code and plan id
     * @param [type] $ibgeCityCode
     * @param [type] $plan
     * @return void
     */
    public function providerTypes($ibgeCityCode, $plan) 
    {
        return $this->client->request(
            self::GET,
            Routes::modulateRoute()->routeData("tiposprestador/operadora/1/tipovinculacao/Todos/cidadeibge/{$ibgeCityCode}/plano/{$plan}/situacaohabilitacaoprestador/Ativo")
        );
    }

    /**
     * get plans by ibge city code
     * @param [type] $ibgeCityCode
     * @return void
     */
    public function plans($ibgeCityCode) 
    {
        return $this->client->request(
            self::GET,
            Routes::modulateRoute()->routeData("planos/operadora/1/tipovinculacao/Todos/cidadeibge/{$ibgeCityCode}/situacaohabilitacaoplano/Ativo")
        );
    }
}