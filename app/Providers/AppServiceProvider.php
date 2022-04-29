<?php

namespace App\Providers;

use App\Models\Property;
use App\Models\Reservation;
use App\Models\Review;
use Illuminate\Support\Facades\Gate ;
use Illuminate\Pagination\Paginator;
use App\Models\User ;
use Illuminate\Support\Facades\DB ;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use function PHPUnit\Framework\isEmpty;


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
        //
        Gate::define("modify",function (User $user,Property $property){
            return ($user->id == $property->user_id) ;
        });
        Gate::define("host_user",function (User $user){
            return ($user->role == 'host') ;
        });
        Gate::define("simple_user",function (User $user){
            return ($user->role == 'simpleuser') ;
        });
        Gate::define("add_review",function ( User $user, Property $property ){


            $review_already_exists = DB::select("SELECT review_score FROM reviews WHERE property_id = :propety_id && user_id = :user_id ", ['propety_id' => $property->id, 'user_id' => $user->id]) ;
            $endDate = DB::select("SELECT end_date FROM reservations WHERE property_id = :propety_id && user_id = :user_id LIMIT 1", ['propety_id' => $property->id, 'user_id' => $user->id]);
            $current_date = Carbon::now()->format('Y-m-d');
            if(count($review_already_exists)>0){
                return false ;
            }
            if (!empty($endDate)) {
                return $endDate[0]->end_date < $current_date;
            }
            else{
                return false ;
            }

        });

        Paginator::useBootstrap();

    }
}
