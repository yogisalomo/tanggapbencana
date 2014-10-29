<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends GenericModel implements UserInterface,RemindableInterface{

    use UserTrait, RemindableTrait;

    public $table = 'users';

    public $fillable = [
        'username',
        'password',
        'picture',
        'first_name',
        'last_name',
        'birthdate',
        'address_street',
        'address_city',
        'address_province',
        'address_country',
        'newsletter',
        'phone_number',
        'email',
        'last_visit',
        'role',
        'status',
        'is_premium',
        'premium_expired_date',
        'registration_date',
        'escrow_amount'
    ];

    public $rules = [
        'username'=> 'required|unique:users',
        'password' => 'required|between:8,25',
        'first_name'=>'required',
        'last_name'=>'required',
        'role'=>'required',
        'registration_date'=>'required',
        'last_visit'=>'required',
        'birthdate'=> 'required|date',
        'email'=> 'required|email|unique:users',
        'phone_number'=>'required'
    ];

    protected $hidden = array('password', 'remember_token');

    public function scopeBuyers($query){
        return $query->where('role', '=', "buyer");
    }

    public function scopeSellers($query){
        return $query->where('role', '=', "seller");
    }

    public function scopeCses($query){
        return $query->where('role', '=', "cs");
    }

    public function scopeAdmins($query){
        return $query->where('role', '=', "admin");
    }


    public function getPremiumExpiredDate(){
        return ($this->premium_expired_date ? date("d m Y", strtotime($this->premium_expired_date)) : "N/A");
    }

    public function getEscrowAmount(){
        return ($this->escrow_amount ? $this->escrow_amount : "0");
    }

    public static function getName($id){
        $user = User::find($id);
        if($user){
            return $user->first_name . " " . $user->last_name;
        } else {
            return "Tidak ditemukan";
        }
    }

    public function getFullName() {
        return $this->first_name . " " . $this->last_name;
    }

    public function getPremium(){
        return (($this->is_premium != null) ? ($this->is_premium == 1 ? "Yes" : "No") : "No");
    }

    public static function getFormalRoleName($role_code){
        $roles = [ ['admin', 'Administrator'], ['cs officer', 'Customer Service'], ['buyer', 'Buyer'], ['seller', 'Seller'] ];
        foreach($roles as $role){
            if($role_code == $role[0]){
                return $role[1];
            }
        }
        return "Role not found";
    }

    public function getValidOrders($range){
        $count = 0;

        $orders = Order::where('user_id', '=', $this->id)->get();
        foreach($orders as $order){
            if($order->isOnRange($range)){
                $count++;
            }
        }
        return $count;
    }

    public function getMoneySpent($range){
        $orders = Order::where('user_id', '=', $this->id)->get();
        $moneyspent = 0;
        foreach($orders as $order){
            if($order->isOnRange($range)){
                $moneyspent += $order->totalprice;
            }
        }

        return $moneyspent;
    }

    public static $range = null;

    public static function setRange($val){
        //echo "Range set with: " . $val;
        self::$range = $val;
    }

    public static function getRange(){
        return self::$range;
    }

    public function updateLastvisit(){
        $date = new datetime;
        $date->setTimezone(new DateTimeZone('Asia/Jakarta'));
        $this->last_visit = $date;
        $this->save();
        return true;
    }

    public static function getSellerList(){
        $sellers = User::sellers()->lists('first_name', 'id');

        return $sellers;
    }

    public function checkTheProduct($product_id) {
        $myproducts = Order::select('orders.*')
            ->rightJoin('ordered_items', function($j) {
                $j->on('ordered_items.order_id', '=', 'orders.id');
            })->where('ordered_items.product_id', $product_id)
            ->where('orders.user_id', $this->id)->count();
        return $myproducts;
    }
}
