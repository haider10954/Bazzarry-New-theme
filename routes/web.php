<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\seller\ProductOfferController;
use App\Http\Controllers\admin\SellerController;
use App\Http\Controllers\seller\AdvertisementController;
use App\Http\Controllers\seller\DashboardController;
use App\Http\Controllers\user\AuthController as UserAuthController;
use App\Http\Controllers\user\CheckoutController;
use App\Http\Controllers\user\IndexController;
use App\Http\Controllers\user\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/process-payment', [CheckoutController::class, 'processPayment'])->name('handlePayment');

//Cities and States
Route::post('fetch-states', [UserAuthController::class, 'fetchStates'])->name('CheckCountry');
Route::post('fetch-cities', [UserAuthController::class, 'fetchCities'])->name('CheckState');

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/about-us', function () {return view('user.pages.about-us'); })->name('about-us');
Route::get('/contact-us', function () {return view('user.pages.contact-us'); })->name('contact-us');
Route::post('/user-login', [UserAuthController::class, 'userLogin'])->name('user_login');
Route::post('/user-register', [UserAuthController::class, 'user_signUp'])->name('user_register');
//User Logout
Route::get('/user/logout', [UserAuthController::class, 'userlogout'])->name('user_logout');

Route::prefix('user')->group(function () {

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [UserAuthController::class, 'userProfileView'])->name('user-profile');
        Route::post('/updateProfile', [UserAuthController::class, 'userProfileUpdate'])->name('updateUserProfile');


        // Billing Address
        Route::post('/billing-address', [CheckoutController::class, 'billing_address'])->name('billing-address');
        Route::post('/shipping-address', [CheckoutController::class, 'Shipping_address'])->name('shipping-address');

        //Place Order
        Route::get('/order/{order_id}', [CheckoutController::class, 'generate_invoice'])->name('order');
        Route::get('/stripe-redirect', [CheckoutController::class, 'storeStripePayment'])->name('stripe_redirect');
        Route::post('/order', [CheckoutController::class, 'place_order'])->name('place_order');
    });
});


Route::get('/cart', function () {
    return view('user.pages.cart');
})->name('cart');

Route::post('/clear-cart', [ProductController::class, 'clearCart'])->name('clear_cart');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::get('/wishlist', function () {
    return view('user.pages.wishList');
})->name('wishlist');

Route::get('/products', [ProductController::class, 'getAllProducts'])->name('products');

Route::post('/add-to-cart', [ProductController::class, 'add_to_cart'])->name('add_to_cart');
Route::post('/add-product-review', [\App\Http\Controllers\user\ProductReviewController::class, 'addReview'])->name('add_Review');
Route::post('/delete-cart-items', [ProductController::class, 'remove'])->name('deleteCartItems');
Route::post('/update-cart-items', [ProductController::class, 'update'])->name('updateCartItems');

Route::get('/product-detail/{slug}', [ProductController::class, 'index'])->name('product_details');

//Admin Logout
Route::get('/admin-logout', [AuthController::class, 'logout'])->name('admin_auth_logout');


//Admin Login
Route::middleware('guest:admin')->group(function () {
    Route::post('admin-login', [AuthController::class, 'login'])->name('admin_auth_login');
    Route::get('/admin', function () {
        return view('admin.pages.login');
    })->name('admin_login');
});


Route::prefix('admin')->group(function () {
    Route::middleware('auth:admin')->group(function () {

        //Seller
        Route::get('/sellers', [SellerController::class, 'index'])->name('sellers');
        Route::post('/delete-seller', [SellerController::class, 'delete_seller'])->name('delete_seller');

        Route::get('/customers', function () {
            return view('admin.pages.customers');
        })->name('admin-customers');

        Route::get('/orders', [OrderController::class, 'index'])->name('user-orders');
        Route::post('/delete-order', [OrderController::class, 'Delete_Record'])->name('delete-order');
        Route::post('/update-order-status', [OrderController::class, 'update_order_status'])->name('update-order-status');

        Route::get('/order-details/{id}', [OrderController::class, 'view_orders'])->name('order-detail');

        //Product
        Route::get('/product-variants', [\App\Http\Controllers\admin\ProductController::class, 'variants'])->name('product-variants');
        Route::post('/addProductVariant', [\App\Http\Controllers\admin\ProductController::class, 'addProductVariant'])->name('add-variant');
        Route::get('/products', [\App\Http\Controllers\seller\ProductController::class, 'admin_products'])->name('admin-products');
        Route::post('/change-status-active', [\App\Http\Controllers\admin\ProductController::class, 'change_status_active'])->name('change_status_active');
        Route::post('/change_status-Inactive', [\App\Http\Controllers\admin\ProductController::class, 'change_status_Inactive'])->name('change_status_Inactive');

        //Offers
        Route::get('/offers', [\App\Http\Controllers\admin\ProductController::class, 'admin_offers'])->name('admin_offers');
        Route::post('/offer-status-active', [\App\Http\Controllers\admin\ProductController::class, 'change_offer_status_active'])->name('change_offer_status_active');
        Route::post('/offer-status-Inactive', [\App\Http\Controllers\admin\ProductController::class, 'change_offer_status'])->name('change_offer_status');
        Route::post('/admin-delete-offer', [\App\Http\Controllers\admin\ProductController::class, 'delete_product_offer'])->name('admin_delete_product_offer');

        //Advertisement
        Route::get('/advertisement', [AdvertisementController::class, 'admin_index'])->name('admin-advertisement');
        Route::post('/adds-active', [AdvertisementController::class, 'advertisement_status_active'])->name('advertisement_status_active');
        Route::post('/adds-in-active', [AdvertisementController::class, 'advertisement_status_in_active'])->name('advertisement_status_in_active');
        //Banners
        Route::get('/banners', [BannerController::class, 'index'])->name('admin-banners');
        Route::post('/add_banners', [BannerController::class, 'addBanner'])->name('add-banners');
        Route::post('/edit_banners', [BannerController::class, 'editBanner'])->name('edit-banners');
        Route::post('/delete_cbanner', [BannerController::class, 'delete_cbanner'])->name('delete_banner');

        Route::get('/banner-details', function () {
            return view('admin.pages.banner_detail');
        })->name('banner-details');

        Route::get('/dashboard', [\App\Http\Controllers\admin\IndexController::class, 'index'])->name('admin-dashboard');

        Route::get('/category', [\App\Http\Controllers\admin\CategoryController::class, 'index'])->name('product-category');

        Route::post('/add-category', [\App\Http\Controllers\admin\CategoryController::class, 'add_category'])->name('add_category');

        Route::post('/update-category', [\App\Http\Controllers\admin\CategoryController::class, 'edit_category'])->name('edit_category');

        // Change Category Type
        Route::post('/change-status', [\App\Http\Controllers\admin\CategoryController::class, 'change_status'])->name('change_status');
        Route::post('/change-status-draft', [\App\Http\Controllers\admin\CategoryController::class, 'change_status_draft'])->name('change_status_draft');

        Route::post('/delete-category', [\App\Http\Controllers\admin\CategoryController::class, 'delete_category'])->name('delete_category');
    });
});

//Admin Side Route End

//Seller Route


//SellerLogout
Route::get('/seller-logout', [\App\Http\Controllers\seller\AuthController::class, 'logout'])->name('seller_logout');


//Seller Login
Route::middleware('guest:seller')->group(function () {
    Route::post('seller-signup', [\App\Http\Controllers\seller\AuthController::class, 'seller_signup'])->name('seller_auth_signup');
    Route::get('/seller', function () {
        return view('seller.pages.login');
    })->name('seller_login');

    Route::get('/seller/signup', function () {
        return view('seller.pages.signup');
    })->name('seller-signup');

    Route::post('/seller-login', [\App\Http\Controllers\seller\AuthController::class, 'seller_login'])->name('seller_auth_login');
});

Route::prefix('seller')->group(function () {

    Route::middleware('auth:seller')->group(function () {
        Route::get('/profile', function () {
            return view('admin.pages.profile_setting');
        })->name('profile-setting');

        Route::get('/lock-screen', function () {
            return view('admin.pages.lock_screen');
        })->name('lock-screen');

        Route::get('/orders', [\App\Http\Controllers\seller\ProductController::class, 'sellerOrders'])->name('orders');


        //add category
        Route::post('/add-category', [\App\Http\Controllers\seller\ProductController::class, 'add_category'])->name('add_category-seller');

        Route::get('/dashboard', [DashboardController::class,'index'])->name('seller-dashboard');

        //Offers
        Route::post('fetch-category', [ProductOfferController::class, 'fetchCategory'])->name('CheckCategory');
        Route::get('/offers', [ProductOfferController::class, 'index'])->name('seller-offers');
        Route::post('/add-product-offer', [ProductOfferController::class, 'add_product_offer'])->name('add-offer');
        Route::post('/delete-product-offer', [ProductOfferController::class, 'delete_product_offer'])->name('delete_offer');


        //Advertisement
        Route::get('/advertisement', [AdvertisementController::class, 'index'])->name('advertisement');
        Route::post('/addadvertisement', [AdvertisementController::class, 'add_advertisement'])->name('add-advertisement');


        Route::get('/products', [\App\Http\Controllers\seller\ProductController::class, 'index'])->name('seller-products');

        Route::get('/products', [\App\Http\Controllers\seller\ProductController::class, 'index'])->name('seller-products');


        Route::get('/product-details', function () {
            return view('seller.pages.product_details');
        })->name('seller-product-details');

        // product

        Route::get('/add-product', [\App\Http\Controllers\seller\ProductController::class, 'addProductView'])->name('add-product');
        Route::post('/add_product', [\App\Http\Controllers\seller\ProductController::class, 'add_product'])->name('add_product');
        Route::get('/edit_product/{slug}', [\App\Http\Controllers\seller\ProductController::class, 'edit_product_view'])->name('edit-product');
        Route::post('/edit_product', [\App\Http\Controllers\seller\ProductController::class, 'edit_product'])->name('edit_product');
        Route::post('/delete-product', [\App\Http\Controllers\seller\ProductController::class, 'delete_product'])->name('delete_product');
        Route::post('/delete-product-images', [\App\Http\Controllers\seller\ProductController::class, 'deleteProductImage'])->name('delete_product_images');



        Route::get('/order-details', function () {
            return view('seller.pages.order_details');
        })->name('order-details');

        Route::get('/invoices', function () {
            return view('seller.pages.invoices');
        })->name('invoices');

        Route::get('/customers', function () {
            return view('seller.pages.customers');
        })->name('customers');

        Route::get('/todo', function () {
            return view('seller.pages.todo');
        })->name('todo');
    });
});

//Seller Routes End

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Paypal routes
Route::get('/sucess', [CheckoutController::class, 'executePayPalPayment'])->name('paypal.executePayment');
Route::get('/error', [CheckoutController::class, 'cancelPayment'])->name('paypal.cancelPayment');

//Chatbot routes
Route::post('/chat/message', [ChatController::class, 'sendMessage'])->name('chatbot.sendMessage');
Route::post('/chat/description', [ChatController::class, 'sendDescription'])->name('chatbot.sendDiscription');
