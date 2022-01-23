<?php

Route::get('/',  [App\Http\Controllers\FrontendController::class, 'index'])->name('welcome');
Route::get('/gerai',  [App\Http\Controllers\FrontendController::class, 'geraiBarber'])->name('gerai');
Route::get('/gerai/{slug}',  [App\Http\Controllers\FrontendController::class, 'geraiSingle'])->name('gerai.detail');
Route::get('/services',  [App\Http\Controllers\FrontendController::class, 'services'])->name('services');
Route::get('/services/{slug}',  [App\Http\Controllers\FrontendController::class, 'servicesSingle'])->name('services.detail');
Route::get('/order-now',  [App\Http\Controllers\FrontendController::class, 'orderNow'])->name('order-now');
Route::get('select-option', [App\Http\Controllers\FrontendController::class,'selectSearch']);
Route::post('/order-detail',  [App\Http\Controllers\FrontendController::class, 'orderDetail'])->name('order-detail.store');

Route::post('service-temps', [App\Http\Controllers\ServiceTempController::class,'store'])->name('service-temps.store');
Route::delete('service-temps', [App\Http\Controllers\ServiceTempController::class,'destroy'])->name('service-temps.destroy');
Route::delete('service-temps-temp', [App\Http\Controllers\ServiceTempController::class,'delete'])->name('service-temps-temp.delete');

// get form data
Route::get('get-data-form-order', [App\Http\Controllers\FrontendController::class, 'dataFormOrder'])->name('get-data-form-order');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::resource('permissions', 'PermissionsController');
    
    // Roles
    Route::resource('roles', 'RolesController');

    // Users
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Barbershop
    Route::post('barbershops/media', 'BarbershopController@storeMedia')->name('barbershops.storeMedia');
    Route::post('barbershops/ckmedia', 'BarbershopController@storeCKEditorImages')->name('barbershops.storeCKEditorImages');
    Route::resource('barbershops', 'BarbershopController');
    // Services
    Route::post('services/media', 'ServicesController@storeMedia')->name('services.storeMedia');
    Route::post('services/ckmedia', 'ServicesController@storeCKEditorImages')->name('services.storeCKEditorImages');
    Route::resource('services', 'ServicesController');
    // Stylist
     Route::post('stylists/media', 'StylistController@storeMedia')->name('stylists.storeMedia');
    Route::post('stylists/ckmedia', 'StylistController@storeCKEditorImages')->name('stylists.storeCKEditorImages');
    Route::resource('stylists', 'StylistController');

     // Setting
     Route::post('settings/media', 'SettingController@storeMedia')->name('settings.storeMedia');
     Route::post('settings/ckmedia', 'SettingController@storeCKEditorImages')->name('settings.storeCKEditorImages');
    //  Route::resource('settings', 'SettingController', [
    //     'only' => ['show', 'create', 'store',edit]
    // ]);
    Route::resource('settings', 'SettingController');

    // Service Booking
   Route::resource('service-bookings', 'ServiceBookingController');

});


Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});