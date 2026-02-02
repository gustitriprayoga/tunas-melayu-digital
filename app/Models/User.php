<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

// logs
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

// Profile Avatar
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements HasAvatar
{

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, LogsActivity;


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll() // Mencatat semua perubahan atribut
            ->logOnlyDirty() // Hanya catat yang berubah saja
            ->dontSubmitEmptyLogs(); // Jangan catat jika tidak ada yang berubah
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_url',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
        ];
    }

    public function getFilamentAvatarUrl(): ?string
    {
        $avatarColumn = config('filament-edit-profile.avatar_column', 'avatar_url');
        return $this->$avatarColumn ? Storage::url($this->$avatarColumn) : null;
    }
}
