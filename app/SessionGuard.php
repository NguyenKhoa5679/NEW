<?php

namespace App;

use App\Models\User;

class SessionGuard
{
   protected static $user;

   public static function login(User $user, array $credentials)
   {
      $verified = password_verify($credentials['password'], $user->password);
      if ($verified) {
         $_SESSION['user_id'] = $user->user_id;
         $_SESSION['role'] = $user->role;
         $_SESSION['fullname'] = $user->fullname;
      }
      return $verified;
   }

   public static function user()
   {
      if (!static::$user && static::isUserLoggedIn()) {
         static::$user = User::find($_SESSION['user_id']);
      }
      return static::$user;
   }

   public static function isAuthor(){
      if(isset($_SESSION['role'])){
          if($_SESSION['role'] === 3)
              return true;
      }
  }

  public static function isAdmin(){
      if(isset($_SESSION['role']))
          if($_SESSION['role'] === 1)
              return true;
  
  }

  public static function isReader(){
      if(isset($_SESSION['role']))
          if($_SESSION['role'] === 2)
              return true;
  }

   public static function logout()
   {
      static::$user = null;
      session_unset();
      session_destroy();
   }

   public static function isUserLoggedIn()
   {
      return isset($_SESSION['user_id']);
   }
   public static function UserID(){
       return $_SESSION['user_id'];
   }

   public static function isUser($idUser){
       return $_SESSION['user_id'] == $idUser;
   }
}
