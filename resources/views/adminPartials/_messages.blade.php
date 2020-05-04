@if (Session::has('success'))
<div id="success">
<div class="alert alert-success alert-success-style1">
    <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
        <span class="icon-sc-cl" aria-hidden="true">&times;</span>
    </button>
    <span class="adminpro-icon adminpro-checked-pro admin-check-sucess"></span>
    <p><strong>Success:</strong> {{ Session::get('success')}}</p>
</div>
</div>

@endif

<script>
    setTimeout(function(){
        $('success').fadeOut('fast');
    },3000);
</script>
