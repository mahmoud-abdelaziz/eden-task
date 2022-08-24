<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Http\Resources\JobCollection;
use App\Http\Resources\JobResource;
use App\Modules\Jobs\Services\IJobService;

class JobController extends Controller
{
    public function __construct(private readonly IJobService $jobService)
    {
        //
    }
    public function index(): JobCollection
    {
        $user = request()->user();
        return new JobCollection($this->jobService->getPaginated(!$user->isManager() ? $user->id : null ));
    }
    public function store(JobRequest $request): JobResource
    {
        return new JobResource($this->jobService->create($request));
    }
}
