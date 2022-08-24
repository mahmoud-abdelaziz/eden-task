<?php
namespace App\Modules\Jobs\Services;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface IJobService
{
    public function create(JobRequest $jobRequest): Job;
    public function getPaginated($user_id = null): LengthAwarePaginator;
}
