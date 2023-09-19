<?php


use App\Http\Kernel;
use Illuminate\Support\Facades\Route;
use VarenykyFaq\Http\Controllers\FrontendController;
use Varenyky\Http\Middleware\Authenticate;

use VarenykyFaq\Http\Controllers\FaqCategoriesController;
use VarenykyFaq\Http\Controllers\FaqItemsController;

Route::prefix(config('varenyky.path'))->name('admin.')->middleware(resolve(Kernel::class)->getMiddlewareGroups()['web'])->group(function () {
    Route::group(['middleware' => [Authenticate::class]], function () {
        Route::resource('/faqcategories', FaqCategoriesController::class);
        Route::resource('/faqitems', FaqItemsController::class);
    });
});

Route::middleware(resolve(Kernel::class)->getMiddlewareGroups()['web'])->group(function () {
    Route::get('/f/faq', [FrontendController::class, 'index']);
    Route::get('/f/frequently-asked-questions', [FrontendController::class, 'index']);
});
