<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\IssueCategory;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class IssueCategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:IssueCategory');
    }

    public function view(AuthUser $authUser, IssueCategory $issueCategory): bool
    {
        return $authUser->can('View:IssueCategory');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:IssueCategory');
    }

    public function update(AuthUser $authUser, IssueCategory $issueCategory): bool
    {
        return $authUser->can('Update:IssueCategory');
    }

    public function delete(AuthUser $authUser, IssueCategory $issueCategory): bool
    {
        return $authUser->can('Delete:IssueCategory');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:IssueCategory');
    }

    public function restore(AuthUser $authUser, IssueCategory $issueCategory): bool
    {
        return $authUser->can('Restore:IssueCategory');
    }

    public function forceDelete(AuthUser $authUser, IssueCategory $issueCategory): bool
    {
        return $authUser->can('ForceDelete:IssueCategory');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:IssueCategory');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:IssueCategory');
    }

    public function replicate(AuthUser $authUser, IssueCategory $issueCategory): bool
    {
        return $authUser->can('Replicate:IssueCategory');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:IssueCategory');
    }
}
