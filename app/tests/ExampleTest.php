<?php

class ExampleTest extends TestCase {

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function check($method, $url){
        echo "Checking " . $method . " " . $url . "\n";
        $this->call($method, $url);
        echo "Checked.\n";
    }

    public function testBackendAdmin()
    {
        $routes = [
            //'admin/user/index',
            //'admin/user/buyer',
            //'admin/user/seller',
            //'admin/user/csofficer',
            //'admin/user/admin',
            //'admin/user/view/{id}',
            //'admin/user/showprofile/{$id}',
            'admin/user/create',
            'admin/user/update',
            'admin/user/review',
            'admin/user/register',
            'admin/user/registersuccess',
        ];

        Route::enableFilters();
        Auth::loginUsingId(5);

        foreach($routes as $route){
            $this->check('GET', $route);
        }
    }

}
