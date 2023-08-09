<?php



namespace App\Http\Controllers;
use Illuminate\View\View;
use App\Models\Post;
use Illuminate\Http\Request;



class DashboardController extends Controller
{

    public function index():view
    {
        $posts = auth()->user()->posts;
        return view('dashboard', compact('posts'));
    }

}
