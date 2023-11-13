<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\ParserHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function adminAuthenticate(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('adminDashboard')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors(
            [
                'email' => 'Your provided credentials do not match in our records.',
            ]
        )->onlyInput('email');
    }

    public function adminDashboard()
    {
        if (Auth::check()) {

            return view('admin.dashboard.index');
        }

        return redirect()->route('adminLogin')
            ->withErrors(
                [
                    'email' => 'Please login to access the dashboard.',
                ]
            )->onlyInput('email');
    }

    public function dishes(){
        $parse_history = ParserHistory::latest()->first();
        $dishes = Dish::latest()->paginate(10);
        return view('admin.dishes.index', compact('dishes', 'parse_history'));
    }

}
