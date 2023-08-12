<?php
use App\Models\Cookie;
use App\Models\Order;
use App\Models\Price;
use App\Models\InventoryReceipt;
use App\Models\OrderItem;
use Kavenegar\Exceptions\HttpException;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\KavenegarApi;
use App\User;
use App\Models\Product;
use App\Models\ProductSpecification;
use App\Models\Image;
use Illuminate\Support\Facades\Mail;

Route::get('/compress-css2','Site\HomeController@compressCss');
Route::get('/cache-site-new2','Site\HomeController@cacheSite');
Route::get('/barcode','Site\HomeController@testBarcode');

