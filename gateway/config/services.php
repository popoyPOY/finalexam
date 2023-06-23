<?php

return [
     'site1' => [
          'base_uri' => env('SITE1_SERVICE_BASE_URL'),
          'secret' => env("USERS1_SERVICE_SECRET")
     ],

     'site2' => [
          'base_uri' => env('SITE2_SERVICE_BASE_URL'),
          'secret' => env("USERS2_SERVICE_SECRET")
          ]
];
