<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\OnboardingQues;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use App\Traits\ResponseCodeTrait;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Str;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    use ResponseCodeTrait;

    /**
     * Create a new API AuthController instance.
     *@author Nita Bopche 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt:api');
    }

    /* User and Therapist profile update api
    *@author Nita Bopche
    * @param  \Illuminate\Http\Request  $request
    * @return array
    *@return json response
    */

    public function profileUpdate(Request $request)
    {
        try {
            $validator = Validator::make(request()->all(), [
                'profile_img' => 'image|mimes:jpg,png,jpeg,gif|max:2048'

            ]);
            if ($validator->fails()) {
                return $this->getResponseCode(101, '', [], $validator->errors()->all());
            }
            $updateProfile = User::find($request->user_id);
            $updateProfile->name = $request->name;
            $updateProfile->mobile_number = $request->mobile_number;
            $updateProfile->address = $request->address;
            $updateProfile->email = $request->email;
            // check password
            if ($request->password != '') {
                $updateProfile->password = Hash::make($request->password);
            }
            // check Image
            if ($updateProfile->image == NULL) {

                if ($reqprofileIMG = $request->file('profile_img')) {
                    $destinationPath = '/profilesImages/';
                    $profileIMG = date('YmdHis') . "." . $reqprofileIMG->getClientOriginalExtension();
                    $reqprofileIMG->move(public_path() . $destinationPath, $profileIMG);
                    $updateProfile->image = $profileIMG;
                    $updateProfile->update();
                }
                // dd('image nhi hai');
            } else {
                if ($reqprofileIMGs = $request->file('profile_img')) {
                    $destinationPath = '/profilesImages/';
                    // Old Image Delete Code Start
                    if ($updateProfile->image != NULL) {
                        if (file_exists('profilesImages/' . $updateProfile->image)) {
                            unlink('profilesImages/' . $updateProfile->image);
                        }
                    }
                    // Old Image Delete Code End
                    $profileIMG = date('YmdHis') . "." . $reqprofileIMGs->getClientOriginalExtension();
                    $reqprofileIMGs->move(public_path() . $destinationPath, $profileIMG);
                    $updateProfile->image = $profileIMG;
                }
                //  dd('image hai and unlink');
                $updateProfile->update();
            }

            $data = [
                'userData' => $updateProfile
            ];
            return $this->getResponseCode('201', '', $data, 'Profile update successfully done..');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
          /* 
           | Onboarding Question and Ans Get API
          *@author Nita Bopche
          * @param  \Illuminate\Http\Request  $request
          * @return array
         *@return json response
          */

          public function onboardingQuesOption(){
            try{
                $onboardingQuesOption = OnboardingQues::get();
                return $this->getResponseCode(201,'',$onboardingQuesOption,'Show all Onboarding Question and Option');

            }catch(Exception $e){
                dd($e->getMessage());
            }
          }

              /* 
           | Store the Onboarding question and ans Users table
          *@author Nita Bopche
          * @param  \Illuminate\Http\Request  $request
          * @return array
         *@return json response
          */
          public function onboardingQuesAnsStore(Request $request){
            try{
                $onboardingQuesAnsStore = User::find($request->user_id);
                $onboardingQuesAnsStore->onboarding_ques_ans = $request->onboarding_ques_ans;
                $onboardingQuesAnsStore->update();
                $data=['data'=>$onboardingQuesAnsStore->onboarding_ques_ans];
                
                return $this->getResponseCode(201,'',$data,'Onboarding Question and Option save');

            }catch(Exception $e){
                dd($e->getMessage());
            }
          }
}
