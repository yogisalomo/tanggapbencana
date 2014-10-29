@extends ('layouts.admin')

@section('content')
    @include('layouts.users_nav')
    <div class="row">
        <h2><b>{{$user->username}}</b></h2>
    </div>
    <div id="user-profile-1" class="user-profile row">
        <div class="col-xs-12 col-sm-3 center">
            <div>
                <span class="profile-picture">
                    <img id="avatar" class="editable img-responsive" onError="this.onerror=null;this.src='http://upload.wikimedia.org/wikipedia/commons/d/d3/User_Circle.png';" src="{{asset('profilepicture/'.$user->picture)}}" />
                </span>
                <div class="space-4"></div>

                <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                    <div class="inline position-relative">
                        <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-circle light-green middle"></i>
                            &nbsp;
                            <span class="white">{{$user->first_name}} {{$user->last_name}}</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="space-6"></div>

        </div>
        <div class="col-xs-12 col-sm-9">
            <table id="user" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" width="100%">
                  <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{$user->id}}</td>
                        </tr>
                        <tr>
                            <td>First Name</td>
                            <td>{{$user->first_name}}</td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td>{{$user->last_name}}</td>
                        </tr>
                        <tr>
                            <td>Birth Date</td>
                            <td>{{$user->birthdate}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Address</b></td>
                        </tr>
                        <tr>
                            <td>&nbsp;Street</td>
                            <td>{{$user->address_street}}</td>
                        </tr>
                        <tr>
                            <td>&nbsp;City</td>
                            <td>{{$user->address_city}}</td>
                        </tr>
                        <tr>
                            <td>&nbsp;Province</td>
                            <td>{{$user->address_province}}</td>
                        </tr>
                        <tr>
                            <td>&nbsp;Country</td>
                            <td>{{$user->address_country}}</td>
                        </tr>
                        <tr>
                            <td>Newsletter</td>
                            <td>
                                @if ($user->newsletter ===1)
                                    <img widht="5%" height="5%" src="{{asset('backend/img/tick1.png')}}" />
                                @else
                                    <img widht="5%" height="5%" src="{{asset('backend/img/tick0.png')}}" />
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>{{$user->phone_number}}</td>
                        </tr>
                        <tr>
                            <td>Registration Date</td>
                            <td>{{$user->registration_date}}</td>
                        </tr>
                        <tr>
                            <td>Active</td>
                            <td>
                                @if ($user->is_active ===1)
                                    <img widht="5%" height="5%" src="{{asset('backend/img/tick1.png')}}" />
                                @else
                                    <img widht="5%" height="5%" src="{{asset('backend/img/tick0.png')}}" />
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Last Visit</td>
                            <td>{{$user->last_visit}}</td>
                        </tr>
                  </tbody>
            </table>
        </div><!-- /span -->
    </div>
    <div class="row">
        <h2> {{$user->username}}'s Orders </h2>
        <table id="order" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" width="100%">
          <thead>
              <tr>
                <td><b>ID</b></td>
                <td><b>Courier</b></td>
                <td><b>Status</b></td>
                <td><b>Order Date</b></td>
                <td><b>Total Price</b></td>
                <td><b>Payment Date</b></td>
                <td><b>Payment Method</b></td>
                <td><b>Payment Confirmed</b></td>
                <td><b>Menu</b></td>
              </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
              <tr>
                <td>{{$order->id}}</td>
                <td>{{Courier::find($order->courier_id)->company_name}}</td>
                <td>{{$order->status}}</td>
                <td>{{$order->order_date}}</td>
                <td>{{$order->totalprice}}</td>
                <td>{{$order->payment_date}}</td>
                <td>{{AppConfig::getStatusName('payment', $order->payment_method)}}</td>
                <td>{{ ($order->payment_confirmed == 1 ? "Yes" : "No")}}</td>
                <td><a href="{{url('admin/order/update/'.$order->id)}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;<a href="{{url('admin/order/delete/'.$order->id)}}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>
    <div class="row">
        <h2> {{$user->username}}'s Product Reviews </h2>
        <table id="review" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" width="100%">
              <thead>
                  <tr>
                    <td><b>ID</b></td>
                    <td><b>Reviewed Product</b></td>
                    <td><b>Title</b></td>
                    <td><b>Content</b></td>
                    <td><b>Rating</b></td>
                    <td><b>Flag</b></td>
                    <td><b>Menu</b></td>
                  </tr>
              </thead>
              <tbody>
                @foreach($reviews as $review)
                  <tr>
                    <td>{{$review->id}}</td>
                    <td>{{@Product::find($review->product_id)->name}}</td>
                    <td>{{$review->title}}</td>
                    <td>{{$review->content}}</td>
                    <td>{{$review->rating}}</td>
                    <td>{{$review->flag}}</td>
                    <td><a href="{{url('admin/user/deletereview/'.$review->id)}}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
                  </tr>
                @endforeach
              </tbody>
        </table>
    </div>

    <div class="row">
        <h2> {{$user->username}}'s Seller Reviews </h2>
        <table id="review" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" width="100%">
              <thead>
                  <tr>
                    <td><b>ID</b></td>
                    <td><b>Reviewer</b></td>
                    <td><b>Title</b></td>
                    <td><b>Content</b></td>
                    <td><b>Rating</b></td>
                    <td><b>Flag</b></td>
                    <td><b>Menu</b></td>
                  </tr>
              </thead>
              <tbody>
                @foreach($sellerreviews as $review)
                  <tr>
                    <td>{{$review->id}}</td>
                    <td>{{@$review->user->getFullName()}}</td>
                    <td>{{$review->title}}</td>
                    <td>{{$review->content}}</td>
                    <td>{{$review->rating}}</td>
                    <td>{{$review->flag}}</td>
                    <td><a href="{{url('admin/user/deletesellerreview/'.$review->id)}}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
                  </tr>
                @endforeach
              </tbody>
        </table>
    </div>
@stop

@section('page_script')
    <script>
    $(function() {
        $( "#order" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear: true,changeMonth: true,defaultDate: new Date('1990-01-01')});
    });
    </script>
@stop
