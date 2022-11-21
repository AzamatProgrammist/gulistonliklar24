<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        paginator::useBootstrap();

        view()->composer('layouts.site', function($view){
            $categories = \App\Models\Category::all();
            $ad = \App\Models\Ads::first();
            $response = Http::get('https://coronavirus-19-api.herokuapp.com/countries/uzbekistan');
            $covidData = $response->json();
            $response2 = Http::get('https://cbu.uz/uz/arkhiv-kursov-valyut/json/');
            $response2 = $response2->json();
            $kursData['usd'] = $response2[0]['Rate'];
            $kursData['rubl'] = $response2[2]['Rate'];
            $kursData['euro'] = $response2[1]['Rate'];
            $view->with(compact('categories', 'ad', 'covidData', 'kursData'));
        });

        view()->composer('sections.popularPosts', function($view){
            $popularPosts = \App\Models\Post::limit(4)->orderBy('view', 'DESC')->get();
            $ad = \App\Models\Ads::first();
            $view->with(compact('popularPosts', 'ad'));
        });

    }
}
