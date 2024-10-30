<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\BuyerController;


use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\MaincategoryController;
use App\Http\Controllers\admin\SubcategoryController;
use App\Http\Controllers\admin\brandController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\NewsletterController;
use App\Http\Controllers\admin\UserController;
// use App\Http\Controllers\NewsletterController;




Route::get("/logout", function(){
 Auth::logout();
 return redirect()->route("login");
});


// Route::get('/', [HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/product{id}', [HomeController::class, 'singleProduct'])->name('product');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'contactStore'])->name('contact-store');
Route::post('/newsletter', [HomeController::class, 'newsletter'])->name('newsletter');
Route::get('/confirmation-newsletter', [HomeController::class, 'confirmationNewsletter'])->name('confirmation-newsletter');


Route::group(["middleware" => ['auth', 'role']], function(){
Route::group(["prefix" => "user"], function(){
Route::get('/', [BuyerController::class, 'index'])->name('buyer-index');
Route::get('/profile/update', [BuyerController::class, 'updateProfile'])->name('profile-update');
Route::post('/profile/update/store', [BuyerController::class, 'updateProfileStore'])->name('profile-update-store');
Route::post('/add-to-cart', [BuyerController::class, 'addToCart'])->name('add-to-cart');
Route::get('/cart', [BuyerController::class, 'cart'])->name('cart');
Route::get('/update-cart/{option}/{id}', [BuyerController::class, 'updateCart'])->name('update-cart');
Route::get('/delete-cart/{id}', [BuyerController::class, 'deleteCart'])->name('delete-cart');
Route::get('/checkout', [BuyerController::class, 'checkout'])->name('checkout');
Route::post('/place-order', [BuyerController::class, 'placeOrder'])->name('place-order');
Route::get('/confirmation', [BuyerController::class, 'confirmation'])->name('confirmation');
Route::get('/add-to-wishlist/{id}', [BuyerController::class, 'addToWishlist'])->name('add-to-wishlist');
// Route::get('/delete-wishlist/{id}', [BuyerController::class, 'deleteWishlist'])->name('delete-wishlist');


});



Route::group(["prefix" => "admin"], function(){
    Route::get('/admin', [AdminHomeController::class, 'admin'])->name('admin-index');
    
    Route::group(["prefix" => "maincategory"], function(){
    Route::get('/', [MaincategoryController::class, 'admin'])->name('admin.maincategory');
    Route::get('/admin/maincategory/create', [MainCategoryController::class, 'create'])->name('admin-maincategory-create');
    Route::post('/admin/maincategory/store', [MainCategoryController::class, 'store'])->name('admin.maincategory.store');
    Route::get('/edit{id}', [MainCategoryController::class, 'edit'])->name('admin.maincategory.edit');
    Route::post('/update{id}', [MainCategoryController::class, 'update'])->name('admin.maincategory.update');
    Route::get('/destroy/{id}', [MainCategoryController::class, 'destroy'])->name('admin.maincategory.destroy');
    });

    Route::group(["prefix" => "Subcategory"], function(){
        Route::get('/', [SubcategoryController::class, 'admin'])->name('admin.subcategory');
        Route::get('/admin/subcategory/create', [SubcategoryController::class, 'create'])->name('admin-subcategory-create');
        Route::post('/admin/subcategory/store', [SubcategoryController::class, 'store'])->name('admin.subcategory.store');
        Route::get('/edit{id}', [SubcategoryController::class, 'edit'])->name('admin.subcategory.edit');
        Route::post('/update{id}', [SubcategoryController::class, 'update'])->name('admin.subcategory.update');
        Route::get('/destroy/{id}', [SubcategoryController::class, 'destroy'])->name('admin.subcategory.destroy');
        });
     

        Route::group(["prefix" => "brand"], function(){
            Route::get('/', [brandController::class, 'admin'])->name('admin.brand');
            Route::get('/admin/brand/create', [brandController::class, 'create'])->name('admin-brand-create');
            Route::post('/admin/brand/store', [brandController::class, 'store'])->name('admin.brand.store');
            Route::get('/edit{id}', [brandController::class, 'edit'])->name('admin.brand.edit');
            Route::post('/update{id}', [brandController::class, 'update'])->name('admin.brand.update');
            Route::get('/destroy/{id}', [brandController::class, 'destroy'])->name('admin.brand.destroy');
            });

         
        Route::group(["prefix" => "product"], function(){
            Route::get('/', [ProductController::class, 'admin'])->name('admin.product');
            Route::get('/admin/product/create', [ProductController::class, 'create'])->name('admin-product-create');
            Route::post('/admin/product/store', [ProductController::class, 'store'])->name('admin.product.store');
            Route::get('/edit{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
            Route::post('/update{id}', [ProductController::class, 'update'])->name('admin.product.update');
            Route::get('/destroy/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
            });

         
      
            Route::group(["prefix" => "testimonial"], function(){
                Route::get('/', [TestimonialController::class, 'admin'])->name('admin.testimonial');
                Route::get('/admin/product/create', [TestimonialController::class, 'create'])->name('admin-testimonial-create');
                Route::post('/admin/product/store', [TestimonialController::class, 'store'])->name('admin.testimonial.store');
                Route::get('/edit{id}', [TestimonialController::class, 'edit'])->name('admin.testimonial.edit');
                Route::post('/update{id}', [TestimonialController::class, 'update'])->name('admin.testimonial.update');
                Route::get('/destroy/{id}', [TestimonialController::class, 'destroy'])->name('admin.testimonial.destroy');
                });


                Route::group(["prefix" => "newsletter"], function(){
                    Route::get('/', [NewsletterController::class, 'admin'])->name('admin.newsletter');                   
                    Route::get('/edit{id}', [NewsletterController::class, 'edit'])->name('admin.newsletter.edit');
                    Route::get('/destroy/{id}', [NewsletterController::class, 'destroy'])->name('admin.newsletter.destroy');
                    });

                    Route::group(["prefix" => "user"], function(){
                        Route::get('/', [UserController::class, 'admin'])->name('admin.user');                   
                        Route::get('/edit{id}', [UserController::class, 'edit'])->name('admin.user.edit');
                        Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
                        });
    });
});
 

    



