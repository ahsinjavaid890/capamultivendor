@if(session()->has('message'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    $( document ).ready(function() {
         Swal.fire({
          icon: 'success',
          title: '{{ session()->get('message') }}'
        })
    });
</script>
@endif 
@if(session()->has('warning'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
     $( document ).ready(function() {
        var value = "{{ session()->get('warning') }}"
         Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: value
        })
    });
</script>
@endif
