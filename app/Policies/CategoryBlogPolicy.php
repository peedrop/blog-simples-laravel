<?php

namespace App\Policies;

use App\Models\CategoryBlog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryBlogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->type;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CategoryBlog  $categoryBlog
     * @return mixed
     */
    public function view(User $user, CategoryBlog $categoryBlog)
    {
        return $user->type;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->type;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CategoryBlog  $categoryBlog
     * @return mixed
     */
    public function update(User $user, CategoryBlog $categoryBlog)
    {
        return $user->type;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CategoryBlog  $categoryBlog
     * @return mixed
     */
    public function delete(User $user, CategoryBlog $categoryBlog)
    {
        return $user->type;
    }
}
