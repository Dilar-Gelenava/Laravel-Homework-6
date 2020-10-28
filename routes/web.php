
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
use App\Product;

use Illuminate\Http\Request;

Route::get('/', function()
{
	$products = Product::all()->sortByDesc("id");
    return view("welcome", ['products' => $products]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/store/product', 'ProductController@store_product')->name('storeproduct');

Route::get("/show/product/{id}","ProductController@show_product")->name("showproduct");

Route::post("/delete/product", "ProductController@destroy_product")->middleware("check_user")->name("destroyproduct");

Route::post("/edit/product","ProductController@edit_product")->middleware("check_user")->name("editproduct");

Route::post("update/product","ProductController@update_product")->middleware("check_user")->name("updateproduct");
