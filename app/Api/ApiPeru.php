<?php

namespace App\Api;

use Exception;
use App\Models\Person;
use App\Models\Business;
use App\Http\Controllers\Controller;
use App\Services\ApiResponseAdapter;

class ApiPeru extends Controller
{
  protected $adapter;
  private static $url = "https://apiperu.dev/api/";
  private static $token = "f09194eedcacb5d304cbbc221c30b6c4cfce33af2f20e49081eed0cfa2a1448f";

  public function __construct(ApiResponseAdapter $adapter)
  {
    $this->adapter = $adapter;
  }

  public function getDni($dni)
  {
    $person = Person::with('district.province.region')->where('document_number', $dni)->first();

    if ($person)
    {
      $regionName = $person->district->province->region->name ?? null;
      $provinceName = $person->district->province->name ?? null;
      $districtName = $person->district->name ?? null;

      return (object) [
        'document_type' => $person->document_type,
        'document_number' => $person->document_number,
        'name' => $person->name,
        'paternal_surname' => $person->paternal_surname,
        'maternal_surname' => $person->maternal_surname,
        'phone_number' => $person->phone_number,
        'full_name' => $person->full_name,
        'region' =>  $regionName,
        'province' =>  $provinceName,
        'district' =>  $districtName,
        'district_id' => $person->district_id,
      ];
    }

    $response = self::makeRequest('dni/' . $dni);

    if ($response->success === false) {
      throw new Exception($response->message);
    }

    return $this->adapter->adaptDniResponse($response->data);
  }

  public function getRuc($ruc)
  {
    $business = Business::with('district.province.region')->where('ruc', $ruc)->first();

    if ($business) {
      $regionName = $business->district->province->region->name ?? null;
      $provinceName = $business->district->province->name ?? null;
      $districtName = $business->district->name ?? null;

      return (object) [
        'ruc' => $business->ruc,
        'reason_social' => $business->reason_social,
        'full_address' => $business->full_address,
        'address' => $business->address,
        'status' => $business->status,
        'condition' => $business->condition,
        'region' =>  $regionName,
        'province' =>  $provinceName,
        'district' =>  $districtName,
        'ubigeous_sunat' => $business->ubigeous_sunat,
        'retention_agent' => $business->retention_agent,
        'ubigeous' => $business->ubigeous,
        'annexes' => $business->annexes,
        'district_id' => $business->district_id,
      ];
    }

    $response = self::makeRequest('ruc/' . $ruc);

    if ($response->success === false) {
      throw new Exception($response->message);
    }

    return $this->adapter->adaptRucResponse($response->data);
  }

  private static function makeRequest($endpoint)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => self::$url . $endpoint,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . self::$token,
        'Accept: application/json',
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    try {
      return json_decode($response);
    } catch (\Exception $e) {
      return false;
    }
  }
}
