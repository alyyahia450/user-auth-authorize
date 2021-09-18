<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Permission;
use App\Http\Resources\PermissionResource;
use Symfony\Component\HttpFoundation\Response;

use App\Traits\ResponseFormatTrait;

class PermissionController extends Controller
{
    use ResponseFormatTrait;

    public function index(){
        
        return $this->sendResponse(PermissionResource::collection(Permission::all()), 'Permissions');
    }
}