@extends('layouts.master')
 @push('header')
 <style type="text/css">
 .radio{
 	width: 23px!important;
 	height: 23px!important;
 }
 </style>
 @endpush
 @section('page-title')
 Create Attendances
 @endsection
 @section('content')
 <div class="col-lg-12">
 	<section class="box ">
 		<br>
 		<div class="content-body" style="background-color:#9ddac0;">
 			<form method="Post" action="{{url('/bio-attendance-post')}}" enctype="multipart/form-data" id="" name="">
 			<div class="row">
 				<div class="col-xs-12 col-sm-12 ">
 					<div class="col-sm-4">
 						<div class="form-group">
 							<label class="form-label">Date
 								<span style="color:red;">*</span>:
 							</label>
 							<span class="desc">&nbsp;</span>
 							<div class="controls">
 								<input type="text" placeholder="select date" readonly="" value="{{date('d-m-Y')}}" class="form-control datepicker" data-format="yyyy-mm-dd" id = "date" name = "date"/ required>
 							</div>
 						</div>
 					</div>
<!--  					<div class="col-sm-4">
 						<div class="form-group">
 							<label class="form-label">Upload File
 								<span style="color:red;">*</span>:
 							</label>
 							<span class="desc">&nbsp;</span>
 							<div class="controls">
 								<input type="file"  class="form-control datepicker"  id = "exl_file" name = "exl_file">
 							</div>
 						</div>
 					</div> -->
 				</div>
 			</div>
 			<div class="row">
 						<div class="col-xs-12">
 							<div class="pull-left">
 								<a href = "javascript:void(0);" onclick="submitData()" class="btn btn-success">Submit</a>
 							</div>
 						</div>
 					</div>
 					<div class="col-sm-9 save" id = "msg"></div>

 			<div class="clearfix"></div>
 			</form>
 		</div>
 	</section>
 </div>
 @endsection

 @push('footer')
 <script type="text/javascript">
 	function submitData(){
 		$.ajax({
 			url : '{{ route('biometric.store') }}',
 			type : 'post',
 			data : {date : $('#date').val()},
 			success : function(d){
 				$('#msg').html('Saving data Automatically...');
				window.setTimeout(function () {
					$('#msg').html('');
				},800);

 				},error : function(xhr){

				$('#msg').html('<p style = "color:red;">Something Went Wrong!!</p>');
				window.setTimeout(function () {
					$('#msg').html('');
				},800);
			}
 		});
 	}
 </script>
 @endpush