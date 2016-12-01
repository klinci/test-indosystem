@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-home"></i> Gallery</div>
				
				@if(count($guestbooks) == 0)
					{{ 'No record found' }}
				@else
					@foreach($guestbooks as $guestbook)
					<div class="panel-body">
						<div class="col-md-3">
							<label>Name</label>
							<input type="text" class="form-control" id="name" value="{{$guestbook->name}}" disabled />
						</div>  
						@if(isset($role))
							<div class="col-md-3">
								<label>Address</label>
								<input type="text" class="form-control" id="address" value="{{$guestbook->address}}" disabled />
							</div>  							
							<div class="col-md-3">
								<label>Phone</label>
								<input type="text" class="form-control" id="phone" value="{{$guestbook->phone}}" disabled />
							</div> 
						@endif
						<div class="col-md-3">
							<label>Note</label>
							<input type="text" class="form-control" id="note" value="{{$guestbook->note}}" disabled />
						</div> 
						@if(isset($role))
							@if($role->role_id == '1')
								<div class="col-md-3">
									<button class="btn btn-danger" id="btnDelete" onclick="DeleteData({{$guestbook->id}})">Delete</button>
								</div> 	
							@endif
						@endif
					</div>
					@endforeach
				@endif
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection

@section('before-scripts-end')
<script>
function DeleteData(id)
{
	$.ajax({
		  url:'{{ url("guest/guest-book/delete") }}', 
		  type:'POST',
		  data:{
			'_token':'{{ csrf_token() }}', 
			'id':id
		  },
		  success: function (res) {
			if(res.response == 'Success')
			{
				alert('Data Deleted');
				location.reload();
			}
		  },
		  error: function(a, b, c){
			alert(c);
		  }
		});
}
</script>
@endsection