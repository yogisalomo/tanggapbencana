<?php

class HomeController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |   Route::get('/', 'HomeController@showWelcome');
    |
    */

    private function newOrderCount(){
        /* Newest order processing */
        $orders = Order::all();

        $count = 0;
        foreach($orders as $o){
            $curdate = date("d-m-Y", strtotime($o->created_at));
            if($curdate == date("d-m-Y")){
                $count++;
            }
        }

        return $count;
    }

    public function getIndex(){
        $countOrders = $this->newOrderCount();

        /* Funnel procesing */
        $statuses = array();

        $orders = Order::all()->sortBy(
            function($o){
                return $o->status;
            }
        );


        //echo "Count: " . count($orders) . "<br/>";
        if(count($orders) > 0){

            $count = 1;

            $first = true;
            foreach($orders as $o){
                if($first){
                    $cur_stat = $o->status;
                    $first = false;
                    continue;
                }

                //echo $o->status . " " . $cur_stat . "<br/>";
                if($o->status == $cur_stat){
                    $count++;
                } else {
                    //echo $cur_stat." ".$count."<br/>" ;
                    array_push($statuses, array($cur_stat, $count));
                    $cur_stat = $o->status;
                    $count = 1;
                }
            }

            array_push($statuses, array($cur_stat, $count));
        }

        //print_r($statuses);

        //echo "Count: " . count($statuses);

        return View::make('backend.admin.dashboard')->with('statuses', $statuses)->with('orderCount', $countOrders);
    }

    public function search($q) {
        $products = Product::where('name', 'like', '%'.$q.'%')->get();
        $users = User::where('first_name', 'like', '%'.$q.'%')->orWhere('last_name', 'like', '%'.$q.'%')->get();
        $suppliers = Supplier::where('name', 'like', '%'.$q.'%')->get();

        $json = [];
        foreach ($products as $item) {
            $json[] = link_to('admin/product/view/'.$item->id, 'Product: '.$item->name);
        }
        foreach ($users as $item) {
            $json[] = link_to('admin/user/view/'.$item->id, 'User: '.$item->first_name. ' '.$item->last_name);
        }
        foreach ($suppliers as $item) {
            $json[] = link_to('admin/supplier/view/'.$item->id, 'Supplier: '.$item->name);
        }
        return Response::json($json);
    }

    public function getDashboard(){
        return View::make('backend.admin.dashboard');
    }
}
