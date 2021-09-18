<?php

use App\Http\Controllers\Admin\AddCommunityController;
use App\Http\Controllers\Admin\AdminCampaignsController;
use App\Http\Controllers\Admin\AdminMessageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CausesController;
use App\Http\Controllers\Community\CampaignController;
use App\Http\Controllers\Community\CommunityProfileController;
use App\Http\Controllers\Community\MessageController;
use App\Http\Controllers\DonationController;;

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Community\CommunityController;


/*universal routes*/
Route::group(['middleware' => 'language'],function(){

    Route::get('/',[WelcomeController::class,'index']);
    Route::get('/about',function (){
        return view('about');
    })->name('about');

    /*causes routes*/
    Route::get('/latest-causes', [CausesController::class,'index'])->name('latest-causes');
    Route::get('/single-cause/{cause}', [CausesController::class,'show'])->name('single-cause');
    Route::post('/latest-causes/search', [CausesController::class,'search'])->name('search');
    Route::get('/latest-causes/categories/{searchId}', [CausesController::class,'moreCampaigns'])->name('more-campaigns');

    /*ranked causes*/
    Route::get('/ranked-causes', [CausesController::class,'rankedCauses'])->name('ranked-causes');

    /*donation routes*/
    Route::get('/donation/{id}', [DonationController::class,'index'])->name('donation.index');
    Route::post('/donation/', [DonationController::class,'store'])->name('donation.store');

    Route::get('/contact',function (){
        return view('contact');
    })->name('contact');
    /*end of universal routes*/
});

/*language routes*/
Route::get('/lang/{lang}',[LanguageController::class,'index'])->name('lang');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


/*admin routes*/
Route::group(['prefix'=>'admin', 'middleware'=>['auth','admin']],function(){
    Route::get('/',[AdminController::class,'index'])->name('admin.index');
    Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
    Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
    Route::post('/categories',[CategoryController::class,'store'])->name('categories.store');
    Route::get('/categories/{category}/edit',[CategoryController::class,'edit'])->name('categories.edit');
    Route::patch('/categories/{category}',[CategoryController::class,'update'])->name('categories.update');
    Route::delete('/categories/{category}',[CategoryController::class,'destroy'])->name('categories.destroy');

    Route::resource('communities',AddCommunityController::class);

    Route::resource('camp',AdminCampaignsController::class);
    Route::get('camps/notifications',[AdminCampaignsController::class,'notifications']);

    /*ranking campaigns routes*/
    Route::get('camps/rank',[AdminCampaignsController::class,'rank'])->name('camps.rank');
//    Route::delete('camps/rank/',[AdminCampaignsController::class,'deleteRank'])->name('camps.delete');
    Route::post('camps/rank',[AdminCampaignsController::class,'storeRanking'])->name('camps.storeRanking');

    Route::get('/messages/',[AdminMessageController::class,'index'])->name('message.index');

    Route::get('/messages/show/{id}',[AdminMessageController::class,'show'])->name('message.show');
});

/*community routes*/
Route::group(['prefix'=>'community', 'middleware'=>['auth','community']],function(){
    Route::get('',[CommunityController::class,'index'])->name('community.index');

    Route::resource('campaigns',CampaignController::class);
    Route::get('campaigns/notifications/{id}',[CampaignController::class,'notifications']);

    Route::get('/profile',[CommunityProfileController::class,'create'])->name('community-profile.create');

    Route::post('/profile/{id}',[CommunityProfileController::class,'update'])->name('community-profile.update');

    Route::get('/messages/create',[MessageController::class,'create'])->name('message.create');
    Route::post('/messages/create',[MessageController::class,'store'])->name('message.store');
});






require __DIR__.'/auth.php';
