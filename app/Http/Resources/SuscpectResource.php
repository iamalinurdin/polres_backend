<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SuscpectResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray($request)
  {
    return [
      'report_number' => $this->report_number,
      'id_number'     => $this->id_number,
      'name'          => $this->name,
      'guardian'      => $this->guardian,
      'added_by'      => $this->user->name
    ];
  }
}
