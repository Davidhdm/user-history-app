<?php

namespace App\Http\Controllers;

use App\Models\PromotionalCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromotionalCodeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $promotionalCodes = Auth::user()->promotional_codes;
    return view('promotional_codes', compact('promotionalCodes'));
  }

  public function createNewCode()
  {
    $loggedUser = Auth::user();
    $promotionalCode = new PromotionalCode();
    $newRandomCode = $promotionalCode->createRandomCode(15);
    
    PromotionalCode::create([
      'code' => $newRandomCode,
      'user_id' => $loggedUser->id
    ]);
    sleep(4);
    return redirect()->route('home');
  }

  public function claimCode(int $id)
  {
    $code = PromotionalCode::whereId($id);
    $code->update([
      'claimed' => true
    ]);
    sleep(4);
    return redirect()->route('promotional_codes');
  }
}
