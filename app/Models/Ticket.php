<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasUlids;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'created_by',
        'assigned_to',
        'issue_category_id',
        'priority_id',
        'status_id',
        'title',
        'description',
    ];

    public function isOpen(): bool
    {
        return $this->status?->name === 'Open';
    }

    public function isInProgress(): bool
    {
        return $this->status?->name === 'In Progress';
    }

    public function isResolved(): bool
    {
        return $this->status?->name === 'Resolved';
    }

    public function isClosed(): bool
    {
        return $this->status?->name === 'Closed';
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function issueCategory(): BelongsTo
    {
        return $this->belongsTo(IssueCategory::class);
    }

    public function priority(): BelongsTo
    {
        return $this->belongsTo(Priority::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
