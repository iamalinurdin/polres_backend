<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuspectRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules()
  {
    return [
      'report_number' => ['required'],
      'name'          => ['required'],
      'id_number'     => ['required', 'digits:16'],
      'address'       => ['required'],
      'guardian'      => ['required'],
      'description'   => ['required']
    ];
  }
}
