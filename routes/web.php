<?php

use App\Mail\LaravelTenTestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ParseController;
use App\Http\Controllers\Admin\TarifController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\TrainerController;
use App\Http\Controllers\Admin\ApparatusController;
use App\Http\Controllers\Admin\BarbellController;
use App\Http\Controllers\Admin\ExercisesController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Auth\UserManagementController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\Admin\DocumentsAdmController;
// Route::get('laravel_ten_test_mail', function () {
//     $data = "We are learning Laravel 10 mail from laravelia.com";

//     // Mail::to('yazmyratatayew1805@gmail.com')->send(
//     //     new LaravelTenTestMail($data)
//     // );

//     dd('Mail send successfully.');
// });

// Route::get(
//     '/linkstorage',
//     function () {
//         return Artisan::call('storage:link');
//     }
// );

Route::controller(HomeController::class)->group(
    function () {
        Route::get('/', 'home')->name('home');
        Route::post('/contact/store', 'contactStore')->name('contact.store');
        Route::post('/comment/store', 'commentStore')->name('comment.store');
    }
);

/* Admin routes */
Route::get('locale/{locale}', [\App\Http\Controllers\LanguageController::class, 'langChange'])
    ->name('locale');
Route::middleware(['set_locale'])->group(
    function () {
        Route::group(
            [
                'prefix' => 'admin'
            ],
            function () {
                Route::get('/', [AdminController::class, 'login'])->name('adminLogin');
                Route::post('/admin/authenticate', [AdminController::class, 'adminAuthenticate'])->name('adminAuthenticate');
                Route::middleware(['is_admin'])->group(
                    function() {
                        Route::controller(AdminController::class)->group(
                            function () {
                                Route::get('/admin/dashboard', 'adminDashboard')->name('adminDashboard');
                                Route::get('/dishes', 'dishes')->name('dish.index');
                            }
                        );
                        Route::post("parse-dishes", ParseController::class)->name('parse.dishes');
                        Route::resource('trainers', TrainerController::class);
                        Route::resource('apparatus', ApparatusController::class);
                        Route::resource('comments', CommentController::class);
                        Route::resource('tarifs', TarifController::class);
                        Route::resource('users', UserController::class);
                        Route::resource('contacts', ContactController::class);
                        Route::resource('barbell', BarbellController::class);
                        Route::resource('documents', DocumentsAdmController::class);
                        Route::controller(DocumentsAdmController::class)->group(
                            function () {
                                Route::get('/documents', 'documents')->name('documents.documents');
                                Route::get('/documents/create', 'create')->name('documents.create');
                               
                                Route::get('/documents/edit/{id}', 'edit')->name('document.edit');
                                Route::put('/documents/update/{id}', 'update')->name('document.update');
                                Route::post('/store', 'store')->name('documents.store');
                               
                                Route::delete('/documents/delete/{documents}', 'destroy')->name('document.delete');
                                
                            }
                        );
                        Route::controller(BarbellController::class)->group(
                            function () {
                                Route::get('/barbell/up/{id}', 'up')->name('barbell.up');
                                Route::get('/barbell/down/{id}', 'down')->name('barbell.down');
                            }
                        );
    
                        Route::controller(TrainerController::class)->group(
                            function () {
                                Route::get('/trainers/up/{id}', 'up')->name('trainers.up');
                                Route::get('/trainers/down/{id}', 'down')->name('trainers.down');
                            }
                        );
                        Route::controller(CommentController::class)->group(
                            function () {
                                Route::get('/comments/up/{id}', 'up')->name('comments.up');
                                Route::get('/comments/down/{id}', 'down')->name('comments.down');
                            }
                        );
                        Route::controller(TarifController::class)->group(
                            function () {
                                Route::get('/tarifs/up/{id}', 'up')->name('tarifs.up');
                                Route::get('/tarifs/down/{id}', 'down')->name('tarifs.down');
                            }
                        );
                        Route::controller(ExercisesController::class)->group(
                            function () {
                                Route::get('/exercises', 'index')->name('exercises.index');
                                Route::get('/exercises/create', 'create')->name('exercises.create');
                                Route::get('/exercises/import', 'import_page')->name('exercises.import_page');
                                Route::get('/exercises/edit/{id}', 'edit')->name('exercise.edit');
                                Route::put('/exercises/update/{id}', 'update')->name('exercise.update');
                                Route::post('/import', 'import')->name('exercises.import');
                                Route::post('/store', 'store')->name('exercise.store');
                                Route::get('/export', 'export')->name('exercises.export');
                                Route::delete('/exercise/delete/{exercise}', 'destroy')->name('exercise.delete');

                            }
                        );
    
                        Route::controller(ApparatusController::class)->group(
                            function () {
                                Route::get('/apparatus', 'index')->name('apparatus.index');
                                Route::get('/apparatus/create', 'create')->name('apparatus.create');
                                Route::get('/apparatus/edit/{id}', 'edit')->name('apparatus.edit2');
                                Route::post('/apparatus/store', 'store')->name('apparatus.store2');
                                Route::put('/apparatus/update/{id}', 'update')->name('apparatus.update2');
                                Route::delete('/apparatus/delete/{apparatus}', 'destroy')->name('apparatus.delete');
                            }
                        );
                    }
                    
                );

            }
        );
    }
);
/* Auth  routes */
Route::middleware(["auth", "verified"])->controller(UserManagementController::class)->group(
    function () {
    	
        Route::get('/user/progress', 'progress')->name('progress');
        Route::get('/user/profile', 'profile')->name('profile');
        Route::post('/user/photo/store', 'photoStore')->name('photo.store');
        Route::post('/user/weight/store', 'weightStore')->name('weight.store');
        Route::post('/user/waist/store', 'waistStore')->name('waist.store');
        Route::post('/user/profile/store', 'profileStore')->name('profile.store');
        Route::post('/user/password/change', 'passwordChange')->name('password.change');
        Route::post('/user/profile/photo/store', 'profilePhotoStore')->name('profile.photo.store');
        Route::post('/user/statistics/store', 'statisticStore')->name('statistics.store');
        Route::delete('/user/statistics/destroy', 'statisticDestroy')->name('statistics.destroy');
        Route::post('/user/value/store', 'valueStore')->name('value.store');
        Route::get('/user/tools', 'tools')->name('tools');
        Route::get('/user/consultations', 'consultations')->name('consultations');
        Route::get('/user/rates', 'rates')->name('rates');
        Route::get('/user/workouts', 'workouts')->name('workouts');
        Route::get('/user/nutrition', 'nutrition')->name('nutrition');
        Route::get('/user/rates/change/{id}', 'ratesChange')->name('rates.change');
        Route::post('/user/bzu/calc', 'bzu_calc')->name('bzu.calc');
        Route::post('/user/water/calc', 'waterCalc')->name('water.calc');
        Route::post('/user/operating/weight/calc', 'operatingWeightCalc')->name('operating.weight.calc');
        Route::post('/train/program/create', 'trainProgramCreate')->name('train.program.create');

        // routes for food
        Route::get('/user/food', 'food')->name('food');
        Route::post('/user/food/day/store', 'DayForFoodStore')->name('DayForFood.store');
        Route::get('/user/food/day/{id}', 'foodDay')->name('food.day');
        Route::post('/user/food/day/{id}/store', 'periodDay')->name('PeriodDay.store');
        Route::post('/user/food/day/{id}/dish/store', 'dishStore')->name('dish.store');
        Route::get('/user/add/random/food/{date_id}', 'addRandomFood')->name('add.random.food');
        Route::get('/user/food-dishes/{id}/count/{count}', 'changeCountFood')->name('change.count.food');
        Route::get('/user/change/random/{date_id}/food/{dish_id}', 'changeRandomFood')->name('change.random.food');
        Route::get('/user/delete/{date_id}/food/{dish_id}', 'deleteFood')->name('delete.food');

        // routes for training
        Route::get('/user/training', 'training')->name('training');
        Route::post('/user/training/day/store', 'DayTrainingStore')->name('DayTraining.store');
        Route::get('/user/training/day/{id}', 'trainingDay')->name('training.day');
        Route::post('/user/training/day/{id}/store', 'periodTrainingStore')->name('periodTraining.store');
        Route::post('/user/training/day/{id}/approach/store', 'approachStore')->name('approach.store');
        Route::get('/user/training/day/{id}/approach/delete', 'approachDelete')->name('approach.delete');
        Route::get('/user/training/day/{id}/period/delete', 'periodDelete')->name('period.delete');
        Route::post('/user/training/day/{id}/approach/edit', 'approachEdit')->name('approach.edit');

    }
);
Auth::routes(['verify' => true]);

Route::controller(LoginRegisterController::class)->group(
    function () {
        Route::middleware('guest')->group(function () {
            // Route::get('/register', 'register')->name('register');
            Route::post('/register', 'store')->name('store');
            // Route::get('/login', 'login')->name('login');
            // Route::post('/authenticate', 'authenticate')->name('authenticate');
        });
        Route::middleware(['auth'])->group(function () {
            Route::middleware(['verified'])->group(function () {
                Route::get('/dashboard', 'dashboard')->name('dashboard');
            });
            Route::post('/logout', 'logout')->name('logout');
        });
    }
);

//Route::get('/dashboard', [StatisticsController::class, 'createGrafic'])->name('dashboard');
Route::get('/documents', [DocumentsController::class, 'documents'])->name('documents.index');
Route::get('register', function() { 
    return redirect()->route('home');
});
Route::get('login', function() { 
    return redirect()->route('home');
});

