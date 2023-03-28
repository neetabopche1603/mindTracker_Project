<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ResponseCodeTrait;
use App\Traits\JwtTokenAuthenticate;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Str;

class AuthController extends Controller
{
    use ResponseCodeTrait, JwtTokenAuthenticate;

    /**
     * Create a new API AuthController instance.
     *@author Nita Bopche 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt:api', ['except' => ['login', 'register', 'forgotPassword', 'resetPassword', 'verifyOtp', 'loginWithGoogle']]);
    }
    /**
     * Register a Therapist and User.
     *@author Nita Bopche
     * @param  \Illuminate\Http\Request  $request
     */
    public function register(Request $request)
    {
        try {
            $validator = Validator::make(request()->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required| min:6| max:8 |confirmed',
                'password_confirmation' => 'required| min:6',
                'type' => 'required'
            ]);
            if ($validator->fails()) {
                return $this->getResponseCode(101,'',[], $validator->errors()->all());
            }
            // Check User
            $check = User::where(['email' => $request->email])->first();
            if (!$check) {
                $user = new User();
                $user->name = request()->name;
                $user->email = request()->email;
                $user->password = Hash::make(request()->password);
                $user->type = request()->type;
                $user->save();
                $data = [
                    'name' => $request->name,
                    'token' => JWTAuth::fromUser($user)
                ];
                return $this->getResponseCode(201, $data, 'Register Successfully Completed..');
            } else {
                return $this->getResponseCode(401,'',[],'User all ready exist..');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Login a Therapist and User.
     *@author Nita Bopche
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function login(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required',
            'password' => 'required',

        ]);
        if ($validator->fails()) {
            return $this->getResponseCode(101, $validator->errors()->all());
        }
        $token = null;
        try {

            if (!$token = JWTAuth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return $this->getResponseCode(401,'', [], 'Your are Credentials Wrong Please fill the right Credentials');
            } else {
                $user = auth()->user();
                $data = [
                    'access_token' => $token,
                    'token_type' => 'bearer',
                    'expires_in' => '60 minut',
                    'userData' => $user 
                ];
                return $this->getResponseCode(201, $token, $data, 'Login succssfully Done');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // public function getUser(Request $request)
    // {
    //     $user = auth()->user();
    //     return response()->json(['user' => $user]);
    // }

    /**
    
     * Forgot Password
     * Send a reset link to the given user email.
     *  
     *@author Nita Bopche
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function forgotPassword(Request $request)
    {
        try {
            $validator = Validator::make(request()->all(), [
                'email' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->getResponseCode(101,'',[], $validator->errors()->all());
            }
            $user = User::where('email', $request->email)->get();
            if (count($user) > 0) {

                $otp = rand(111111, 999999);
                $otpArr = array(
                    'otp' => $otp,
                );

                DB::table('password_resets')->updateOrInsert(['email' => $request->email], [
                    'email' => $request->email,
                    'otp' => $otp,
                    'created_at' => now()
                ]);

                Mail::send('emails.resetPasswordLink', $otpArr, function ($message) use ($request) {
                    $message->to($request->email)->subject('Reset Password Mail');
                    $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                });

                return $this->getResponseCode(201,'',$otpArr, 'Reset password email sent successfully');
            } else {
                return $this->getResponseCode(401,'',[], 'User not found');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /* Password OTP verify 
    * Send a reset password OTP the given user email.
    *@author Nita Bopche
    * @param  \Illuminate\Http\Request  $request
    * @return array
    */
    public function verifyOtp(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'email' => 'required',
                    'otp' => 'required',
                ]
            );

            if ($validator->failed()) {
                return $this->getResponseCode(101,'',[], $validator->errors()->all());
            }

            $email = $request->input('email');
            $otp = $request->input('otp');
            $resetRecord = DB::table('password_resets')->where(['email' => $email, 'otp' => $otp])->first();
            if (!$resetRecord) {
                return $this->getResponseCode(400,'',[], 'Invalid OTP');
            } else {
                // Delete the reset token record in password_reset table
                DB::table('password_resets')->where('email', $email)->delete();
                return $this->getResponseCode(201,'',[], 'OTP Verified.');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /* Reset Password
    * Send a reset OTP to the given user.
    *@author Nita Bopche
    * @param  \Illuminate\Http\Request  $request
    * @return array
    *@return json response
    */
    public function resetPassword(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required',
                'password' => 'required|min:6|max:8',
            ]
        );

        if ($validator->failed()) {
            return $this->getResponseCode(101,'',[], $validator->errors()->all());
        }
        try {

            $email = $request->input('email');
            $password = $request->input('password');

            $resetRecord = DB::table('password_resets')->where(['email' => $email])->first();
            if ($resetRecord) {
                return $this->getResponseCode(401,'',[], 'Please Verify OTP First.');
            } else {
                // update the user/therapist password
                DB::table('users')->where('email', $email)
                    ->update(['password' => Hash::make($password)]);

                return $this->getResponseCode(201, '',[], 'Password Successfully Reset.');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /*  Google CallBack login.
    *@author Nita Bopche
    * @param  \Illuminate\Http\Request  $request
    * @return array
    * @return json response
    */

    public function loginWithGoogle(Request $request)
    {
        $token = null;
        try {
            $finduser = User::where('google_id', $request->google_token)->first();
            if ($finduser) {
                // Auth::login($finduser);
                $token = JWTAuth::attempt(['email' => $finduser->email, 'password' => '12345678']);
                $userData = [
                    'id' => $finduser->id,
                    'google_id' => $request->google_token,
                    'name' => $finduser->name,
                    'email' => $finduser->email,
                ];

                return $this->getResponseCode(200, $token, $userData, "Login Successfull Done..");
            } else {
                $userName = explode('@', $request->email);
                $newUser = User::updateOrCreate(['email' => $request->email], [
                    'email' => $request->email,
                    'name' => ucfirst($userName[0]),
                    'google_id' => $request->google_token,
                    'password' => Hash::make('12345678'),
                    'type' => $request->type
                ]);

                $token = JWTAuth::attempt(['email' => $request->email, 'password' => '12345678']);

                $userDataArr = [
                    'id' => $newUser->id,
                    'name' => $newUser->name,
                    'email' => $newUser->email,
                    'type' => $newUser->type,
                ];
                return $this->getResponseCode(200, $token, $userDataArr, "Login Successfull Done..");
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
