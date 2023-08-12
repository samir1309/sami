<?php

use App\Library\Helper;
use App\Models\Category;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;
use Kavenegar\KavenegarApi;
use Larabookir\Gateway\Gateway;

Route::get('/test-barcode','Site\HomeController@testBarcode');
Route::get('/convert-stocks','Site\RefController@convertStocks');
Route::get('/convert-pro-stocks','Site\RefController@convertProductStocks');
Route::get('/convert-pr-stocks','Site\RefController@convertProStocks');

Route::get('/convert-types','Site\RefController@convertType');
Route::get('/convert-price-pr','Site\RefController@convertPriceSpeciification');
Route::get('/convert-price-product','Site\RefController@convertPricePro');
Route::get('/convert-price-one','Site\RefController@convertPriceOne');
Route::get('/convert-price-one-pro','Site\RefController@convertPriceOnePro');
Route::get('/convert-price-color','Site\RefController@convertPriceColor');
Route::get('/convert-prices','Site\RefController@convertPrices');

Route::get('/url-tag','Site\HomeController@urlTag');

Route::get('/fixprice6', 'Admin\ProductController@fixPrice');
Route::get('/what5', 'Admin\PriceController@what');

Route::namespace('Site')->middleware('main')->middleware('cacheable:5')->group(function () {
    //First Pages
    Route::post('/post-number', 'HomeController@postNumber')->name('site.number');


    //Speed test
    Route::get('/speed-test', 'HomeController@getSpeedTest')->name('site.speed-test');
    Route::get('/sliders-api', 'HomeController@slidersApi')->name('site.sliders-api');
    Route::get('/categories-api', 'HomeController@categoriesApi')->name('site.categories-api');
    Route::get('/popular-products-api', 'HomeController@popularProductsApi')->name('site.popular-products-api');
    Route::get('/selling-products-api', 'HomeController@sellingProductsApi')->name('site.selling-products-api');
    Route::get('/brands-api', 'HomeController@brandsApi')->name('site.brand-api');


   Route::post('/post-bell', 'HomeController@postBell')->name('site.bell');

    //Static
    Route::get('/about-us', 'HomeController@getAbout')->name('site.about');
    Route::get('/privacy-policy', 'HomeController@getRules')->name('site.rules');
    Route::get('/rules-and-order', 'HomeController@getOrderRules')->name('site.orderrules');
    Route::get('/pay', 'HomeController@getPay')->name('site.pay');
    Route::get('/faq', 'HomeController@getFaq')->name('site.faq');
    Route::get('/contact-us', 'HomeController@getContact')->name('site.contact');
    Route::post('/post-contact', 'HomeController@postContact')->name('site.contact-post');
    Route::get('/bestselling', 'HomeController@getMost')->name('site.most');
      Route::get('/discount', 'HomeController@getDis')->name('site.dis');
    Route::get('/popular', 'HomeController@getPopular')->name('site.popular');
    Route::get('/latest', 'HomeController@getNew')->name('site.latest');
    Route::get('/incredible-offers', 'HomeController@getTimer')->name('site.timer');

    //Product List
    Route::post('/vue/product-list', 'VueController@productList')->name('vue.product-list');
     Route::post('/vue/product-list2', 'VueController@productList2')->name('vue.product-list2');
    Route::post('/vue/filter-product', 'VueController@filterProduct')->name('vue.filter-product');
    Route::post('/vue/setbrands', 'VueController@Brands')->name('site.getbrands');
    Route::get('/cat/{id}', 'HomeController@list')->name('site.product.list');
    Route::get('/pro/{id}', 'HomeController@detail')->name('site.product.detail');

    Route::get('/banner/{id?}', 'HomeController@banner')->name('site.banner.detail');
    Route::get('/tag/{tag}', 'HomeController@contentListByTag');
    //serach
    Route::get('/search', 'HomeController@getSearch');
      Route::get('/search2', 'HomeController@getSearch2');
    Route::post('/vue/search-list', 'VueController@searchList')->name('vue.search-list');
    Route::post('/vue/filter-search', 'VueController@filterSearch')->name('vue.filter-search');

    //Brand
    Route::post('/vue/brand-list', 'VueController@brandList')->name('vue.brand-list');
     Route::post('/vue/brand-list2', 'VueController@brandList2')->name('vue.brand-list2');
     Route::post('/vue/product-dis', 'VueController@productDis')->name('vue.product-dis');
    Route::post('/vue/filter-brand', 'VueController@filterBrand')->name('vue.filter-brand');
    Route::post('/vue/setcats', 'VueController@Cats')->name('site.getcats');
    Route::get('/brand', 'HomeController@brandList')->name('site.brand.list');
    Route::get('/brand/{id?}', 'HomeController@brandDetail')->name('site.brand.detail');


    //Comments
    Route::post('comment', 'HomeController@postComment');
    Route::post('reply', 'HomeController@postReply');
    Route::post('faq', 'HomeController@postFaq');

    //Blog
    Route::get('/blogs', 'HomeController@blogCat')->name('site.blog.cat');

            Route::get('/blogs/{id?}', 'HomeController@blogList')->name('site.blog.list');

    Route::get('/blog-detail/{id?}', 'HomeController@blogDetail')->name('site.blog.detail');
      //Quiz
    Route::get('/quizes', 'QuizController@list')->name('site.quiz.list');
    Route::get('/quiz/{url}', 'QuizController@details')->name('site.quiz.details');
    Route::post('/post-result', 'QuizController@postQuiz');
    Route::get('/quiz-result', 'QuizController@result');
//        Route::get('/quiz-result', 'QuizController@postQuiz');

    //==Track==
    Route::get('/tracking', 'HomeController@tracking')->name('site.tracking');
    Route::get('/post-track', 'HomeController@track')->name('site.track');
        Route::post('/post-checkout', 'ShopController@postCheckout')->name('site.cart.post-checkout');

    //Shop Cart & Bank

    Route::post('/cart/content', 'ShopController@cartContent')->name('site.cart.content');
    Route::post('/post-address', 'ShopController@postAddAddress')->name('site.cart.address');
    Route::get('/default-address/{id?}', 'ShopController@defaultAddress')->name('site.cart.default');
    Route::post('/cart/add', 'ShopController@addToCart')->name('site.cart.add');
    Route::post('/discount/add', 'ShopController@addDiscount')->name('site.discount.add');
    Route::post('/cart/remove', 'ShopController@removeFromCart')->name('site.cart.remove');
    Route::get('/checkout', 'ShopController@checkout')->name('site.cart.checkout');
    Route::get('/finish', 'ShopController@finish')->name('site.cart.finish');


    Route::get('/', 'HomeController@getIndex')->name('site.home');

});
