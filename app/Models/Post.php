<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Post class
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $department
 * @property enum(active,inactive) $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
        'department',
        'status'
    ];
}
