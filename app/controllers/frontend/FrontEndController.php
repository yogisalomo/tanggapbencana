<?php

class FrontEndController extends BaseController {

    public function getIndex()
    {
        $articles = Article::orderBy('created_at','desc')->take(3)->get();
        $latestproducts = Product::orderBy('created_at','desc')->take(3)->get();
        $popularproducts = Product::orderBy('num_order','desc')->take(3)->get();
        $categories = Category::all();
        return View::make('frontend.index')->with(array('categories'=>$categories,'articles'=>$articles,'latestproducts'=>$latestproducts,'popularproducts'=>$popularproducts));
    }

    public function getContactUs()
    {
        $categories = Category::all();
        return View::make('frontend.contactus')->with('categories', $categories);
    }

    public function getCategory($category_id)
    {
        $products = Product::where('category_id', $category_id)->get();
        $categories = Category::all();
        Return View::make('frontend.category')->with('categories', $categories)->with('products', $products);
    }

    public function getDetail($product_id)
    {
        $categories = Category::all();
        $product = Product::find($product_id);
        $sellerreviews = SellerReview::where('seller_id', @$product->seller->id)->get();
        $reviews = Review::where('product_id', $product_id)->get();
        $pictures = ProductPicture::where('product_id', $product_id)->get();
        $product->num_view++;
        $product->save();
        if (@Auth::user()->id) {
            ProductVisit::create([
                'user_id' => Auth::user()->id,
                'product_id' => $product_id,
            ]);
        }
        return View::make('frontend.detail')
            ->with('categories', $categories)
            ->with('product', $product)
            ->with('reviews', $reviews)
            ->with('sellerreviews', $sellerreviews)
            ->with('pictures', $pictures);
    }

    public function getSendmessage()
    {
        $categories = Category::all();
        $contactmessage = new ContactMessage();
        return View::make('frontend.contactus')->with(array('contactmessage'=>$contactmessage,'categories'=>$categories));
    }

    public function postSendmessage() {
        $input = Input::all();
        $categories = Category::all();
        $contactmessage = new ContactMessage();
        if(!$contactmessage->fill($input)->isValid()){
            return Redirect::to('/contactus')->with(array('categories'=>$categories,'errors'=> $contactmessage->getError()))->withInput(Input::all());
        }
        else{
            $contactmessage->fill($input);
            $contactmessage->status = "not_responded";
            $contactmessage->save();
            return Redirect::to('/contactus')->with('categories',$categories);
        }
    }

    public function getPosts(){
        $categories = Category::all();
        $articles = Article::orderBy('created_at','desc')->get();

        return View::make('frontend.post', array('articles' => $articles,'categories'=>$categories));
    }

    public function getSearch(){
        if ($q = Input::get('q')) {
            $products = Product::leftJoin('brands', function($j) {
                $j->on('products.brand_id', '=', 'brands.id');
            })
            ->select('products.*')
            ->where('products.name', 'like', '%'.$q.'%')->orWhere('brands.name', 'like', '%'.$q.'%');
            if ($sort = Input::get('sort')) {
                switch ($sort) {
                    case 'price-asc':
                        $products->orderBy('original_price', 'asc');
                        break;
                    case 'price-desc':
                        $products->orderBy('original_price', 'desc');
                        break;
                }
            }
            if ($cat = Input::get('cat')) {
                $products->where('category_id', $cat);
            }
            $products = $products->get();
            $categories = Category::all();
            return View::make('frontend.search')->with('categories', $categories)->with('products', $products)->with('q', $q);
        }
        return Redirect::to('/');
    }

    public function getOrders(){
        //Login Error. Nanti ganti user ID nya menjadi ID pada session
        $orders = Order::where('user_id','=',1)->get();
        $categories = Category::all();
        return View::make('frontend.trackorder')->with(array('orders'=>$orders,'categories'=>$categories));
    }

    public function getPayments(){
        $itemlist = array ();
        //Login Error. Nanti ganti user ID nya menjadi ID pada session
        $paymentconfirmations = PaymentConfirmation::where('is_confirmed', 1)->get();
        foreach($paymentconfirmations as $paymentconfirmation){
            $temp = OrderedItem::where('order_id','=',$paymentconfirmation->order_id)->get();
            foreach($temp as $t) {
                $prod = Product::find($t->product_id);

                    //Ini nanti ubah jadi ID dari User Seller yang memiliki Session. Login lagi error
                    // if($prod->seller_id==1){
                        //Simpan Informasi Pembelinya
                        $buyer = User::find(Order::find($paymentconfirmation->order_id)->user_id);
                        $buyerinfo = array(
                            "id"=> $buyer->id,
                            "firstname"=> $buyer->first_name,
                            "lastname"=> $buyer->last_name,
                            "address_street"=> $buyer->address_street,
                            "address_city"=> $buyer->address_city,
                            "address_province"=> $buyer->address_province,
                            "address_country"=> $buyer->address_country,
                        );
                        $iteminfo = array(
                            "buyer"=>$buyerinfo,
                            "ordereditem"=>$t);
                        array_push($itemlist, $iteminfo);
                    //}
                }
            }
        $categories = Category::all();
        return View::make('frontend.paymentconfirmation')->with(array('categories'=>$categories,'itemlist'=>$itemlist));

    }

    public function getPaymentform(){
        $paymentconfirmation = new PaymentConfirmation();
        $categories = Category::all();
        return View::make('frontend.sendconfirmation')->with(array('categories'=>$categories,'paymentconfirmation'=>$paymentconfirmation));
    }

    public function sendPaymentform(){
        $input = Input::all();
        $paymentconfirmation = new PaymentConfirmation();
        if(!$paymentconfirmation->fill($input)->isValid()){
            return Redirect::to('sendconfirmation')->with('errors', $paymentconfirmation->getError())->withInput(Input::all());
        }
        else{
            $paymentconfirmation->fill($input);
            $paymentconfirmation->is_confirmed = false;
            $paymentconfirmation->save();
            return 'Payment confirmation has been sent';
        }
    }
}
