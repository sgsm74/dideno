<?php

namespace App\Services\Bank;

use App\Cash;
use App\User;
use Illuminate\Http\Request;

interface Bank
{

    /**
     * @param $amount  تومان
     * @param $role
     * @param User $user
     * @return view   for  pay(1.get token from bank and return view for pay)
     */
    function gateway(User $user, Cash $cash);


    //Verify result from bank    and  return   temp  cash  if  exist  else return  null(error)

    /**
     * @param Request $request from bank
     * @param User $user
     * @param Cash $cash
     * @return ['msg' => $this-> ...., 'success'=>...]
     *   =>masg( masg from bank and mas for  not valid request )
     *  => success=(return true if  success)
     */
    function paymentVerification(Request $request, User $user,Cash $cash);

    /**
     * @param Request $request  from bank
     * @param Cash $cash  cash that $rquest is for it
     * @param $role
     * @return ['msg' => $this-> ...., 'success'=>...,referenceId=>]
     *   =>masg( masg from bank and mas for  not valid request )
     *  => success=(return true if  success)
     */
    function paymentVerify(Request $request, Cash $cash);

    /**
     * @param $code code from bank
     * @return mixed  msg
     */
    function resultCode($code);

}