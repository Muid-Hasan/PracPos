<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\user;
use App\Mail\otpMail;
use App\Helper\JWTTOKEN;
use ErrorException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Psy\Readline\Hoa\Console;

class userController extends Controller
{
    public function UserRegistation(Request $request)
    {
        try {
            user::create([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'mobile' => $request->input('mobile'),
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ]);
            return response()->json([
                'Status' => 'Success',
                'Message' => 'Registration Successful'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Registration Failed'
            ], 401);
        }
    }

    public function UserLogin(Request $request)
    {
        $count = user::where('email', '=', $request->input('email'))
                                                   ->where('password', '=', $request->input('password'))
                                                   ->select('id')->first();
        if ($count !== null) {
            $token = JWTTOKEN::CreateTokenForLogin($request->input('email'),$count->id);
            return response()->json([
                'Status' => 'Success',
                'Message' => 'Login Successfully',
                
            ],200)->cookie('Token',$token,60*60*24*30);
        } else {
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Login Unsuccessfull'
            ],401);
        }
    }
    public function SendOtp(Request $request)
    {
        $email = $request->input('email');
        $otp = rand(1000, 9999);

        $count = user::where('email', '=', $email)->count();
        if ($count === 1) {
            Mail::to($email)->send(new otpMail($otp));
            user::where('email', '=', $email)->update(['otp' => $otp]);
            $request->headers->set('email', $email);

            return response()->json([
                'Status' => 'Success',
                'Message' => 'Four Digit Otp has been send to your Email address',
                'email' => $email
            ], 200);
        } else {

            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Something Wrong during Sending Otp'
            ], 401);
        }
    }
    public function VerifyOtp(Request $request)
    {
        $email = $request->input('email');
        $Otp = $request->input('otp');
        $count = user::where('otp', '=', $Otp)->where('email', '=', $email)->count();
        if ($count === 1) {
            $token = JWTTOKEN::CreateTokenForResetPass($email);

            user::where('otp', '=', $Otp)->update(['otp' => '0']);

            return response()->json([
                'Status' => 'Success',
                'Message' => 'OTP varified Successfully',
                
            ],200)->cookie('Token',$token,60*60);;
        } else {
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Verification Unsuccesfull'
            ],401);
        }
    }
    public function ResetPassword(Request $request)
    {
          try {
            $email = $request->header('email');
            $newPassword = $request->input('password');
            user::where('email','=',$email)->update(['password'=>$newPassword]);

             return response()->json([
                'Status' => 'Success',
                'Message' => 'Password Updated successfully',
                
             ],200)->cookie('Token','',-1);
           } 
           catch (ErrorException $e) {
          
            return response()->json([
                'Status' => 'Failed',
                'Message' => $e->getMessage()
            ],401);
            }
       }



    public function DashBoardSummery(Request $request)
    {
    }

    function Userprofile(Request $request){
     $email= $request->header('email');
     try{
        $user=user::where('email','=',$email)->first();
        return response()->json([
           'Status'=>'Success',
           'Message'=>'Request Successfull',
           'data'=>$user
        ],200);
     }
     catch(Exception $e){
          return response()->json([
            'Status'=>'Failed',
            'Message'=>'Reauest Unsuccessfull',
            
          ]);
     }
    
    }

    function UpdateUserProfile(Request $request){
        try{
            $email=$request->header('email');
            $firstName=$request->input('firstName');
            $lastName=$request->input('lastName');
            $mobile=$request->input('mobile');
            $password=$request->input('password');

            user::where('email','=',$email)->update([
                'firstName'=>$firstName,
                'lastName'=>$lastName,
                'mobile'=>$mobile,
                'password'=>$password
            ]);
            return response()->json([
                'Status'=>'Success',
                'Message'=>'Request Successfull'
            ]);
        }
        catch(Exception $e){
            return response()->json([
                'Status'=>'Failed',
                'Message'=>'Request Unsuccessfull'
            ]);
        }
    }
    public function Logout(){
        return redirect('/Login')->cookie('Token','',-1);
    }




    function LoginPage(){
        return view('pages.auth.Login-Page');
       }
        function UserRegistrationPage(){
           return view('pages.auth.Registration-Page');
        }
        function SendOtpPage(){
           return view('pages.auth.SendOtp-page');
        }
        function VerifyOtpPage(){
           return view('pages.auth.VerifyOtp-Page');
        }
        function ResetPasswordPage(){
           return view('pages.auth.ResetPassword-Page');
        }
        function DashBoardPage(){
           return view('pages.dashboard.dashboard-Page');
        }


       
        function UpdateUserProfilePage(){
            return view('pages.dashboard.UpdateUserProfile-Page');
        }
        function UserprofilePage(){
            return view('pages.dashboard.UserProfile-Page');
        }
          
           
           
           
}
