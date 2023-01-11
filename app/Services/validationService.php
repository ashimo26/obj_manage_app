<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\ListRoom;

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
}