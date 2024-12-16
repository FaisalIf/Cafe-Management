<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\User;
use Auth;
use App\Models\ManuItems;
use App\Models\Promotions;
use Session;

class CartController extends Controller
{
    public function __construct() {
        $this->middleware('auth:customer');
    }

    public function viewCart() {
        $userID = Auth::guard('customer')->user()->customer_id;
        return view('cart.view',['userID' => $userID]);
    }

    public function addToCart(Request $request) {


        $userID = Auth::guard('customer')->user()->customer_id;
        $Product = ManuItems::find($request->id);
        Cart::session($userID)->add(array(
                'id' => $Product->id,
                'name' => $Product->name,
                'price' => $Product->price,
                'quantity' => $request->quantity,
                'attributes' => array(),
                'associatedModel' => $Product
        ));

        return redirect()->back();



    }

    public function removeFromCart($id) {

        $userID = Auth::guard('customer')->user()->customer_id;
        // Cart::session($userID)->remove($id);
        Cart::session($userID)->clear();
        return redirect()->back();
    }

    public function updateCart(Request $request) {

        $userID = Auth::guard('customer')->user()->customer_id;
        Cart::session($userID)->update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));
        return redirect()->back();
    }

    public function addPromoCode(Request $request) {

        $userID = Auth::guard('customer')->user()->customer_id;

        $promo = Promotions::where('name', $request->code)->first();

        if(!$promo) {
            return redirect()->back()->with('error', 'Invalid promo code!');
        }

        $discount = "-".$promo->discount_percentage."%";

        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => $promo->name,
            'type' => 'promo',
            'target' => 'total',
            'value' => $discount,
        ));

        Cart::session($userID)->condition($condition);

        return redirect()->back();
    }

    public function removePromoCode() {
        $userID = Auth::guard('customer')->user()->customer_id;
        Cart::session($userID)->clearCartConditions();
        return redirect()->back();
    }

    public function addDemo() {

        $userID = Auth::guard('customer')->user()->customer_id;
        $Product = ManuItems::inRandomOrder()->first();


        Cart::session($userID)->add([
            'id' => $Product->item_id,
            'name' => $Product->name,
            'price' => $Product->price,
            'quantity' => 1,
            'attributes' => [],
            'associatedModel' => $Product,
        ]);



        return redirect()->back();
    }


}
