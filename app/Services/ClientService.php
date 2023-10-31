<?php

namespace App\Services;

use App\Models\Person;
use App\Models\Business;
use App\Models\District;
use App\Models\Province;
use App\Enums\DocumentTypeEnum;

class ClientService
{
  public function createOrUpdateClient(array $clientData)
  {
    if (isset($clientData['document_number'])) {
      $client = $this->createOrUpdatePersonClient($clientData);
      $client->touch();
      return $client;
    } elseif (isset($clientData['ruc'])) {
      $client = $this->createOrUpdateBusinessClient($clientData);
      $client->touch();
      return $client;
    }
  }

  private function createOrUpdatePersonClient(array $clientData)
  {
    $person = Person::firstOrCreate(
      ['document_number' => $clientData['document_number']],
      [
        'document_type' => DocumentTypeEnum::DNI,
        'name' => $clientData['name'],
        'paternal_surname' => $clientData['paternal_surname'],
        'maternal_surname' => $clientData['maternal_surname'],
        'full_name' => $clientData['full_name'],
      ]
    );

    return $person->client()->firstOrNew([]);
  }

  private function createOrUpdateBusinessClient(array $clientData)
  {
    $provinceId = Province::where('name', $clientData['province'])->value('id');
    $districtId = District::where('province_id', $provinceId)->where('name', $clientData['district'])->value('id');

    $business = Business::firstOrCreate(
      ['ruc' => $clientData['ruc']],
      [
        'reason_social' => $clientData['reason_social'],
        'full_address' => $clientData['full_address'],
        'address' => $clientData['address'],
        'status' => $clientData['status'],
        'condition' => $clientData['condition'],
        'region' => $clientData['region'],
        'province' => $clientData['province'],
        'district' => $clientData['district'],
        'ubigeous_sunat' => $clientData['ubigeous_sunat'],
        'retention_agent' => $clientData['retention_agent'],
        'ubigeous' => json_encode($clientData['ubigeous']),
        'annexes' => json_encode($clientData['annexes']),
        'district_id' => $districtId,
      ]
    );

    return $business->client()->firstOrNew([]);
  }
}
