<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $items = [
            ['site_main_logo', Null],
            ['site_footer_logo', Null],
            ['site_fav_icon', Null],
            ['site_icon_image', Null],
            ['site_information', Null],
            ['site_phone', '9800000000'],
            ['site_email', 'admin@visaabroad.com'],
            ['site_phone_two', Null],
            ['site_email_two', Null],
            ['site_location', 'Shukra Bhawan, Thamel Marg, Kathmandu'],
            ['site_location_url', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1766.1922293957005!2d85.32724375277473!3d27.705413560014424!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19d5bea5028b%3A0x420e7a2abeb6d084!2svisaabroad%20Infosys!5e0!3m2!1sen!2snp!4v1696924507339!5m2!1sen!2snp'],
            ['site_experiance', Null],
            ['site_copyright', Null],

            ['homepage_title', Null],
            ['homepage_image', Null],
            ['homepage_description', Null],
            ['homepage_seo_title', Null],
            ['homepage_seo_description', Null],
            ['homepage_seo_keywords', Null],
            ['homepage_seo_schema', Null],

            ['service_title', Null],
            ['service_description', Null],

            ['review_title', Null],
            ['review_description', Null],

            ['team_title', Null],
            ['team_description', Null],

            ['blog_title', 'Our Blogs'],
            ['blog_description', Null],

            ['progress_title', null],
            ['progress_description', null],

            ['project_title', null],
            ['project_description', null],

            ['counter_title', null],
            ['counter_description', null],

            ['reviews', null],
            ['projects', null],
            ['services', null],
            ['default_agreement', null],

            ['home_banner_small_title', null],
            ['home_banner_big_title', null],
            ['home_banner_description', null],
            ['home_banner_link_text', null],
            ['home_banner_link_url', null],
            ['home_banner_social', null],
        ];

        if (count($items)) {
            foreach ($items as $item) {
                Setting::create([
                    'key' => $item[0],
                    'value' => $item[1],
                ]);
            }
        }

        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@primeeuro.com',
            'password' => Hash::make('Prime@2025'),
        ]);
    }
}
