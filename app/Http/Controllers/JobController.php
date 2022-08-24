<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Http\Resources\JobCollection;
use App\Http\Resources\JobResource;
use App\Models\Job;
use App\Modules\Jobs\Services\IJobService;
use Illuminate\Auth\Access\AuthorizationException;

class JobController extends Controller
{
    public function __construct(private readonly IJobService $jobService)
    {
        //
    }

    public function index(): JobCollection
    {
        $user = request()->user();
        return new JobCollection($this->jobService->getPaginated(!$user->isManager() ? $user->id : null));
    }

    public function store(CreateJobRequest $request): JobResource
    {
        return new JobResource($this->jobService->create($request));
    }

    /**
     * @throws AuthorizationException
     */
    public function update(Job $job, UpdateJobRequest $request): JobResource
    {
        $this->authorize('update', $job);
        return new JobResource($this->jobService->update($job->id, $request));
    }
}
