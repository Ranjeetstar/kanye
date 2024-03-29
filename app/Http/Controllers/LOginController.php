<?php

namespace App\Http\Controllers;

use App\Models\User;
use Http;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Http as FacadesHttp;
use Illuminate\Support\Facades\Session as FacadesSession;
use Session;

class LOginController extends Controller
{
    public function login()
    {
        if (session()->has('loginId')) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }
    public function registration()
    {
        return view('auth.register');
    }
    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = FacadesHash::make($request->password);
        $res = $user->save();

        if ($res) {
            return redirect()->route('login')->with('success', 'you have registered successfully');
        } else {
            return back()->with('fail', 'someyhing went wrong');
        }
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            if (FacadesHash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('login')->with('fail', '  mail not register');
            }
        } else {
            return redirect()->route('login')->with('fail', '  mail not register');
        }
    }

    public function dashboard()
    {

        $responses = [];
        for ($i = 0; $i < 5; $i++) { // Change 5 to the desired number of responses
            $response = FacadesHttp::get('https://api.kanye.rest');
            // dd($response);
            $data = $response->json();
           $responses[] = $data['quote'];
        }
        // return $responses;
        // dd($responses);
                    return view('dashboard')->with(['datas' => $responses]);

        // foreach ($responses as $quote) {
        //     echo $quote . "\n";
        // }

        // Fetch data from the API
        // $response = FacadesHttp::get('https://api.kanye.rest/');

        // // Check if the request was successful
        // if ($response->successful()) {

        //     // Decode the JSON response
        //     $data = $response->json();

        //     // Pass the data to the Blade view
        //     return view('dashboard')->with(['datas' => $data]);
        // } else {
        //     // Handle the case where the request was not successful
        //     abort(500, 'Failed to fetch data from the API');
        // }
    }

    public function logout()
    {
        if (FacadesSession::has('loginId')) {
            FacadesSession::pull('loginId');
            return redirect()->route('login');
        }
    }
}
