<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\status;
    use App\user;
    use Illuminate\Support\Facades\Auth;

//use Illuminate\Http\UploadedFile;
    class HomeController extends Controller
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

        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        public function index()
        {

            return view('home');
        }

        public function shouthome()
        {
            $user_id = Auth::id();
            $avatar = empty(Auth::user()->avatar) ? asset('images/avatar.jpg') : Auth::user()->avatar;
            $status = status::where('user_id', $user_id)->orderBy('id', 'desc')->get();
            return view('home', ['status' => $status, 'avatar' => $avatar]);
        }

        public function showprofile()
        {
            return view('profile');
        }

        public function savestatus(request $request)
        {
            $request->validate(
                [
                    'status' => 'required',

                ]);


            $savestatus = new status();
            $savestatus->user_id = AUTH::id();
            $savestatus->status = $request->post('status');
            $savestatus->save();
            return redirect()->route('shouthome')->withSuccess('Status has been updated');;
        }

        public function saveprofile(request $request)
        {
            $request->validate([
                'nickname' => 'required'
            ]);
            $saveprofile = Auth::user();
            if ($request->hasAny('name', 'email', 'nickname')) {

                $saveprofile->name = $request->post('name');
                $saveprofile->email = $request->post('email');
                $saveprofile->nickname = $request->post('nickname');
                if ($request->hasFile('image')) {
                    $profileimage = 'user' . $saveprofile->id . '.' . $request->image->extension();
                    $request->image->move(public_path('images'), $profileimage);
                    $saveprofile->avatar = asset("images/{$profileimage}");
                }
                $saveprofile->save();
            }
            return redirect()->route('profile')->withSuccess('Profile Has been updated Successfully');
        }

    }
