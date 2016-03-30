@if( Session::has('flash_success') )
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('flash_success') }}
            </div>
        </div>
    </div>
@endif