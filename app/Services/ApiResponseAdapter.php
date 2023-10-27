<?php

namespace App\Services;

class ApiResponseAdapter
{
  protected $apiDniResponseMapping = [
    'numero' => 'document_number',
    'nombre_completo' => 'full_name',
    'nombres' => 'name',
    'apellido_paterno' => 'paternal_surname',
    'apellido_materno' => 'maternal_surname',
    'codigo_verificacion' => 'verification_code',
    'departamento' => 'region',
    'provincia' => 'province',
    'distrito' => 'district',
    'direccion' => 'address',
    'direccion_completa' => 'full_address',
    'ubigeo_sunat' => 'ubigeous_sunat',
    'ubigeo' => 'ubigeous',
  ];

  protected $apiRucResponseMapping = [
    'ruc' => 'ruc',
    'nombre_o_razon_social' => 'reason_social',
    'direccion_completa' => 'full_address',
    'direccion' => 'address',
    'estado' => 'status',
    'condicion' => 'condition',
    'departamento' => 'region',
    'provincia' => 'province',
    'distrito' => 'district',
    'ubigeo_sunat' => 'ubigeous_sunat',
    'es_agente_de_retencion' => 'retention_agent',
    'ubigeo' => 'ubigeous',
    'anexos' => 'annexes',
  ];

  public function adaptDniResponse($originalResponse)
  {
    $adaptedResponse = new \stdClass();

    foreach ($originalResponse as $key => $value) {
      if (isset($this->apiDniResponseMapping[$key])) {
        $newKey = $this->apiDniResponseMapping[$key];
        $adaptedResponse->$newKey = $value;
      }
    }

    return $adaptedResponse;
  }

  public function adaptRucResponse($originalResponse)
  {
    $adaptedResponse = new \stdClass();

    foreach ($originalResponse as $key => $value) {
      if (isset($this->apiRucResponseMapping[$key])) {
        $newKey = $this->apiRucResponseMapping[$key];
        $adaptedResponse->$newKey = $value;
      }
    }

    return $adaptedResponse;
  }
}
