<?php

namespace App\Providers;
use Blade;
use Illuminate\Support\ServiceProvider;
use Session;
use Illuminate\Http\Request;

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
            $message .='<?php if(session(\'success\')){ ?>';
            $message .= '<div class="row" style="height: 81px">
                        <div class="col-sm-12">
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                {{session(\'success\')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>';
            $message .='<?php } ?>';
            return $message;
        });
        Blade::directive('alertError', function () {
            $message = '';
            $message .='<?php if(session(\'error\')){ ?>';
            $message .= '<div class="row" style="height: 81px">
            <div class="col-sm-12">
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{session(\'error\')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>';
            $message .='<?php } ?>';
            return $message;
        });
        Blade::directive('alertInfo', function () {
            $message = '';
            $message .='<?php if(session(\'info\')){ ?>';
            $message .= '<div class="row" style="height: 81px">
            <div class="col-sm-12">
                <div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
                    {{session(\'info\')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>';
            $message .='<?php } ?>';
            return $message;
        });
    }
}
