<?php

namespace GGPHP\Users\Models;

use GGPHP\Core\Models\CoreModel;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends CoreModel implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Notifiable, HasApiTokens, CanResetPassword;
    use Authorizable, CanResetPassword, MustVerifyEmail;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'email', 'password',
    ];

}
