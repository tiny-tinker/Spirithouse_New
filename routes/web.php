<?php

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

Auth::routes();

Route::get('/home', 'PagesController@getIndex')->name('pages.home');
Route::get('/', 'PagesController@getIndex')->name('pages.home');
Route::get('/restaurant', 'PagesController@getRestaurant')->name('pages.restaurant');
Route::get('/school', 'PagesController@getSchool')->name('pages.school');
Route::get('/shop', 'PagesController@getShop')->name('pages.shop');
Route::get('/vouchers', 'PagesController@getVouchers')->name('pages.vouchers');
Route::get('/foodtours', 'PagesController@getFoodtours')->name('pages.foodtours');
Route::get('/mapsandinfo', 'PagesController@getMapsandinfo')->name('pages.mapsandinfo');
Route::get('/recipe', 'PagesController@getRecipe')->name('pages.recipe');
Route::get('/newsletter', 'PagesController@getNewsletter')->name('pages.newsletter');
Route::get('/privacy', 'PagesController@getPrivacy')->name('pages.privacy');
Route::get('/download', 'DownloadController@getDownload')->name('download');
Route::get('/book/{scheduleid}', 'SchoolController@getBook')->name('pages.book');
Route::get('/waitlist/{scheduleid}', 'SchoolController@getWaitlist')->name('school.waitlist');


/* Admin Controller */
Route::get('/admin', 'AdminController@getIndex')->name('admin.index');
Route::get('/admin/viewcerts', 'AdminController@getViewcerts')->name('admin.cert');
Route::get('/admin/credits', 'AdminController@getCredits')->name('admin.credits');
Route::get('/admin/vip', 'AdminController@getVip')->name('admin.vip');
Route::get('/admin/maillist', 'AdminController@getMaillist')->name('admin.maillist');
Route::get('/admin/viewmenu', 'AdminController@getViewmenu')->name('admin.viewmenu');
Route::get('/admin/viewstock', 'AdminController@getViewstock')->name('admin.viewstock');
Route::get('/admin/viewwines', 'AdminController@getViewwine')->name('admin.viewwines');
Route::get('/admin/viewnewsletter', 'AdminController@getViewnewsletter')->name('admin.viewnewsletter');
Route::get('/admin/viewproducts', 'AdminController@getViewproducts')->name('admin.viewproducts');