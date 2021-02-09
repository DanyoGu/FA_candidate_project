<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class AddressController extends Controller
{
    public function parseAddressesAction(): JsonResponse
    {
        // Add address parsing here.
        //test commit
        return new JsonResponse(null, 204);
    }
}
