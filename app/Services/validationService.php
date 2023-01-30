<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\ListRoom;
use App\Models\List_Buy;

class validationService {

   public static function nameCheck($data)
   {
      $errors = array();

      $name = $data['list_name'];
      $user_id = Auth::id();

      $result = ListRoom::where("user_id","=",$user_id)->where("list_name", "=", $name)->first();
      if($result){
        $errors[] = array(
          'key' => 'list_name',
          'message' => 'リスト名が重複しています。'
        );
      }

      return $errors;
   }

   public static function nameCheckForBuy($data)
   {
    // dd($data); → 単純にフォームからの値が入力される
      $errors = array();

      $name = $data['list_name'];
      $user_id = Auth::id();

      $result = List_Buy::where("user_id","=",$user_id)->where("list_name", "=", $name)->first();
      if($result){
        $errors[] = array(
          'key' => 'list_name',
          'message' => 'リスト名が重複しています。'
        );
      }

      return $errors;
   }
}