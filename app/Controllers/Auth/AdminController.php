<?php

namespace App\Controllers\Auth;

use App\Models\Comment;
use App\Models\RequireAuthor;
use App\Models\Favorite;
use App\Models\Report;
use App\Models\User;
use App\Controllers\Controller;
use App\SessionGuard;
use App\SessionGuard as Guard;
use Illuminate\Database\Capsule\Manager;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Theloai;


use function PHPSTORM_META\type;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function admin()
    {
        $this->sendPage('admin/admin', []);
    }

    public function adminUsers()
    {
        $this->sendPage('admin/ad_Users', []);
    }

    public function adminBooks()
    {
        $this->sendPage('admin/ad_Books', []);
    }

    public function adminCategories()
    {
        $this->sendPage('admin/ad_Categories', []);
    }

    public function adminAuthors()
    {
        $this->sendPage('admin/ad_Authors', []);
    }

    public function adminNotification()
    {
        $this->sendPage('admin/ad_Notification', []);
    }
}
