<?php

namespace Database\Factories;

use App\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    protected $model = Setting::class;

    public function definition()
    {
        return [
            'website_title' => 'Jims India Blog',
            'logo' => 'logo.png',
            'favicon' => 'favicon.png',
            'about_us' => 'Jims India Blog is a platform for sharing insights, stories and knowledge about education, business, technology and more. We strive to provide quality content that inspires and informs our readers.',
            'copyright' => 'Copyright ' . date('Y') . ' <a href="http://jimsindia.com" target="_blank">Jims India</a>, All rights reserved.',
            'email' => 'info@jimsindia.com',
            'phone' => '+91 11 1234 5678',
            'mobile' => '+91 9876 543 210',
            'fax' => '011-12345678',
            'address_line_one' => 'Sector 62, Institutional Area',
            'address_line_two' => 'Noida',
            'state' => 'Uttar Pradesh',
            'city' => 'Noida',
            'zip' => '201309',
            'country' => 'India',
            'map_iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.0!2d77.0!3d28.0!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjjCsDAyJzAwLjAiTiA3N8KwMDInMDAuMCJF!5e0!3m2!1sen!2sin!4v1234567890" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'facebook' => 'https://facebook.com/jimsindia',
            'twitter' => 'https://twitter.com/jimsindia',
            'github' => 'https://github.com/jimsindia',
            'linkedin' => 'https://www.linkedin.com/company/jimsindia/',
            'meta_title' => 'Jims India Blog - Education, Technology & Business Insights',
            'meta_keywords' => 'Jims India, Blog, Education, Technology, Business, India',
            'meta_description' => 'Jims India Blog provides quality content about education, technology, business and more. Stay updated with the latest trends and insights.',
            'gallery_meta_title' => 'Jims India Photo Gallery',
            'gallery_meta_keywords' => 'Jims India, Gallery, Photos, Campus, Events',
            'gallery_meta_description' => 'Browse through our collection of photos showcasing campus life, events and activities at Jims India.',
        ];
    }
}
