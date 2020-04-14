<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\BaseRestTrait;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Class BaseApiController
 * @property User|Authenticatable|null $user
 */
class BaseApiController extends Controller
{
    use BaseRestTrait;

    /**
     * @var Authenticatable|null
     */
    protected $user;

    /**
     * BaseApiController constructor.
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = $this->getUser();
            return $next($request);
        });
    }

    /**
     * @return Authenticatable|null
     */
    private function getUser()
    {
        return auth('api')->user();
    }
}
