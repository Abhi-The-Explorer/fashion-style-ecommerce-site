<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\SiteSetting;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Share site settings with all views
        $settings = SiteSetting::whereIn('key', [
            'logo', 
            'mobile_no', 
            'copyright', 
            'slogan', 
            'ourblog_content1',
            'ourblog_content2', 
            'ourblog_content3', 
            'ourblog_slogan1', 
            'ourblog_slogan2', 
            'ourblog_slogan3', 
            'ourblog_image1',
            'ourblog_image2', 
            'ourblog_image3',
            'A-content1', 
            'A-content2', 
            'A-content3', 
            'A-image', 
            'B-content1', 
            'B-content2', 
            'B-content3', 
            'B-image',
            'shipping_content1', 
            'shipping_subcontent1', 
            'shipping-image1', 
            'shipping_content2', 
            'shipping_subcontent2', 
            'shipping-image2', 
            'shipping_content3', 
            'shipping_subcontent3', 
            'shipping-image3', 
            'shipping_content4', 
            'shipping_subcontent4', 
            'shipping-image4',
            'about_us_title', 
            'about_us_subtitle', 
            'about_us_description', 
            'about_us_breadcrumb_title', 
            'vision_title', 
            'vision_description', 
            'mission_title', 
            'mission_description', 
            'goal_title', 
            'goal_description', 
            'banner_title1', 
            'banner_title2', 
            'banner_title3', 
            'banner_price1', 
            'banner_price2', 
            'banner_price3', 
            'banner_image1', 
            'banner_image2', 
            'banner_image3'
            
        ])->get()->keyBy('key');
        View::share('siteSettings', $settings);
    }

    public function register()
    {
        //
    }
}
