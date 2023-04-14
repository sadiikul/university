<?php

namespace App\Providers;

use App\Models\Administration;
use App\Models\Contact;
use App\Models\Content;
use App\Models\Custom;
use App\Models\Department;
use App\Models\Event;
use App\Models\Institute;
use App\Models\Logo;
use App\Models\Mail;
use App\Models\Marquee;
use App\Models\Menu;
use App\Models\Page;
use App\Models\RndHead;
use App\Models\Seo;
use App\Models\Social;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        // Mail Config
        $mail = Mail::first();
        if ($mail) {
            $data = [
                'driver' => $mail->transport,
                'host' => $mail->host,
                'port' => $mail->port,
                'username' => $mail->username,
                'password' => $mail->password,
                'encryption' => $mail->encryption,
                'from' => [
                    'address' => $mail->from,
                    'name' => 'State University',
                ]
            ];
            Config::set('mail', $data);
        }

        // Menu Customize
        if (Schema::hasTable('menus')) {
            view()->share('menu', Menu::first());
        }

        // Department
        if (Schema::hasTable('departments')) {
            view()->share('department_menu', Department::where('status', 1)->orderBy('id', 'desc')->get());
        }

        // Department
        if (Schema::hasTable('institutes')) {
            view()->share('institute_menu', Institute::where('status', 1)->orderBy('id', 'desc')->get());
        }

        // Department
        if (Schema::hasTable('administrations')) {
            view()->share('adminis_menu', Administration::where('status', 1)->orderBy('id', 'desc')->get());
        }

        // Theme
        if (Schema::hasTable('contents')) {
            view()->share('contents', Content::first());
        }

        // Marquee
        if (Schema::hasTable('marquees')) {
            view()->share('marquees', Marquee::first());
        }

        // Marquee
        if (Schema::hasTable('rnd_heads')) {
            view()->share('rnd_heads', RndHead::first());
        }

        // logo
        if (Schema::hasTable('logos')) {
            view()->share('logos', Logo::first());
        }

        // Social Link
        if (Schema::hasTable('socials')) {
            view()->share('socials', Social::get());
        }

        // Social Link
        if (Schema::hasTable('contacts')) {
            view()->share('contacts', Contact::first());
        }

        // Other page
        if (Schema::hasTable('pages')) {
            view()->share('pages', Page::get());
        }

        // News & Event
        if (Schema::hasTable('events')) {
            view()->share('events', Event::where(['status' => '1'])->orderBy('id', 'desc')->limit(5)->get());
        }

        // Seo
        if (Schema::hasTable('seos')) {
            view()->share('seos', Seo::first());
        }

        // Seo
        if (Schema::hasTable('customs')) {
            view()->share('customs', Custom::first());
        }
    }
}
