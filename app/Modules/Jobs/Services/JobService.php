<?php

namespace App\Modules\Jobs\Services;

use App\Http\Requests\CreateJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Jobs\SendNewJobCreatedNotification;
use App\Models\Job;
use Illuminate\Pagination\LengthAwarePaginator;

class JobService implements IJobService
{
    public function create(CreateJobRequest $jobRequest): Job
    {
        $job = new Job();
        $job->fill([
            "title" => $jobRequest->get("title"),
            "description" => $jobRequest->get("description"),
            "user_id" => $jobRequest->user()->id,
        ]);
        $job->save();
        SendNewJobCreatedNotification::dispatch($job)->onQueue("custom");
        return $job;
    }
    public function getPaginated($user_id = null): LengthAwarePaginator
    {
        $query = Job::query();
        if ($user_id) $query->where(compact("user_id"));
        return Job::query()->paginate();
    }
    public function update($id, UpdateJobRequest $jobRequest): Job
    {
        $job = Job::findOrFail($id);
        $job->fill([
            "title" => $jobRequest->get("title"),
            "description" => $jobRequest->get("description"),
        ]);
        $job->save();
        return $job;
    }
}
