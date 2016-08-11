@extends('admin.layout')

@section('styles')
    <!-- ink href="{{ url('/assets/css/bootstrap-reset.css') }}" rel="stylesheet" -->
    <link href="{{ url('/assets/css/fileinput.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/datepicker.css') }}" rel="stylesheet">



@stop

@section('content')

    <section class="panel">
        <header class="panel-heading">
            {{trans('/admin/index.addNewProfile')}}
        </header>
        <div class="panel-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#osn" aria-controls="osn" role="tab" data-toggle="tab">{{trans('/admin/index.mainInformation')}}</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">{{trans('/admin/index.profileInformation')}}</a></li>
            </ul>
            {!! Form::open(['url' => 'admin/girl/store', 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="osn">
                        <div class="col-md-4 col-md-offset-4">
                            <h3> {{trans('/admin/index.summaryProfile')}}</h3>
                            <div class="form-group">
                                {!! Form::label('avatar', trans("/admin/index.avatar")) !!}
                                <input type="file" class="form-control file" name="avatar" accept="image/*">
                            </div>
                            <div class="form-group">
                                {!! Form::label('first_name', trans('/admin/index.name')) !!}
                                {!! Form::text('first_name', null, ['class'=>'form-control', 'placeholder' => trans('/admin/index.name')]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('second_name', trans('/admin/index.surname')) !!}
                                {!! Form::text('second_name', null, ['class'=>'form-control', 'placeholder' => trans('/admin/index.surname')]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('birthday', trans('/admin/index.birthday')) !!}
                                {!! Form::text('birthday', null, ['class' => 'form-control default-date-picker']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email','Email') !!}
                                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'email@email.com', 'required' => 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('phone', trans('/admin/index.phone')) !!}
                                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('password', trans('/admin/index.password')) !!}
                                {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('coutry', trans('/admin/index.country')) !!}

                                <select name="county" class="form-control">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}"> {{ trans('country.'.$country->name) }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                {!! Form::label('state', trans('/admin/index.state')) !!}
                                <select name="state" class="form-control"></select>
                            </div>
                            <div class="form-group">
                                {!! Form::label('city', trans('/admin/index.city')) !!}
                                <select name="city" class="form-control"></select>
                            </div>
                            <div class="form-group">
                                {!! Form::label('passno', trans('/admin/index.passportNumber')) !!}
                                {!! Form::text('passno', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('pass_date', trans('/admin/index.passportIssuingDate')) !!}
                                {!! Form::text('pass_date', null, ['class' => 'form-control default-date-picker', 'id' => 'datepicker']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('pass_photo', trans('/admin/index.photoAndScan')) !!}
                                <input type="file" class="form-control file" name="pass_photo[]" accept="image/*" multiple> 
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        <div class="col-md-4 col-md-offset-4">
                            <h3> {{trans('/admin/index.additionalInformation')}}</h3>
                            <div class="form-group">
                                {!! Form::label('height', trans('/admin/index.height')) !!}
                                {!! Form::text('height', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('weight', trans('/admin/index.weight')) !!}
                                {!! Form::text('weight', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('occupation', trans('/admin/index.occupation')) !!}
                                {!! Form::text('occupation', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('gender', trans('/admin/index.gender')) !!}

                                <select name="gender" class="form-control">
                                    @foreach($selects['gender'] as $key => $value)
                                        <option value="{{ $key }}"> {{ trans('profile.'.$value) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                {!! Form::label('eye', trans('/admin/index.eye')) !!}
                                <select name="eye" class="form-control">
                                    @foreach($selects['eye'] as $key => $value)
                                        <option value="{{ $key }}"> {{ trans('profile.'.$value) }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                {!! Form::label('hair', trans('profile.hair')) !!}
                                <select name="hair" class="form-control">
                                    @foreach($selects['hair'] as $key => $value)
                                        <option value="{{ $key }}"> {{ trans('profile.'.$value) }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                {!! Form::label('education', trans('profile.education')) !!}
                                {!! Form::select('education', $selects['education'], null,['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('kids', trans('profile.kids')) !!}
                                <select name="kids" class="form-control">
                                    @foreach($selects['kids'] as $key => $value)
                                        <option value="{{ $key }}"> {{ trans('profile.'.$value) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                {!! Form::label('want_kids', trans('profile.want_k')) !!}
                                <select name="want_k" class="form-control">
                                    @foreach($selects['want_k'] as $key => $value)
                                        <option value="{{ $key }}"> {{ trans('profile.'.$value) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                {!! Form::label('family', trans('profile.family')) !!}
                                <select name="family" class="form-control">
                                    @foreach($selects['family'] as $key => $value)
                                        <option value="{{ $key }}"> {{ trans('profile.'.$value) }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                {!! Form::label('religion', trans('profile.religion')) !!}
                                <select name="religion" class="form-control">
                                    @foreach($selects['religion'] as $key => $value)
                                        <option value="{{ $key }}"> {{ trans('profile.'.$value) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                {!! Form::label('smoke', trans('profile.smoke')) !!}
                                <select name="smoke" class="form-control">
                                    @foreach($selects['smoke'] as $key => $value)
                                        <option value="{{ $key }}"> {{ trans('profile.'.$value) }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                {!! Form::label('drink', trans('profile.drink')) !!}
                                <select name="drink" class="form-control">
                                    @foreach($selects['drink'] as $key => $value)
                                        <option value="{{ $key }}"> {{ trans('profile.'.$value) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-inline">
                                <header>{{trans('/admin/index.lookingForA')}}</header>
                                <div class="col-md-6">
                                    {!! Form::label('l_age_start', trans('/admin/index.from')) !!}
                                    {!! Form::number('l_age_start', '18', ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('l_age_stop', trans('/admin/index.to')) !!}
                                    {!! Form::number('l_age_stop', '40', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('looking', trans('/admin/index.aboutAPartner')) !!}
                                <textarea class="form-control" name="looking"></textarea>
                            </div>
                            <div class="form-group">
                                {!! Form::label('about', trans('/admin/index.aboutAGirl')) !!}
                                <textarea class="form-control" name="about"></textarea>
                            </div>
                            <div class="form-group">
                                {!! Form::submit(trans('/admin/index.submit'), ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </section>

@stop

@section('scripts')
    <script type="text/javascript" src="{{ url('/assets/js/jquery-ui_jquery-ui-1.10.1.custom.min.js') }}"></script>

    <!--bootstrap picker-->
    <script type="text/javascript" src="{{ url('/assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}"></script>

    <script type="text/javascript" src="{{ url('/assets/js/bootstrap-fileinput-master/js/fileinput.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/js/file-input-init.js') }}"></script>

    <script>
        $(function() {


            $('.default-date-picker').datepicker();


            $('select[name="county"]').on('change', function(){

                $('select[name="city"]').empty();

                $.ajax({
                    type: 'POST',
                    url: '{{ url('/get/states/')  }}',
                    data: {id: $(this).val(), _token: $('input[name="_token"]').val()  },
                    success: function( response ){
                        $('select[name="state"]').empty();
                        for( var i = 0; i < response.length; i++ )
                        {
                            $('select[name="state"]').append("<option value='" + response[i].id + "'>" + response[i].name + "</option>");
                        }
                    },
                    error: function( response ){
                        console.log( response )
                    }
                });

            });

            $('select[name="state"]').on('change', function(){

                $.ajax({
                    type: 'POST',
                    url: '{{ url('/get/cities/') }}',
                    data: {id: $(this).val(), _token: $('input[name="_token').val() },
                    success: function( response ){
                        $('select[name="city"]').empty();
                        for ( var i = 0; i < response.length; i++)
                        {
                            $('select[name="city"]').append("<option value='" + response[i].id + "'>" + response[i].name + "</option>");
                        }

                    },
                    error: function( response ){
                        console.log( response );
                    }
                });

            });
        });
    </script>
@stop