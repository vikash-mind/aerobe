<?php

namespace App\Providers;

use Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Websetting;
use App\Models\TopMenu;
use App\Models\Country;
use App\Models\MainMenu;
use App\Models\ConnectWithUsMenu;
use App\Models\ProductsResourceMenu;
use App\Models\LegalInformationMenu;
use App\Models\Testimonial;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
            View::composer('*', function ($view) {
            $websettingInfo = Websetting::first();
            $topMenus = TopMenu::get();
            $countries = Country::where('is_main', 1)->get();
            $mainMenus = MainMenu::get();
            $productsResourceMenus = ProductsResourceMenu::get();
            $connectWithUsMenus = ConnectWithUsMenu::get();
            $legalInformationMenus = LegalInformationMenu::get();
            $testimonials = Testimonial::get();
            $categories = Category::get();
            #dd($websettingInfo);    
            // Check if the user is authenticated
            if (Auth::check()) {
                $userInfo = Auth::user(); // Get the authenticated user directly
            } else {
                $userInfo = collect([]); // Return an empty collection for unauthenticated users
            }

            $mainMenus = MainMenu::get();
            $categories = Category::get();

            $portfolioData = [];
            foreach ($categories as $category) {
                $portfolioData[strtolower($category->label)] = $category->ourPortfolios->map(function ($portfolio) {
                    return [
                        'name' => $portfolio->title,
                        'href' => '/portfolio/' . $portfolio->slug,
                        'description' => $portfolio->short_description,
                        'image' => $portfolio->image ? asset('assets/uploads/our-portfolios/'.$portfolio->image) : '',
                    ];
                })->toArray();
            }
            $portfolioJson = json_encode($portfolioData);
            // Share data with all views
            $view->with([
                'websettingInfo' => $websettingInfo,
                'userInfo' => $userInfo,
                'topMenus' => $topMenus,
                'countries' => $countries,
                'mainMenus' => $mainMenus,
                'productsResourceMenus' => $productsResourceMenus,
                'connectWithUsMenus' => $connectWithUsMenus,
                'legalInformationMenus' => $legalInformationMenus,
                'testimonials' => $testimonials,
                'categories' => $categories,
                'mainMenus' => $mainMenus,
                'categories' => $categories, 
                'portfolioJson' => $portfolioJson, 
            ]);
        });
    }
}
