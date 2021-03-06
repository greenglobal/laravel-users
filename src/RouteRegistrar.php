<?php

namespace GGPHP\Users;

use GGPHP\Core\RouteRegistrar as CoreRegistrar;

class RouteRegistrar extends CoreRegistrar
{
    /**
     * The namespace implementation.
     */
    protected static $namespace = '\GGPHP\Users\Http\Controllers';

    /**
     * Register routes for bread.
     *
     * @return void
     */
    public function all()
    {
        $this->forGuest();
        $this->forUser();
    }

    /**
     * Register the routes needed for managing clients.
     *
     * @return void
     */
    public function forGuest()
    {
        $this->router->group(['middleware' => []], function ($router) {
            \Route::post('oauth/token', 'AccessTokenController@issueToken')->name('login');
            \Route::post('password/forgot/request', 'ForgotPasswordController@getResetToken');
            \Route::post('password/forgot/reset', 'ResetPasswordController@reset');
        });
    }

    /**
     * Register the routes needed for managing clients.
     *
     * @return void
     */
    public function forUser()
    {
        $this->router->group(['middleware' => []], function ($router) {
            \Route::group(['middleware' => 'auth:api'], function () {
                //users
                \Route::get('users', [
                    'uses' => 'UserController@index',
                ]);

                \Route::post('users', [
                    'uses' => 'UserController@store',
                ]);

                \Route::put('users/{id}', [
                    'uses' => 'UserController@update',
                ]);

                \Route::get('users/{id}', [
                    'uses' => 'UserController@show',
                ]);

                \Route::delete('users/{id}', [
                    'uses' => 'UserController@destroy',
                ]);

                \Route::get('me', 'AuthController@authenticated');
                \Route::post('logout', 'AuthController@logout');

                \Route::post('password/change', [
                    'uses' => 'ChangePasswordController@changePassword',
                ]);
            });
        });
    }

}
