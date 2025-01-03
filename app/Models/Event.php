<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Event extends Model
{
    use Sluggable;
    
    protected $with = ['category', 'members', 'speakers'];

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'event_members', 'event_id', 'member_id')
        ->withPivot('created_at', 'payment_status');
    }

    public function speakers()
    {
        return $this->belongsToMany(User::class, 'event_speakers', 'event_id', 'speaker_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when($filters['search'] ?? false,
        fn ($query, $search) =>
            $query->where('title', 'like', '%' . $search . '%')
        );

        $query->when(array_key_exists('status', $filters),
        fn($query) =>
            $query->where('status', $filters['status'])
        );
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getIsRegistrationOpenAttribute()
    {
        $now = Carbon::now();
        return $this->start_date > $now;
    }

    public function isUserPaid($userId)
    {
        return $this->payments()
            ->where('member_id', $userId)
            ->exists();
    }
}
