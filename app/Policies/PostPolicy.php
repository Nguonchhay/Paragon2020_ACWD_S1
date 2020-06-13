<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param User  $user
     * @param Post  $post
     * @return mixed
     */
    public function editPost(User $user, Post $post)
    {
        return $user->role === 'admin' || $user->id === $post->creator_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User  $user
     * @param Post  $post
     * @return mixed
     */
    public function updatePost(User $user, Post $post)
    {
        return $user->role === 'admin' || $user->id === $post->creator_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User  $user
     * @param Post  $post
     * @return mixed
     */
    public function deletePost(User $user, Post $post)
    {
        return $user->role === 'admin' || $user->id === $post->creator_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User  $user
     * @param  Post  $post
     * @return mixed
     */
    public function restorePost(User $user, Post $post)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User  $user
     * @param Post  $post
     * @return mixed
     */
    public function forceDeletePost(User $user, Post $post)
    {
        return $user->role === 'admin';
    }
}
