@extends('layouts.admin')

@section('content')
    @include('layouts.users_nav')

    <h2>Reviews</h2>
    <table id="review" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" width="100%">
      <thead>
          <tr>
            <td><b>ID</b></td>
            <td><b>Reviewed Product</b></td>
            <td><b>Title</b></td>
            <td><b>Reviewer</b></td>
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
            <td>{{@User::find($review->user_id)->first_name}}</td>
            <td>{{$review->content}}</td>
            <td>{{$review->rating}}</td>
            <td>{{$review->flag}}</td>
            <td><a href="{{url('admin/user/deletereview/'.$review->id)}}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
          </tr>
        @endforeach
      </tbody>
    </table>

@stop

@section('page_script')
<script>
    $(document).ready(function() {
    $('#review').dataTable();
} );
</script>
@stop

