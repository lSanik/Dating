@if( Session::has('flash-warning') )
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="warning alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('flash-warning') }}
            </div>
        </div>
    </div>
@endif