<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Traits\ResponseFormatTrait;

class CheckScope
{
    use ResponseFormatTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,...$scopes)
    {
          foreach ($scopes as $scope) {
            if ($request->user()->tokenCan($scope)) {
                return $next($request);
            }
        }

        return $this->sendError('Unauthorized to do this action', '', $code=403,'');
      
    }
}
