<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use App\SessionGuard as Guard;
use Illuminate\Database\Capsule\Manager;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function admin(){
        $this->sendPage('admin/admin',[]);
    }

    public function profile(){
        $this->sendPage('admin/profile',[]);
    }

    public function myStory(){
        $this->sendPage('admin/myStory',[]);
    }

    public function myFavorite(){
        $this->sendPage('admin/myFavorite',[]);
    }
}

?>