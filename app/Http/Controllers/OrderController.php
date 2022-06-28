<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function create(){
        //  return the Order page
        Inertia::render('MugCreation');
    }
    public function place(){
        // function to place the order, after which it will be stored.
    }
    public function store(){
        // Save order.
    }

    /* {-------------}
       {ADMIN SECTION}
       {-------------}
    */
    // get orders
    public function index(){
    }
    public function show(){}
    public function edit(){}
    public function update(){}

    // no destroy, orders may never be destroyed for secretarial reasons.
    //    public function destroy(){}

}
