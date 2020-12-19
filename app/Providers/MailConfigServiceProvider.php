<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if (Schema::hasTable('setting')) {
            $mailSetting = json_decode(DB::table('setting')->find(2)->value, true);
            $from = $mailSetting['email'];
            $pass = $mailSetting['password'];
            if ($mailSetting) //checking if table is not empty
            {
                $config = array(
                    'driver'     => env('MAIL_DRIVER', 'smtp'),
                    'host'       => env('MAIL_HOST', 'smtp.mailgun.org'),
                    'port'       => env('MAIL_PORT', 587),
                    'from'       => array('address' => $from, 'name' => config('zvn.config.email_name.default')),
                    'encryption' => 'tls',
                    'username'   => $from,
                    'password'   => $pass,
                    'sendmail'   => '/usr/sbin/sendmail -bs',
                    'pretend'    => false,
                );
                Config::set('mail', $config);
            }else{
                echo '<h3 style="color:red;">MailConfigServiceProvider error at function register</h3>';
            }
        }
    }
}
