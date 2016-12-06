<?php

namespace Ikodota\Yeoman\Models;

use Illuminate\Support\Facades\Config;
use OwenIt\Auditing\Auditable;

trait DataTracker
{
    use Auditable;


    /*public function resolveCustomMessage($message)
    {
        $compareMessage=$message;

        preg_match_all('/\{[\w.| ]+\}/', $message, $segments);

        foreach (current($segments) as $segment) {
            $pipe = str_replace(['{', '}'], '', $segment);

            list($property, $defaultValue, $method) = array_pad(
                explode('|', $pipe, 3), 3, null
            );

            if (empty($defaultValue) && !empty($method)) {
                $defaultValue = $this->callback($method);
            }

            $valueSegmented = $this->getValueSegmented($this, $property, $defaultValue ?: ' ');

            $message = str_replace($segment, $valueSegmented, $message);
            $compareMessage = str_replace($segment, ' ', $compareMessage);

        }
        if($compareMessage == $message){
            return;
        }
        return $message;
    }*/


    protected function getLoggedInUserId()
    {
        return $this->getUserId();
    }

    /**
     * Attempt to find the user id of the currently logged in user
     * Supports Cartalyst Sentry/Sentinel based authentication, as well as stock Auth
     **/
    public function getSystemUserId()
    {
        return $this->getUserId();
    }

    public function  getUserId()
    {
        try {
            if (class_exists($class = '\SleepingOwl\AdminAuth\Facades\AdminAuth')
                || class_exists($class = '\Cartalyst\Sentry\Facades\Laravel\Sentry')
                || class_exists($class = '\Cartalyst\Sentinel\Laravel\Facades\Sentinel')
            ) {
                return ($class::check()) ? $class::getUser()->id : null;
            }elseif( \Auth::guard($this->authGuardName)->check())  {
                return \Auth::guard($this->authGuardName)->user()->getAuthIdentifier();
            }elseif(\Auth::check()){
                return \Auth::user()->getAuthIdentifier();
            }
        } catch (\Exception $e) {
            return null;
        }

        return null;
    }


}
