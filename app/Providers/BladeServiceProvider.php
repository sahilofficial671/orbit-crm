<?php

namespace App\Providers;

use Blade;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Session;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('alertSuccess', function () {
            $message = '';
            $message .= '<?php if(session(\'success\')){ ?>';
            $message .= '<div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success mt-3" role="alert">
                                    {{session(\'success\')}}
                                </div>
                            </div>
                        </div>';
            $message .= '<?php } ?>';

            return $message;
        });
        Blade::directive('alertError', function () {
            $message = '';
            $message .= '<?php if(session(\'error\')){ ?>';
            $message .= '<div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-danger mt-3" role="alert">
                                    {{session(\'error\')}}
                                </div>
                            </div>
                        </div>';
            $message .= '<?php } ?>';

            return $message;
        });
        Blade::directive('alertInfo', function () {
            $message = '';
            $message .= '<?php if(session(\'info\')){ ?>';
            $message .= '<div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-danger mt-3" role="alert">
                                    {{session(\'info\')}}
                                </div>
                            </div>
                        </div>';
            $message .= '<?php } ?>';

            return $message;
        });
    }
}
