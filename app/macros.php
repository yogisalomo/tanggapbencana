<?php

/*
|--------------------------------------------------------------------------
| Application Macros & Testing Routes
|--------------------------------------------------------------------------
|
|
*/

HTML::macro('nav_link', function($routes, $text) {

    $link = explode('/', Request::path());

    foreach($routes as $route){
        if ($link[1] == $route){
            $active = "class = 'active'";
            break;
        } else
            $active = '';
    }

    return '<li '.$active.'><a href="'.url('admin/'.$route.'').'"><i class="fa fa-folder"></i><span>'.$text.'</span></a></li>';
});

HTML::macro('nav_menu', function($route, $text) {
    if(Request::is("*/".$route."/*") || Request::is("*/".$route)){
        $active = "class = 'active'";
    } else {
        $active = '';
    }
    /*
    $link = explode('/', Request::path());
    if ($link[count($link)-2].'/'.$link[count($link)-1] == $route)
        $active = "class = 'active'";
    else
        $active = '';
    */
    return '<li '.$active.'><a href="'.url('admin/'.$route).'">'.$text.'</a></li>';
});

/* Menu items macro in frontend */

HTML::macro('menu_items_by_type', function($type) {
    $result = "";

    foreach (MenuItem::getActiveMenus($type) as $menu) {
        $result .= "<li><a href='".url($menu->url)."'>".$menu->title."</a></li>";
    }

    return $result;
});



//Testing
Route::get('test', function(){
    //echo AppConfig::getData('order', 'na');
    print_r(AppConfig::getStatusList('article'));
});

Route::get('force_login', function() {
    Auth::loginUsingId(4);
    return 'OK!';
});

Route::get('setpass', function() {
    $user = User::find(2);
    $user->password = Hash::make('hehehe');
    $user->save();
    return 'OK!';
});

Route::get('createdummy', function(){
    $user = User::find(3);
    $user->username = 'test';
    $user->password = Hash::make('test');
    $user->save();
    return 'OK!';
});

Route::get('fixadmin', function(){
    //harits
    $user = User::find(1);
    $user->role = "admin";
    $user->save();

    //yogi
    $user = User::find(2);
    $user->role = "admin";
    $user->save();

    //test
    $user = User::find(3);
    $user->role = "admin";
    $user->save();

    return "OK!";
});

Route::get('test_add_escrow', function(){
    Escrow::add(4, 40, "ini adalah info yey");
    return "OK!";
});
