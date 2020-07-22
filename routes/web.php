<?php

use Illuminate\Support\Facades\Route;
use App\Notification;

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

Route::get('/', function () {
    return view('dashboard.layouts.admin');
});

Route::post('/file-upload', 'Dashboard\NotificationController@fileupload')->name('upload.photo');

Route::get('notifications','Dashboard\NotificationController@index')->name('notifications.index');
Route::get('notifications/create', 'Dashboard\NotificationController@create')->name("notifications.create");
Route::post('notifications', 'Dashboard\NotificationController@store')->name("notifications.store");
Route::get('patients/{notification_id}/edit', 'Dashboard\NotificationController@edit')->name("notifications.edit");
Route::put('patients/{notification_id}', 'Dashboard\NotificationController@update')->name("notifications.update");
Route::delete('patients/{notification_id}/delete', 'Dashboard\NotificationController@destroy')->name("notifications.destroy");




Route::get('dashboard', 'Dashboard\DashboardController@index')->name('dashboard');


Route::get('test/1', function () {
    $notification=new Notification;
    $notification->subject='da vidime dali kje raboti';
    $notification->body='Treba da smislam nekoj mnogogogogoiuouygo dolg zbor';
    $notification->status=false;
    $notification->number_of_emails=5;
    $notification->save();

    return $notification->getWordWithMostWovels();
}



);
