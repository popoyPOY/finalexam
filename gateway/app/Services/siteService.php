<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class siteService {
     use ConsumesExternalService;
     /*
     *@var string

     */

     public $baseUri;
     public $secret;

     public function __construct() {
          $this->baseUri = config('services.site1.base_uri');
          $this->secret = config('services.site1.secret');
     }


     /*
     *@return string
     */

     public function show() {
          return $this->performRequest('GET', 'api/books');
     }

     public function showUser($id) {
          return $this->performRequest('GET', "api/books/{$id}");
     }


     public function addUser($data) {
          return $this->performRequest('POST', 'api/books/', $data);
     }

     public function updateUser($data, $id) {
          return $this->performRequest('PUT', "api/books/{$id}", $data);
     }

     public function deleteUser($id) {
          return $this->performRequest('DELETE', "api/books/{$id}");
     }
}