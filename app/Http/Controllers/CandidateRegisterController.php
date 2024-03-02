<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Title;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Middleware\Seeker;
use Illuminate\Support\Facades\Hash;

class CandidateRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createStepOne(Request $request)
    {
        $user = $request->session()->get('user');
  
        return view('auth.register', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function postCreateStepOne(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'identification_number' => ['required', 'string'],
        ], 
        [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Invalid email format.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
            'identification_number.required' => 'ID Number is required.',
        ]);
        
        $request->session()->put('user', $validatedData);
    
        return redirect()->route('candidates.create.step.two');
    }

    /**
     * Show the step Two Form for creating a new resource.
     */
    public function createStepTwo(Request $request)
    {
        $user = $request->session()->get('user');
  
        return view('auth.stepone', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function postCreateStepTwo(Request $request)
    {
        $validatedData = $request->validate([
            'user_type' => ['required', 'string'],
            'name2' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'race' => ['required', 'string', 'max:255'],
            'id_number' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'driver_liscence' => ['required', 'string', 'max:255'],
            'provinces' => ['required', 'string', 'max:255'],
            'first_languages' => ['required', 'string', 'max:255'],
            'second_languages' => ['required', 'string', 'max:255'],
        ]);

        $previousUserData = $request->session()->get('user');
        $mergedData = array_merge($previousUserData, $validatedData);
        $request->session()->put('user', $mergedData);
        
        return redirect()->route('candidates.create.step.three');
    }

    /**
     * Show the step Three Form for creating a new resource.
     */
    public function createStepThree(Request $request)
    {
        $user = $request->session()->get('user');
  
        return view('auth.steptwo', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function postCreateStepThree(Request $request)
    {
        
        $validatedData = $request->validate([
            'category_id' => ['required', 'int'],
            'brand_id' => ['required', 'int'],
            'title' => ['required', 'string'],
            'group_id' => ['required', 'string'],
            'notice_period' => ['required', 'string'],
            'employment_status' => ['required', 'string'],
            'current_salary' => ['required', 'string'],
            'dealer_experience' => ['required', 'string'],
        ]);
        
        $previousUserData = $request->session()->get('user');
        $mergedData = array_merge($previousUserData, $validatedData);
        $request->session()->put('user', $mergedData);

        return redirect()->route('candidates.create.step.four');
    }

    public function createStepFour(Request $request)
    {
        $user = $request->session()->get('user');
  
        return view('auth.steptrhee', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function postCreateStepFour(Request $request)
    {
        $validatedData = $request->validate([
            'cv' => ['required'],
            'certificates' => ['required','max:2048'],
            'payslips' => ['required', 'max:2048'],
            'other_documents' => ['required', 'max:2048'],
        ], 
        [
            'cv.required' => 'CV is required.',
            'cv.file' => 'CV must be a file.',
            'cv.max' => 'CV size cannot exceed 2MB.',
            'cv.mimes' => 'CV must be a PDF, Word, PowerPoint, or Excel file.',
            'certificates.required' => 'Certificates are required.',
            'certificates.image' => 'Certificates must be an image file.',
            'certificates.max' => 'Certificates size cannot exceed 2MB.',
            'payslips.required' => 'Payslips are required.',
            'payslips.image' => 'Payslips must be an image file.',
            'payslips.max' => 'Payslips size cannot exceed 2MB.',
            'other_documents.required' => 'Other documents are required.',
            'other_documents.image' => 'Other documents must be an image file.',
            'other_documents.max' => 'Other documents size cannot exceed 2MB.',
        ]);

        // Get user data from session
        $user = $request->session()->get('user');

        // Craete new user
        $newUser = new User();
        $newUser->name = $user['name'];
        $newUser->email = $user['email'];
        $newUser->password = Hash::make($user['password']);
        $newUser->user_type = "seeker";
        $newUser->save();

        // Store files
        $cvPath = $request->file('cv')->storeAs('public/cv', 'cv_' . $newUser->id . '.' . $request->file('cv')->extension());
        $certificatesPath = $request->file('certificates')->storeAs('public/certificates', 'certificates_' . $newUser->id . '.' . $request->file('certificates')->extension());
        $payslipsPath = $request->file('payslips')->storeAs('public/payslips', 'payslips_' . $newUser->id . '.' . $request->file('payslips')->extension());
        $otherDocumentsPath = $request->file('other_documents')->storeAs('public/other_documents', 'other_documents_' . $newUser->id . '.' . $request->file('other_documents')->extension());
        
        // Get user data from session
        $userData = $request->session()->get('user');

        // Get title id
        $titleModel = Title::where('title', $userData['title'])->first();
        $titleId = $titleModel->id;

        // Create new profile
        $profile = new Profile();
        $profile->user_id = $newUser->id;
        $profile->cv = basename($cvPath);
        $profile->certificates = basename($certificatesPath);
        $profile->payslips = basename($payslipsPath);
        $profile->other_documents = basename($otherDocumentsPath);
        $profile->category_id = $userData['category_id'];
        $profile->title = $userData['title'];
        $profile->title_id = $titleId; 
        $profile->brand_id = $userData['brand_id'];
        $profile->notice_period = $userData['notice_period'];
        $profile->employment_status = $userData['employment_status'];
        $profile->address = $userData['address'];
        $profile->surname = $userData['surname'];
        $profile->identification_number = $userData['identification_number'];
        $profile->race = $userData['race'];
        $profile->gender = $userData['gender'];
        $profile->group_id = $userData['group_id'];
        $profile->province = $userData['provinces'];    
        $profile->first_language = $userData['first_languages'];
        $profile->second_language = $userData['second_languages'];
        $profile->name = $userData['name2'];
        $profile->driver_liscence = $userData['driver_liscence'];
        $profile->dealer_experience = $userData['dealer_experience'];
        $profile->save();

        // Clearsession
        $request->session()->forget('user');

        // Redirect to login page
        return redirect()->route('login')->with('success', 'Registration successful! Please login to continue.');
    }
}
