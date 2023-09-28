<?php

namespace App\Http\Controllers\filter;

use App\Http\Controllers\Controller;
use App\Http\Requests\filters\UserFilterRequest;
use App\Services\user\UserService;
use Illuminate\Pagination\LengthAwarePaginator;

class UserFilterController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function filterUser(UserFilterRequest $user): LengthAwarePaginator
    {
        return $this->userService->filterUser($user);
    }
}
