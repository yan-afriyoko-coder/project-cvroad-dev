<?php

use App\Models\Role;
use GuzzleHttp\Middleware;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Promise\TaskQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\DynamicDependent;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DealershipController;
use App\Http\Controllers\admin\RolesController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\DealerRegisterController;
use App\Http\Controllers\WorkExperienceController;
use App\Http\Controllers\admin\PermissionsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Email Verification

Auth::routes(['verify' => true]);
Auth::routes();



// Route::get('/home', [HomeController::class, 'index'])->name('home');
//==============================================ABOUT================================================================
Route::get('/privacy', [AboutController::class, 'privacy'])->name('privacy');
Route::get('/general-terms-conditions', [AboutController::class, 'conditions'])->name('terms');

// Route::get('/disclaimer', [AboutController::class, 'disclaimer'])->name('amount_disclaimer');
// Route::get('/test', [AboutController::class, 'home'])->name('about_home');

Route::group(['middleware' => ['auth']], function () {
    //dealer jobs     
    Route::get('/', [HomeController::class, 'home'])->name("jobs");
    //=============================================JOBS=================================================================   
    //Jobsshow 
    Route::get('/jobs', [JobController::class, 'index'])->name("jobs_all");
    //Create Jobs
    Route::get('/jobs/create', [JobController::class, 'create'])->name('job.create')->middleware('employer');

    Route::post('/jobs/create', [JobController::class, 'store'])->name('job.store')->middleware('employer');
    //Edit Jobs
    Route::get('/jobs/{id}/edit', [JobController::class, 'edit'])->name('jobs.edit')->middleware('employer');
    //Updating Jobs
    Route::post('/jobs/{id}/update', [JobController::class, 'update'])->name('jobs.update')->middleware('employer');
    //View my Jobs (Dealership)
    Route::get('/jobs/my-jobs', [JobController::class, 'myjob'])->name('my.job')->middleware('employer');
    //Jobs via categories:
    Route::get('/category/{id}', [CategoryController::class, 'index'])->name('category.index');
    //View Applicants
    Route::get('/jobs/applications/{id}', [JobController::class, 'applicants'])->name('applicants')->middleware('employer');
    //view all jobs
    Route::get('/jobs/alljobs', [JobController::class, 'allJobs'])->name('alljobs')->middleware('verified');
    //show job 
    Route::get('job/{id}', [JobController::class, 'show'])->name('jobs.show');
    //end job 
    Route::post('job/end/{id}', [JobController::class, 'end'])->name('jobs.end');
    //Route::get('/jobs/{id}/{job}', [JobController::class, 'show'])->name('jobs.show');

    //===============================================CANDIDATES=========================================================
    //view all candidates
    Route::get('/candidates', [CandidateController::class, 'index'])->name('candidate.all')->middleware('employer');
    //view Candidate profile
    Route::get('/candidates/{id}/{profile}', [CandidateController::class, 'show'])->name('candidate.show');
    //Candidate submission forms
    Route::post('user/coverletter', [UserController::class, 'coverletter'])->name('cover.letter');
    Route::post('user/cv', [UserController::class, 'cv'])->name('cv');
    Route::post('user/certificates', [UserController::class, 'certificates'])->name('certificates');
    Route::post('user/payslips', [UserController::class, 'payslips'])->name('payslips');
    Route::post('user/other_documents', [UserController::class, 'other_documents'])->name('other_documents');
    //avatar profile candidates
    Route::post('user/avatar', [UserController::class, 'avatar'])->name('avatar');







    //===============================================Dealership=================================================================
    //Total vacancies and synopses from the dealer after click from vacancies:
    Route::get('/dealership', [DealershipController::class, 'index'])->name('dealership.index');
    //dealership show 
    Route::get('/dealership/show', [DealershipController::class, 'show'])->name('dealership.show')->middleware('employer');
    //dealership update profile page:
    Route::get('/dealership/edit', [DealershipController::class, 'edit'])->name('dealership.edit')->middleware('employer');
    //how the dealership stores info
    Route::post('/dealership/create', [DealershipController::class, 'store'])->name('dealership.store')->middleware('employer');
    //Dealership cover photo storage- see bottom of create.blade
    Route::post('/dealership/coverphoto', [DealershipController::class, 'coverPhoto'])->name('cover.photo');
    //Dealership Profile photo
    Route::post('/dealership/logo', [DealershipController::class, 'dealerlogo'])->name('dealership.logo');
    //Dealership jobs 
    Route::get('/dealership/jobs/{dealer}', [DealershipController::class, 'dealerJobs'])->name('dealer_jobs');
    //view candidate 
    Route::get('/dealership/jobs/candidate/{candidate}', [DealershipController::class, 'findCandidate'])->name('dealer_job_candidate');

    //user profile
    Route::get('user/profile', [UserController::class, 'index'])->name('user.profile');
    Route::get('user/profile-edit', [UserController::class, 'edit'])->name('edit.profile');
    // Route::get('user/profile', [UserController::class, 'index'])->name('user.profile');
    Route::post('user/profile/create', [UserController::class, 'store'])->name('profile.create');
    Route::post('user/profile/update', [UserController::class, 'update'])->name('profile.update');
    //user dependant drop down
    // Route::get('/user/profile', [DynamicDependent::class, 'getCategories'])->middleware('seeker');
    Route::get('/user/profile/gettitles/{id}', [DynamicDependent::class, 'getTitles']);


    //experience 
    Route::post('user/experience', [WorkExperienceController::class, 'store'])->name('experience.create');
    Route::post('user/experience/delete/{experience}', [WorkExperienceController::class, 'delete'])->name('experience.delete');


    //dealer registration view
    //can be found under resources/views/auth



    //Applicants apply
    Route::post('/applications/{id}', [JobController::class, 'apply'])->name('apply')->middleware('seeker');

    //where the form gets sent information to:
    Route::post('dealer/register', [DealerRegisterController::class, 'dealerRegister'])->name('deal.register');

    //=============================================================ADMIN======================================================
    Route::prefix('admin')->name('admin.')->group(function () {

        //DEALERSHIPS
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('admin');
        Route::get('/dealership/{group}', [DashboardController::class, 'showDealer'])->name('dealership_show')->middleware('admin');
        Route::get('/dealership-active', [DashboardController::class, 'activeDealers'])->name('dealership_active')->middleware('admin');
        Route::get('/dealership-suspended', [DashboardController::class, 'suspendedDealers'])->name('dealership_suspended')->middleware('admin');
        Route::get('/dealership-pending', [DashboardController::class, 'pendingDealers'])->name('dealership_pending')->middleware('admin');
        Route::get('/dealership-approve/{dealer}', [DashboardController::class, 'approveDealer'])->name('dealership_approve')->middleware('admin');
        Route::get('/dealership-reject/{dealer}', [DashboardController::class, 'rejectDealer'])->name('dealership_reject')->middleware('admin');
        Route::get('/dealership-suspend/{dealer}', [DashboardController::class, 'suspendDealer'])->name('dealership_suspend')->middleware('admin');

        Route::get('/dealership-search-axios/{search}', [DashboardController::class, 'axiosSearchDealer'])->name('dealership_search_axios')->middleware('admin'); 


        //GROUPS
        Route::get('/group', [DashboardController::class, 'groups'])->name('groups')->middleware('admin');
        Route::post('/group-update/{group}', [DashboardController::class, 'updateGroup'])->name('groups_update')->middleware('admin');
        Route::post('/group', [DashboardController::class, 'createGroup'])->name('groups_create')->middleware('admin');        
        Route::get('/group/{group}', [DashboardController::class, 'showGroup'])->name('group_show')->middleware('admin');
        Route::get('/group-active', [DashboardController::class, 'activeGroups'])->name('group_active')->middleware('admin');
        Route::get('/group-suspended', [DashboardController::class, 'suspendedGroups'])->name('group_suspended')->middleware('admin');
        Route::get('/group-applications', [DashboardController::class, 'applicationGroups'])->name('group_applications')->middleware('admin');
        Route::get('/group-remove-dealer/{dealer}', [DashboardController::class, 'removeDealer'])->name('group_remove_dealer')->middleware('admin');
        Route::post('/group-add-dealer/{group}', [DashboardController::class, 'addDealer'])->name('group_add_dealer')->middleware('admin');

        Route::get('/group-find-axios/{group}', [DashboardController::class, 'axiosGetGroup'])->name('groups_get_axios')->middleware('admin');

        //CANDIDATES
        Route::get('/candidates', [DashboardController::class, 'candidates'])->name('candidates')->middleware('admin');
        Route::get('/candidate-active', [DashboardController::class, 'activeCandidates'])->name('candidate_active')->middleware('admin');
        Route::get('/candidate-suspended', [DashboardController::class, 'suspendedCandidates'])->name('candidate_suspended')->middleware('admin');
        Route::get('/candidate-pending', [DashboardController::class, 'pendingCandidates'])->name('candidate_pending')->middleware('admin');
        Route::get('/candidate-applications', [DashboardController::class, 'applicationCandidates'])->name('candidate_applications')->middleware('admin');
        Route::get('/candidate/{candidate}', [DashboardController::class, 'showCandidate'])->name('candidate_show')->middleware('admin');

        Route::get('/candidate-approve/{candidate}', [DashboardController::class, 'approveCandidate'])->name('candidate_approve')->middleware('admin');
        Route::get('/candidate-suspend/{candidate}', [DashboardController::class, 'suspendCandidate'])->name('candidate_suspend')->middleware('admin');
        Route::get('/candidate-reject/{candidate}', [DashboardController::class, 'rejectCandidate'])->name('candidate_reject')->middleware('admin');

        //USERS
        Route::resource('users', UsersController::class)->middleware('admin');
        

        //ROLES
        Route::resource('roles', RolesController::class)->middleware('admin');
        

        //PERMISSIONS
        Route::resource('permissions', PermissionsController::class)->middleware('admin');
        

    });

    Route::post('/dashboard/{id}/update', [DashboardController::class, 'update'])->name('post.update')->middleware('admin');
    Route::post('/dashboard/destroy', [DashboardController::class, 'destroy'])->name('post.delete')->middleware('admin');
    Route::get('/dashboard/{id}/toggle', [DashboardController::class, 'toggle'])->name('post.toggle')->middleware('admin');
    Route::get('/dashboard/{id}/toggle2', [DashboardController::class, 'toggle2'])->name('post.toggle2')->middleware('admin');
    //Trash or Restore
    Route::get('/dashboard/trash', [DashboardController::class, 'trash'])->middleware('admin');
    Route::get('/dashboard/{id}/trash', [DashboardController::class, 'restore'])->name('profile.restore')->middleware('admin');
    //Approve Decline candidate:
    Route::get('Dashboard', [DashboardController::class, 'getAllCandidates'])->middleware('admin');
});

    //Dealer registration form:
    Route::view('dealer/register', 'auth.dealer-register')->name('dealer.register');