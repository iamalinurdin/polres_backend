<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuspectRequest;
use App\Http\Resources\SuscpectResource;
use App\Models\Suspect;
use Illuminate\Http\Request;

class SuspectController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $suspects = Suspect::paginate(10);

    return SuscpectResource::collection($suspects);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(SuspectRequest $request)
  {
    $suspect = Suspect::create([
      'report_number' => $request->input('report_number'),
      'id_number'     => $request->input('id_number'),
      'name'          => $request->input('name'),
      'description'   => $request->input('description'),
      'guardian'      => $request->input('guardian'),
      'address'       => $request->input('address'),
    ]);

    return response()->json([
      'status' => 'success',
      'message' => 'tersangka baru berhasil ditambahkan',
      'data' => new SuscpectResource($suspect),
    ], 200);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $suspect = Suspect::report($id)->first();

    return response()->json([
      'status' => 'success',
      'data'   => new SuscpectResource($suspect),
    ], 200);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(SuspectRequest $request, $id)
  {
    $suspect = Suspect::report($id)->first();

    $suspect->update([
      'report_number' => $request->input('report_number'),
      'id_number'     => $request->input('id_number'),
      'name'          => $request->input('name'),
      'description'   => $request->input('description'),
      'guardian'      => $request->input('guardian'),
      'address'       => $request->input('address'),
    ]);

    return response()->json([
      'status' => 'success',
      'message' => 'tersangka baru berhasil diubah',
      'data' => new SuscpectResource($suspect),
    ], 200);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
