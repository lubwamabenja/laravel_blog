@extends('admin')

@section('content')
<div id="DangerModalftblack" class="modal modal-adminpro-general FullColor-popup-DangerModal PrimaryModal-bgcolor fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <span class="adminpro-icon adminpro-danger-error modal-check-pro information-icon-pro"></span>
                <h2>Danger!</h2>
                <p>The Modal plugin is a dialog box/popup window that is displayed on top of the current page</p>
            </div>
            <div class="modal-footer footer-modal-admin">
                <a data-dismiss="modal" href="#">Cancel</a>
                <a href="#">Process</a>
            </div>
        </div>
    </div>
</div>
@endsection
