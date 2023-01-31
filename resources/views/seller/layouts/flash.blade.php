<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
@if ($message = Session::get('error'))
<script type="text/javascript">
    $( document ).ready(function() {
         Swal.fire({
          icon: 'error',
          title: '{{ $message }}'
        })
    });
</script>
@endif


@if ($message = Session::get('warning'))
<script type="text/javascript">
    $( document ).ready(function() {
         Swal.fire({
          icon: 'warning',
          title: '{{ $message }}'
        })
    });
</script>
@endif


@if ($message = Session::get('info'))
<script type="text/javascript">
    $( document ).ready(function() {
         Swal.fire({
          icon: 'info',
          title: '{{ $message }}'
        })
    });
</script>
@endif


@if ($errors->any())
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>	
	Please check the form below for errors
</div>
@endif