<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GradeReview extends Model
{
    protected $fillable = ['submission_id', 'reason', 'status'];

    public function submission(): BelongsTo
    {
        return $this->belongsTo(Submission::class);
    }
}
