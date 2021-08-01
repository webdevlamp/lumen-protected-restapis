<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Users;

class UsersController extends Controller {
  public function __construct() {
    //  $this->middleware('auth:api');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function authenticate(Request $request) {
    $this->validate($request, [
      'email' => 'required',
      'password' => 'required'
    ]);
    $user = Users::where('email', $request->input('email'))->first();
    if($request->input('password') === $user->password) {
      $apikey = base64_encode($this->v4());
      Users::where('email', $request->input('email'))->update(['api_key' => "$apikey"]);;
      return response()->json(['status' => 'success', 'api_key' => $apikey]);
    } else {
      return response()->json(['status' => 'fail'], 401);
    }
  }


  /**
   * 
   * Generate v4 UUID
   * 
   * Version 4 UUIDs are pseudo-random.
   */
  public static function v4() {
    return sprintf(
      '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
      // 32 bits for "time_low"
      mt_rand(0, 0xffff),
      mt_rand(0, 0xffff),
      // 16 bits for "time_mid"
      mt_rand(0, 0xffff),
      // 16 bits for "time_hi_and_version",
      // four most significant bits holds version number 4
      mt_rand(0, 0x0fff) | 0x4000,
      // 16 bits, 8 bits for "clk_seq_hi_res",
      // 8 bits for "clk_seq_low",
      // two most significant bits holds zero and one for variant DCE1.1
      mt_rand(0, 0x3fff) | 0x8000,
      // 48 bits for "node"
      mt_rand(0, 0xffff),
      mt_rand(0, 0xffff),
      mt_rand(0, 0xffff)
    );
  }
}
