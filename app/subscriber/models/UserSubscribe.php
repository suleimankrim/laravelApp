<?php 
namespace App\subscriber\models;
use App\Events\UserCreated;
use App\Listeners\SendEmailWelcome;
use Illuminate\Events\Dispatcher;

class UserSubscribe{
    public function subscribe(Dispatcher $event){
        $event->listen(UserCreated::class,SendEmailWelcome::class);
    }
}