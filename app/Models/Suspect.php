<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Suspect extends Model
{
  use HasFactory;

  protected $guarded = [];

  /**
   * Undocumented function
   *
   * @param [type] $query
   * @param [type] $report
   * @return void
   */
  public function scopeReport($query, $report)
  {
    return $query->where('report_number', $report);
  }

  /**
   * Get the user that owns the Suspect
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }
}
