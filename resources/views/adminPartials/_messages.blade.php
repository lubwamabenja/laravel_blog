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

@if(Session::has('failure'))

<div class="alert alert-danger alert-mg-b alert-success-style4 alert-st-bg3">
    <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
        <span class="icon-sc-cl" aria-hidden="true">&times;</span>
    </button>
    <span class="adminpro-icon adminpro-danger-error admin-check-sucess admin-check-pro-clr3"></span>
    <p><strong>Failure</strong>{{ Session::get('failure')}} </p>
</div>


@endif

<script>
    setTimeout(function(){
        $('#success').fadeOut('fast');
    },3000);
    setTimeout(function(){
        $('#failure').fadeOut('fast');
    },3000);
</script>
