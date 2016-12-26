<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const ROLE_MANAGE = 30;
    const ROLE_USER = 10;

    const SEX_MAN = 1;
    const SEX_WOMAN = 2;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function sexLabelList()
    {
        return [
            self::SEX_MAN => '男',
            self::SEX_WOMAN => '女'
        ];
    }

    public function getSexTextAttribute()
    {
        return empty($this->sex) ? '' : self::sexLabelList()[$this->sex];
    }

}
