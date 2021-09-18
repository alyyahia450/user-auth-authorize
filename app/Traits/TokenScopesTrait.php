<?php

namespace App\Traits;
use App\Models\User;
// use App\Models\Permission;
use Illuminate\Support\Arr;
trait TokenScopesTrait
{
    private function createTokenWithScopes($user){
        $scopes=[];
        foreach($user->roles as $role){
      
            array_push($scopes,$role->permissions()->pluck('title')->toArray());
        }
        return $user->createToken('', array_unique(Arr::collapse($scopes)))->accessToken;
    }


}
