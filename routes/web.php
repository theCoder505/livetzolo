<?php

use App\Http\Controllers\AddsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AllCoinController;
use App\Http\Controllers\ExcellUpController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PromoteUsersController;
use App\Http\Controllers\InluencerController;
use App\Http\Controllers\OtherManagementsController;
use App\Http\Controllers\SmallStufsController;
use App\Http\Controllers\UpdateController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'showInHome'])->middleware('adminlogincheck');

Route::get('/up-requests', [UpdateController::class, 'getAllUpdates'])->middleware('adminlogincheck');

Route::get('/update-page-particular-coin-data-{coinSno}', [UpdateController::class, 'getParticularCoinData'])->middleware('adminlogincheck');

Route::get("/cancel-request-{cancelId}", [UpdateController::class, 'cancelRequestMethod'])->middleware('adminlogincheck');





Route::get('/all-coins', [AllCoinController::class, 'getAllCoin'])->middleware('adminlogincheck');

Route::get('/all-coins-data', [AllCoinController::class, 'getCoinAjaxData'])->middleware('adminlogincheck');

Route::get('/particular-coin-data-{coinId}', [AllCoinController::class, 'particularCoinData'])->middleware('adminlogincheck');

Route::get('/delete-coin-{deletingId}', [AllCoinController::class, 'deleteCoin'])->middleware('adminlogincheck');


Route::get('/upload-coins', [ExcellUpController::class, 'excellUploads'])->middleware('adminlogincheck');

Route::get('/all-users', [SmallStufsController::class, 'allusers'])->middleware('adminlogincheck');

Route::get('/promote-coins', [PromoteUsersController::class, 'promoteredirect'])->middleware('adminlogincheck');

Route::get('/influencers-control', [InluencerController::class, 'influencers'])->middleware('adminlogincheck');

Route::get('/delete-user-{deleteId}', [InluencerController::class, 'deletingMethod'])->middleware('adminlogincheck');






// these can be done without login as it needs. 
Route::get('/admin-login', [AdminController::class, 'loginController']);

Route::get('/forget-password', [AdminController::class, 'forgetPassController']);

Route::get('/change-pass', [AdminController::class, 'pwdchangerdirect']);





Route::get('/logout', [AdminController::class, 'logoutMethod'])->middleware('adminlogincheck');


// changing mail requires login, thus but changing pass can be done without login for forget password feature
Route::get('/change-email', [AdminController::class, 'changeMailOTp'])->middleware('adminlogincheck');

Route::get('/change-email-address', [AdminController::class, 'mailChangeRedirect'])->middleware('adminlogincheck');

Route::get('/adds-control', [AddsController::class, 'redirectpage'])->middleware('adminlogincheck');

Route::get('/delete-add-{addSno}', [AddsController::class, 'deleteAddMethod'])->middleware('adminlogincheck');

Route::get('/other-managements', [OtherManagementsController::class, 'showpage'])->middleware('adminlogincheck');


Route::get('/site-info', [OtherManagementsController::class, 'siteinfo'])->middleware('adminlogincheck');














// post routes 
Route::post('/edit-coin-from-all-coin-page', [AllCoinController::class, 'saveEdits'])->middleware('adminlogincheck');

Route::post('/update-coin', [UpdateController::class, 'updateCoin'])->middleware('adminlogincheck');

Route::post('/upload-coins-by-excell', [ExcellUpController::class, 'uploadFile'])->middleware('adminlogincheck');

Route::post('/edit-user-type', [SmallStufsController::class, 'editUserProfile'])->middleware('adminlogincheck');

Route::post('/updatelist', [PromoteUsersController::class, 'updatelistMethod'])->middleware('adminlogincheck');

Route::post('/promote-coin', [PromoteUsersController::class, 'promoteMethod'])->middleware('adminlogincheck');

Route::post('/normalize-coin', [PromoteUsersController::class, 'normalizeMethod'])->middleware('adminlogincheck');




// these does not require login 
Route::post('/check-login', [AdminController::class, 'checkLogin']);

Route::post('/check-otp', [AdminController::class, 'checkOtp']);

Route::post('/change-admin-passwords', [AdminController::class, 'changePasswordsMethod']);




Route::post('/check-emailchange-otp', [AdminController::class, 'checkEmailchangeOtp'])->middleware('adminlogincheck');

Route::post('/change-admin-email', [AdminController::class, 'changeEmailMethod'])->middleware('adminlogincheck');





Route::post('/create-influencer', [InluencerController::class, 'addInfluencers'])->middleware('adminlogincheck');

Route::post('/updateInfluencer', [InluencerController::class, 'updateInfluencerMethod'])->middleware('adminlogincheck');

Route::post('/edit-user-status', [InluencerController::class, 'editUserStatus'])->middleware('adminlogincheck');

Route::post('/create-footer-add', [AddsController::class, 'uploadAddMethod'])->middleware('adminlogincheck');

Route::post('/upload-about-text', [OtherManagementsController::class, 'AboutUsUpload'])->middleware('adminlogincheck');

Route::post('/upload-contact-text', [OtherManagementsController::class, 'contacttUsUpload'])->middleware('adminlogincheck');

Route::post('/upload-contact-text', [OtherManagementsController::class, 'contacttUsUpload'])->middleware('adminlogincheck');

Route::post('/upload-privacy-text', [OtherManagementsController::class, 'privacyUpload'])->middleware('adminlogincheck');

Route::post('/upload-helps-text', [OtherManagementsController::class, 'helpsUpload'])->middleware('adminlogincheck');

Route::post('/change-siteinfo', [OtherManagementsController::class, 'changeSiteInfo'])->middleware('adminlogincheck');

Route::post('/edit-gcaptcha', [OtherManagementsController::class, 'googleCaptcha'])->middleware('adminlogincheck');















Route::get('/cache', function(){
   Artisan::call('cache:clear');
});


Route::get('/storage', function(){
   Artisan::call('storage:link');
});


Route::get('/config', function(){
   Artisan::call('config:cache');
});













