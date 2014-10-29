<?php

class UserController extends BaseController {

    public function getIndex()
    {
        $users = User::all();

        return View::make('backend.admin.users.index', array('users' => $users));
    }

    public function getBuyer()
    {
        $users = User::where('role', 'buyer')->get();

        return View::make('backend.admin.users.index', array('users' => $users));
    }

    public function getSeller()
    {
        $users = User::where('role', 'seller')->get();

        return View::make('backend.admin.users.index', array('users' => $users));
    }

    public function getCsofficer()
    {
        $users = User::where('role', 'cs officer')->get();

        return View::make('backend.admin.users.index', array('users' => $users));
    }

    public function getAdmin()
    {
        $users = User::where('role', 'admin')->get();

        return View::make('backend.admin.users.index', array('users' => $users));
    }

    public function getView($id){
        $user = User::find($id);
        $orders = Order::where('user_id',$id)->get();
        $sellerreviews = SellerReview::where('seller_id',$id)->get();
        $reviews = Review::where('user_id',$id)->get();

        return View::make('backend.admin.users.view', array('user'=>$user,'orders'=>$orders,'reviews'=>$reviews,'sellerreviews'=>$sellerreviews));
    }

    public function getShowprofile($id){
        $user = User::find($id);
        $orders = Order::where('user_id',$id)->get();
        $reviews = Review::where('user_id',$id)->get();

        return View::make('backend.admin.users.profile', array('user'=>$user,'orders'=>$orders,'reviews'=>$reviews));
    }
    public function getCreate()
    {
        $user = new User();
        return View::make('backend.admin.users.form')->with('user', $user);
    }

    public function postCreate() {
        $input = Input::all();
        $user = new User();
        if(!$user->fill($input)->isValid()){
             if(Input::get('message') == 'frontend')
                return Redirect::to('user/register')->with('errors', $user->getError())->withInput(Input::except('password'));
            return Redirect::to('admin/user/create')->with('errors', $user->getError())->withInput(Input::except('password'));            
        } else {
            $user->fill($input);
            if (Input::hasFile('picture')){
                if (Input::file('picture')->isValid()){
                    $file = Input::file('picture');

                    $destinationpath = public_path().'/profilepicture';
                    $extension = Input::file('picture')->getClientOriginalExtension();
                    $filename = str_random(30).".{$extension}";
                    $upload_success = Input::file('picture')->move($destinationpath, $filename);
                    if( $upload_success ) {
                        $user->picture = $filename;
                    }
                }
            }
            $user->password = Hash::make($user->password);
            $date = new datetime;
            $user->registration_date = $date;
            $user->last_visit = $date;
            $user->is_active = 1;
            $user->save();
            if(Input::get('message') == 'frontend')
                return View::make('frontend.registersuccess');
            return Redirect::to('admin/user');
        }
    }

    public function getUpdate($id) {
        $user = User::find($id);
        if ($user == null) return App::abort(404);
        return View::make('backend.admin.users.form')->with('user', $user);
    }

    public function postUpdate($id) {
        $input = Input::all();
        $user = User::find($id);
        if(!$user->fill($input)->isValid('update')){
            return Redirect::to('admin/user/update/'.$id)->with('errors', $user->getError())->withInput(Input::except('password'));
        }
        else{
            if ($user == null) App::abort(404);
            $user->fill($input);
            if (Input::hasFile('picture')){
                if (Input::file('picture')->isValid()){
                    $file = Input::file('picture');

                    $destinationpath = public_path().'/profilepicture';
                    $extension = 'jpg';
                    $filename = str_random(30).".{$extension}";
                    $upload_success = Input::file('picture')->move($destinationpath, $filename);
                    if( $upload_success ) {
                        $user->picture = $filename;
                    }
                }
            }
            $user->save();
            if (Auth::user()->role==='admin'){
                return Redirect::to('admin/user');
            }
            else{
                return Redirect::to('user/showprofile/'.$user->id);
            }
        }
    }


    public function getDelete($id) {
        $user = User::find($id);
        if ($user == null) return App::abort(404);
        $user->delete();
        return Redirect::to('admin/user');
    }

    public function getReview(){
        $reviews = Review::all();
        return View::make('backend.admin.users.listreview')->with('reviews',$reviews);
    }

    public function postReview()
    {
        $input = Input::all();
        $review = new Review();
        if(!$review->fill($input)->isValid()){
            return Redirect::back()->with('errors', $review->getError())->withInput(Input::all());
        }
        $review->save();
        return Redirect::back();
    }

    public function postSellerreview()
    {
        $input = Input::all();
        $review = new SellerReview();
        if(!$review->fill($input)->isValid()){
            return Redirect::back()->with('errors', $review->getError())->withInput(Input::all());
        }
        $review->save();
        return Redirect::back();
    }

    public function getDeletereview($id)
    {
        Review::find($id)->delete();
        return Redirect::back();
    }

    public function getDeletesellerreview($id)
    {
        SellerReview::find($id)->delete();
        return Redirect::back();
    }

    public function getActivate($id){
        $user = User::find($id);
        if($user->status === "inactive"){
            $user->status = "active";
        } else if($user->status === "active"){
            $user->status = "inactive";
        }

        $user->save();
        return Redirect::to('admin/user');
    }

    public function getActivatepremium($id){
        $user = User::find($id);
        if($user->role == "seller"){
            if($user->is_premium===0){
                $user->is_premium = 1;
            }
            else{
                $user->is_premium = 0;
            }
            $user->save();
        }
        return Redirect::to('admin/user');
    }

    public function getFlag($id){
        $flag = new UserFlag();
        $flag->flagger_id = Auth::user()->id;
        $flag->user_id = $id;
        $flag->status = "not_responded";
        $flag->save();
        return Redirect::to('admin/user/index');
    }

    public function getRegister()
    {
        $user = new User();
        return View::make('frontend.register')->with('user', $user);;
    }

    public function getRegistersuccess()
    {
        return View::make('frontend.registersuccess');
    }

}
