<?php

namespace App\Modules\Jobs\Services;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use Illuminate\Pagination\LengthAwarePaginator;

class JobService implements IJobService
{
    public function create(JobRequest $jobRequest): Job
    {
        $job = new Job();
        $job->fill([
            "title" => $jobRequest->get("title"),
            "description" => $jobRequest->get("description"),
            "user_id" => $jobRequest->user()->id,
        ]);
        $job->save();
        return $job;
    }
    public function getPaginated($user_id = null): LengthAwarePaginator
    {
        $query = Job::query();
        if ($user_id) $query->where(compact("user_id"));
        return Job::query()->paginate();
    }
}
