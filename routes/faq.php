<?php


use App\Http\Kernel;
use Illuminate\Support\Facades\Route;
use Varenyky\Http\Middleware\Authenticate;

use VarenykyFaq\Http\Controllers\FaqCategoryController;
use VarenykyFaq\Http\Controllers\FaqController;

Route::prefix(config('varenyky.path'))->name('admin.')->middleware(resolve(Kernel::class)->getMiddlewareGroups()['web'])->group(function () {
    Route::group(['middleware' => [Authenticate::class]], function () {
        Route::post('/faqcategories/json', [SearchController::class, 'searchFaqCategories'])->name('faqcategories.searchFaqCategories');
        Route::post('/faqitems/json', [SearchController::class, 'searchFaqitems'])->name('faqitems.searchFaqitems');
        Route::resource('faqcategories', FaqCategoriesController::class);
        Route::resource('faqitems', FaqItemsController::class);
    });
});

Route::middleware(resolve(Kernel::class)->getMiddlewareGroups()['web'])->group(function () {
    // Route::get('/Faq', [FrontendController::class, 'index'])->name('varenyky.Faqs.index');
    // Route::get('/Faq/{slug}', [FrontendController::class, 'archive'])->name('varenyky.Faqs.archive');
    // Route::get('/Faq/{category}/{slug}', [FrontendController::class, 'show'])->name('varenyky.Faqs.show');
});