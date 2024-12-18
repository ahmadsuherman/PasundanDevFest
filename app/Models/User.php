<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

     /**
      * The attributes that should be hidden for serialization.
      *
      * @var array<int, string>
      */
     protected $hidden = [
         'password',
         'remember_token',
     ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'links' => 'array',
        ];
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when($filters['search'] ?? false,
        fn ($query, $search) =>
            $query->where('fullname', 'like', '%' . $search . '%')
        );
    }

    public function event_members()
    {
        return $this->belongsToMany(Event::class, 'event_members', 'member_id', 'event_id')
        ->withPivot('created_at', 'payment_status');
    }

    public function event_spekaers()
    {
        return $this->belongsToMany(Event::class, 'event_speakers', 'member_id', 'event_id');
    }

    public function hasRole($role)
    {
        return $this->roles === $role;
    }
}
