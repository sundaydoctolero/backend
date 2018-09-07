<?php
Route::group(['middleware' => ['api'],'prefix'=>'api'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

    Route::post('sendPasswordResetLink', 'ResetPasswordController@sendEmail');
    Route::post('resetPassword', 'ChangePasswordController@process');
    
    
    Route::get('profile/{user}','ProfileController@profile');


    /** Publication Table */
    Route::get('publications','PublicationController@index');

    /**Download Table */
    Route::post('download','DownloadController@getDownload');


});