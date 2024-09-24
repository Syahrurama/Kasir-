<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to login if user is not authenticated
        }

        $user = Auth::user();
        // $bookCount = Book::count();


        // if ($user->role_id == 'admin') {
        //     return response()->json(['user_count' => $userCount]); // Return user count as JSON response
        // }

        return view('Page_Super_Admin.page_dashboard', [
            // 'book_count' => $bookCount,
            // 'category_count' => $categoryCount,
            // 'user_count' => $userCount
        ]);
    }

    public function IndexAdmin(){
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to login if user is not authenticated
        }

        $user = Auth::user();
        // $bookCount = Book::count();


        // if ($user->role_id == 'admin') {
        //     return response()->json(['user_count' => $userCount]); // Return user count as JSON response
        // }

        return view('Page_Admin.page_dashboard', [
            // 'book_count' => $bookCount,
            // 'category_count' => $categoryCount,
            // 'user_count' => $userCount
        ]);
    }


}
