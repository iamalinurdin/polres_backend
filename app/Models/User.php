<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'email',
    'password',
    'nrp'
  ];

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
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  /**
   * Undocumented function
   *
   * @param [type] $query
   * @param string $nrp
   * @return void
   */
  public function scopeNrp($query, string $nrp)
  {
    return $query->where('nrp', $nrp);
  }

  /**
   * Get all of the searchs for the User
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function searchs(): HasMany
  {
    return $this->hasMany(SearchHistory::class);
  }
}
