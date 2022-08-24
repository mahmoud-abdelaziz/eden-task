<?php

namespace App\Policies;

use App\Models\Job;
use App\Modules\Users\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Modules\Users\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return  true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Modules\Users\Models\User  $user
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Job $job)
    {
        return $user->isManager() || $job->user_id == $user->id;
    }
}
