@if(Session::has('info'))

<div class="alert alert-info" >
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	 {{Session::get('info')}}
	
</div>


@endif