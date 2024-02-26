<?php

namespace App\Repositories\Classes;

use App\Models\Driver;
use App\Models\Language;
use App\Models\Profile;
use App\Models\User;
use App\Repositories\Interfaces\IUserRepo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserRepo implements IUserRepo
{
    /**
     * Update user avatar
     */
    function updateAvatar($request)
    {
        $user_id = Auth::user()->id;
        if ($request->hasfile('avatar')) {
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/avatar/', $filename);
            Profile::where('user_id', $user_id)->update(['avatar' => $filename]);
            return redirect()->back()->with('message', 'Profile Picture Successfully Updated!');
        }
    }

    /**
     * Update Profile
     */
    function updateProfile($request)
    {
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        $profile->update($request->except('cover_letter', 'cv', 'certificates', 'payslips', 'other_documents'));

        //upload cv 
        if ($request->hasFile('cv')) {
            if ($profile->cv) {
                //delete existing 
                $storage_path = public_path('uploads/cvs/');
                //construct full path for existing cv 
                $existing_file_path = $storage_path . $profile->cv;
                //check if file exists and delete if it does 
                if (file_exists($existing_file_path)) {
                    unlink($existing_file_path);
                }
            }

            //get cv file 
            $file = $request->cv;

            //get file extension 
            $ext = $file->getClientOriginalExtension();
            //get unique time code 
            $unique_identifier = $this->_uniqueTimeCode();
            //create file name 
            $file_name = "profile_cv" . $profile->id . "_" . $unique_identifier . "." . $ext;
            //atorage path
            $storage_path = public_path("uploads/cvs/");
            //save file 
            $file->move($storage_path, $file_name);
            $profile->cv = $file_name;
            $profile->update();
        }

        //upload cover letter  
        if ($request->hasFile('cover_letter')) {
            if ($profile->cover_letter) {
                //delete existing 
                $storage_path = public_path('uploads/cover_letters/');
                //construct full path for existing cover_letter 
                $existing_file_path = $storage_path . $profile->cover_letter;
                //check if file exists and delete if it does 
                if (file_exists($existing_file_path)) {
                    unlink($existing_file_path);
                }
            }

            //get cover_letter file 
            $file = $request->cover_letter;

            //get file extension 
            $ext = $file->getClientOriginalExtension();
            //get unique time code 
            $unique_identifier = $this->_uniqueTimeCode();
            //create file name 
            $file_name = "profile_cover_letter" . $profile->id . "_" . $unique_identifier . "." . $ext;
            //atorage path
            $storage_path = public_path("uploads/cover_letters/");
            //save file 
            $file->move($storage_path, $file_name);
            $profile->cover_letter = $file_name;
            $profile->update();
        }

        //upload cover letter  
        if ($request->hasFile('certificates')) {
            if ($profile->certificates) {
                //delete existing 
                $storage_path = public_path('uploads/certificates/');
                //construct full path for existing certificates 
                $existing_file_path = $storage_path . $profile->certificates;
                //check if file exists and delete if it does 
                if (file_exists($existing_file_path)) {
                    unlink($existing_file_path);
                }
            }

            //get certificates file 
            $file = $request->certificates;

            //get file extension 
            $ext = $file->getClientOriginalExtension();
            //get unique time code 
            $unique_identifier = $this->_uniqueTimeCode();
            //create file name 
            $file_name = "profile_certificates" . $profile->id . "_" . $unique_identifier . "." . $ext;
            //atorage path
            $storage_path = public_path("uploads/certificates/");
            //save file 
            $file->move($storage_path, $file_name);
            $profile->certificates = $file_name;
            $profile->update();
        }

        //upload cover letter  
        if ($request->hasFile('payslips')) {
            if ($profile->payslips) {
                //delete existing 
                $storage_path = public_path('uploads/payslips/');
                //construct full path for existing payslips 
                $existing_file_path = $storage_path . $profile->payslips;
                //check if file exists and delete if it does 
                if (file_exists($existing_file_path)) {
                    unlink($existing_file_path);
                }
            }

            //get payslips file 
            $file = $request->payslips;

            //get file extension 
            $ext = $file->getClientOriginalExtension();
            //get unique time code 
            $unique_identifier = $this->_uniqueTimeCode();
            //create file name 
            $file_name = "profile_payslips" . $profile->id . "_" . $unique_identifier . "." . $ext;
            //atorage path
            $storage_path = public_path("uploads/payslips/");
            //save file 
            $file->move($storage_path, $file_name);
            $profile->payslips = $file_name;
            $profile->update();
        }

        //upload cover letter  
        if ($request->hasFile('other_documents')) {
            if ($profile->other_documents) {
                //delete existing 
                $storage_path = public_path('uploads/other_documents/');
                //construct full path for existing other_documents 
                $existing_file_path = $storage_path . $profile->other_documents;
                //check if file exists and delete if it does 
                if (file_exists($existing_file_path)) {
                    unlink($existing_file_path);
                }
            }

            //get other_documents file 
            $file = $request->other_documents;

            //get file extension 
            $ext = $file->getClientOriginalExtension();
            //get unique time code 
            $unique_identifier = $this->_uniqueTimeCode();
            //create file name 
            $file_name = "profile_other_documents" . $profile->id . "_" . $unique_identifier . "." . $ext;
            //atorage path
            $storage_path = public_path("uploads/other_documents/");
            //save file 
            $file->move($storage_path, $file_name);
            $profile->other_documents = $file_name;
            $profile->update();
        }

        //upload 
        return redirect()->back()->with('message', 'Profile Successfully Updated!');
    }

    /**
     * Update cover letter 
     */
    function uploadCoverLetter($request)
    {
        $user_id = Auth::user()->id;
        $cover = $request->file('cover_letter')->store('public/files');
        Profile::where('user_id', $user_id)->update(['cover_letter' => $cover]);
        return redirect()->back()->with('message', 'Cover Letter Successfully Updated!');
    }

    /**
     * Update CV
     */
    function uploadCV($request)
    {
        $file = $request->file('cv');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;
        $file->move('storage/files', $filename);
        $user_id = auth()->user()->id;
        Profile::where('user_id', $user_id)->update(['cv' => $filename]);
        return redirect()->back()->with('message', 'CV Successfully Updated!');
    }

    /**
     * Update Certificates 
     */
    function uploadCertificates($request)
    {
        $user_id = auth()->user()->id;
        $certificates = $request->file('certificates')->store('public/files');
        Profile::where('user_id', $user_id)->update(['certificates' => $certificates]);
        return redirect()->back()->with('message', 'Certificates Successfully Updated!');
    }

    /**
     * upload payslip
     */
    function uploadPaySlip($request)
    {
        $user_id = auth()->user()->id;
        $payslips = $request->file('payslips')->store('public/files');
        Profile::where('user_id', $user_id)->update(['payslips' => $payslips]);

        return redirect()->back()->with('message', 'payslips Successfully Updated!');
    }

    /**
     * other documents 
     */
    function uploadOtherDocs($request)
    {
        $user_id = auth()->user()->id;
        $other_documents = $request->file('other_documents')->store('public/files');
        Profile::where('user_id', $user_id)->update(['other_documents' => $other_documents]);

        return redirect()->back()->with('message', 'Documents Successfully Updated!');
    }

    /**
     * Dribers 
     */
    function drivers()
    {
        return Driver::all();
    }

    /**
     * Languages 
     */
    function languages()
    {
        return Language::all();
    }

    /**
     * find
     */
    function find($id)
    {
        return User::find($id);
    }



    //PRIVATE FUNCTIONS 

    /**
     * generate unique code using time 
     */
    private function  _uniqueTimeCode()
    {
        return Carbon::now()->format('YmdHis');
    }
}
