<?php
namespace App\Modules\Jobs\Services;

use App\Http\Requests\CreateJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface IJobService
{
    public function create(CreateJobRequest $jobRequest): Job;
    public function getPaginated($user_id = null): LengthAwarePaginator;
    public function update($id, UpdateJobRequest $jobRequest): Job;
}
