<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    const ROLE_USER = 'user';
    const ROLE_ADMIN = 'admin';
    const ROLES = [
        self::ROLE_USER, self::ROLE_ADMIN
    ];
    
    const GRADE_NONE='none';
    const GRADE_DIPlOMA='diploma';
    const GRADE_ASSOCIATE='associate';          
    const GRADE_BACHELOR='bachelor';
    const GRADE_MASTER='master';
    const GRADE_DOCTORAL='doctoral';
    const GRADES=[
        self::GRADE_NONE => 'زیر ددیپلم',
        self::GRADE_DIPlOMA => 'دیپلم',
        self::GRADE_ASSOCIATE => 'کاردانی',
        self::GRADE_BACHELOR => 'کارشناسی',
        self::GRADE_MASTER => 'کارشناسی ارشد',
        self::GRADE_DOCTORAL => 'دکتری'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName','email', 'password','major','university',
        'phoneNumber','SN','fatherName','birthday','gender','avatar','role',
        'city','grade'
    ];

    protected $date=['birthday'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //بازگرداندن نام و نام خانوادگی
    public function getFullNameAttribute(){

        return $this->firstName.' '.$this->lastName;
    }
    //هر کاربر می تواند چندین پرداختی داشته باشد
    public function cashes(){

        return $this->hasMany(Cash::class);
    }
    //باز گرداندن تحصیلات
    public function getEducationAttribute(){
        $education='';
        if($this->grade!='none'){
            foreach (self::GRADES as $grade => $value) {
                if($this->grade==$grade){
                    $education.=$value;
                }
            }
        }
        return $education.' '.$this->major;
    }
    //هر کاربر می تواند در چندید رویداد شرکت کند
    public function events(){

        return $this->belongsToMany(Event::class);
    }

    public function isAdmin(){
        return $this->role == self::ROLE_ADMIN;
    }

    public function isUser(){
        return $this->role == self::ROLE_USER;
    }
}
