@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-home"></i> Guest Book</div>

                <div class="panel-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" />
                    </div>             
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" id="address" />
                    </div>   
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" id="phone" />
                    </div>  
					<div class="form-group">
                        <label>Note</label>
                        <input type="text" class="form-control" id="note" />
                    </div>           
                </div>
				<div class="panel-footer">
					<button class="btn btn-success" id="btnSave" onclick="SaveData()">Save</button>
				</div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection

@section('before-scripts-end')
<script>
	function SaveData()
	{
		if($('#name').val() == '')
		{
			alert('Name cannot be empty');
			return false;
		}
		if($('#address').val() == '')
		{
			alert('Address cannot be empty');
			return false;
		}
		
		$.ajax({
		  url:'{{ url("guest/guest-book/add") }}', 
		  type:'POST',
		  data:{
			'_token':'{{ csrf_token() }}', 
			'name':$('#name').val(),
			'address':$('#address').val(),
			'phone':$('#phone').val(),
			'note':$('#note').val()
		  },
		  success: function (res) {
			if(res.response == 'Success')
			{
				$('#name').val('');
				$('#address').val('');
				$('#phone').val('');
				$('#note').val('');
				alert('Data Saved');
			}
		  },
		  error: function(a, b, c){
			alert(c);
		  }
		});
	}
</script>
@endsection