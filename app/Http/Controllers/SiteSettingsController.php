<?php
namespace App\Http\Controllers;

use App\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingsController extends Controller
{
    // Display the form for site settings
    public function index()
    {
        // Fetch settings by keys (logo, mobile_no, copyright, slogan and others )
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
        ])
        ->get()->keyBy('key');
        return view('backend.sitesetting', compact('settings'));
    }

    // Update the site settings
    public function update(Request $request)
    {
        $data = $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'mobile_no' => 'required|string',
            'copyright' => 'required|string',
            'slogan' => 'required|string',
            'ourblog_content1' => 'required|string',
            'ourblog_content2' => 'required|string',
            'ourblog_content3' => 'required|string',
            'ourblog_slogan1' => 'required|string',
            'ourblog_slogan2' => 'required|string',
            'ourblog_slogan3' => 'required|string',

            'A-content1' => 'required|string',
            'A-content2' => 'required|string',
            'A-content3' => 'required|string',
            // 'A-image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'B-content1' => 'required|string',
            'B-content2' => 'required|string',
            'B-content3' => 'required|string',
            // 'B-image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'shipping_content1' => 'required|string',
            'shipping_subcontent1' => 'required|string',
            // 'shipping-image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'shipping_content2' => 'required|string',
            'shipping_subcontent2' => 'required|string',
            // 'shipping-image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'shipping_content3' => 'required|string',
            'shipping_subcontent3' => 'required|string',
            // 'shipping-image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'shipping_content4' => 'required|string',
            'shipping_subcontent4' => 'required|string',
            'about_us_title' => 'required|string',
            'about_us_subtitle' => 'required|string',
            'about_us_description' => 'required|string',
            'about_us_breadcrumb_title' => 'required|string',
            'vision_title' => 'required|string',
            'vision_description' => 'required|string',
            'mission_title' => 'required|string',
            'mission_description' => 'required|string',
            'goal_title' => 'required|string',
            'goal_description' => 'required|string',
            'banner_title1' => 'required|string',
            'banner_title2' => 'required|string',
            'banner_title3' => 'required|string',
            'banner_price1' => 'required|string',
            'banner_price2' => 'required|string',
            'banner_price3' => 'required|string',
            // 'banner_image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            // 'banner_image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            // 'banner_image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            // 'team_member_image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            // 'team_member_image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            // 'team_member_image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            // 'team_member_image4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        
        // Handle the logo upload
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            SiteSetting::set('logo', $logoPath);
        }
        
        // Handle blog images upload
        if ($request->hasFile('ourblog_image1')) {
            $logoPath = $request->file('ourblog_image1')->store('logos', 'public');
            SiteSetting::set('ourblog_image1', $logoPath);
        }
        
        if ($request->hasFile('ourblog_image2')) {
            $logoPath = $request->file('ourblog_image2')->store('logos', 'public');
            SiteSetting::set('ourblog_image2', $logoPath);
        }
        
        if ($request->hasFile('ourblog_image3')) {
            $logoPath = $request->file('ourblog_image3')->store('logos', 'public');
            SiteSetting::set('ourblog_image3', $logoPath);
        }
        
        // Handle other image uploads
        if ($request->hasFile('A-image')) {
            $logoPath = $request->file('A-image')->store('logos', 'public');
            SiteSetting::set('A-image', $logoPath);
        }
        
        if ($request->hasFile('B-image')) {
            $logoPath = $request->file('B-image')->store('logos', 'public');
            SiteSetting::set('B-image', $logoPath);
        }
        
        if ($request->hasFile('shipping-image1')) {
            $logoPath = $request->file('shipping-image1')->store('logos', 'public');
            SiteSetting::set('shipping-image1', $logoPath);
        }
        
        if ($request->hasFile('shipping-image2')) {
            $logoPath = $request->file('shipping-image2')->store('logos', 'public');
            SiteSetting::set('shipping-image2', $logoPath);
        }
        
        if ($request->hasFile('shipping-image3')) {
            $logoPath = $request->file('shipping-image3')->store('logos', 'public');
            SiteSetting::set('shipping-image3', $logoPath);
        }
        
        if ($request->hasFile('shipping-image4')) {
            $logoPath = $request->file('shipping-image4')->store('logos', 'public');
            SiteSetting::set('shipping-image4', $logoPath);
        }
        
        if ($request->hasFile('banner_image1')) {
            $logoPath = $request->file('banner_image1')->store('logos', 'public');
            SiteSetting::set('banner_image1', $logoPath);
        }
        
        if ($request->hasFile('banner_image2')) {
            $logoPath = $request->file('banner_image2')->store('logos', 'public');
            SiteSetting::set('banner_image2', $logoPath);
        }
        
        if ($request->hasFile('banner_image3')) {
            $logoPath = $request->file('banner_image3')->store('logos', 'public');
            SiteSetting::set('banner_image3', $logoPath);
        }
        
        
        

     // Update or create other settings 
        $this->updateOrCreateSetting('mobile_no', $data['mobile_no']);
        $this->updateOrCreateSetting('copyright', $data['copyright']);
        $this->updateOrCreateSetting('slogan', $data['slogan']);
        $this->updateOrCreateSetting('ourblog_content1', $data['ourblog_content1']);
        $this->updateOrCreateSetting('ourblog_content2', $data['ourblog_content2']);
        $this->updateOrCreateSetting('ourblog_content3', $data['ourblog_content3']);
        $this->updateOrCreateSetting('ourblog_slogan1', $data['ourblog_slogan1']);
        $this->updateOrCreateSetting('ourblog_slogan2', $data['ourblog_slogan2']);
        $this->updateOrCreateSetting('ourblog_slogan3', $data['ourblog_slogan3']);

        // Update or create new settings
        $this->updateOrCreateSetting('A-content1', $data['A-content1']);
        $this->updateOrCreateSetting('A-content2', $data['A-content2']);
        $this->updateOrCreateSetting('A-content3', $data['A-content3']);
        $this->updateOrCreateSetting('B-content1', $data['B-content1']);
        $this->updateOrCreateSetting('B-content2', $data['B-content2']);
        $this->updateOrCreateSetting('B-content3', $data['B-content3']);
        $this->updateOrCreateSetting('shipping_content1', $data['shipping_content1']);
        $this->updateOrCreateSetting('shipping_subcontent1', $data['shipping_subcontent1']);
        $this->updateOrCreateSetting('shipping_content2', $data['shipping_content2']);
        $this->updateOrCreateSetting('shipping_subcontent2', $data['shipping_subcontent2']);
        $this->updateOrCreateSetting('shipping_content3', $data['shipping_content3']);
        $this->updateOrCreateSetting('shipping_subcontent3', $data['shipping_subcontent3']);
        $this->updateOrCreateSetting('shipping_content4', $data['shipping_content4']);
        $this->updateOrCreateSetting('shipping_subcontent4', $data['shipping_subcontent4']);
        $this->updateOrCreateSetting('about_us_title', $data['about_us_title']);
        $this->updateOrCreateSetting('about_us_subtitle', $data['about_us_subtitle']);
        $this->updateOrCreateSetting('about_us_description', $data['about_us_description']);
        $this->updateOrCreateSetting('about_us_breadcrumb_title', $data['about_us_breadcrumb_title']);
        $this->updateOrCreateSetting('vision_title', $data['vision_title']);
        $this->updateOrCreateSetting('vision_description', $data['vision_description']);
        $this->updateOrCreateSetting('mission_title', $data['mission_title']);
        $this->updateOrCreateSetting('mission_description', $data['mission_description']);
        $this->updateOrCreateSetting('goal_title', $data['goal_title']);
        $this->updateOrCreateSetting('goal_description', $data['goal_description']);
        $this->updateOrCreateSetting('banner_title1', $data['banner_title1']);
        $this->updateOrCreateSetting('banner_title2', $data['banner_title2']);
        $this->updateOrCreateSetting('banner_title3', $data['banner_title3']);
        $this->updateOrCreateSetting('banner_price1', $data['banner_price1']);
        $this->updateOrCreateSetting('banner_price2', $data['banner_price2']);
        $this->updateOrCreateSetting('banner_price3', $data['banner_price3']);


        return redirect()->back()->with('success', 'Site settings updated successfully.');
    }

    // Helper method to update or create a setting
    private function updateOrCreateSetting($key, $value)
    {
        SiteSetting::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }
}
