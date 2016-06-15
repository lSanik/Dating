@extends('client.profile.profile')

@section('styles')
    <link href="{{ url('/assets/css/bootstrap-reset.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/css/fileinput.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/datepicker.css') }}" rel="stylesheet">
@stop

@section('profileContent')
    <section class="panel panel-default">
        <header class="panel-heading">{{ trans('profile.edit') }}</header>
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

            {!! Form::open(['url' => '/profile/update/'.$id, 'class' => 'form', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                        <div class="col-md-6">
                            <h3> Основная информация профиля </h3>
                            <div class="form-group">
                                {!! Form::label('avatar', trans('profile.avatar')) !!}<br/>
                                <img width="373rem" src="{{ !empty($user->avatar) ? url('/uploads/girls/avatars/'. $user->avatar ) : '' }}" id="preview-avatar">
                                <input type="file" class="form-control file" name="avatar" accept="image/*" value="{{ !empty($user->avatar) ? $user->avatar : ''}}">
                            </div>
                            <div class="form-group">
                                {!! Form::label('first_name', trans('profile.first_name')) !!}
                                {!! Form::text('first_name', !empty($user->first_name) ? $user->firstName : '', ['class'=>'form-control', 'placeholder' => 'Name']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('second_name', trans('profile.last_name')) !!}
                                {!! Form::text('second_name', !empty($user->last_name) ? $user->lastName : '', ['class'=>'form-control', 'placeholder' => 'Surname']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('birthday', trans('profile.birthday')) !!}
                                {!! Form::text('birthday', !empty($user->profile->birthday) ? $user->profile->birthday : '', ['class' => 'form-control default-date-picker']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email',trans('profile.email')) !!}
                                {!! Form::email('email', !empty($user->email) ? $user->email : '', ['class' => 'form-control', 'placeholder' => 'email@email.com', 'required' => 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('phone', trans('profile.phone')) !!}
                                {!! Form::text('phone', !empty($user->phone) ? $user->phone : '', ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('password', trans('profile.password')) !!}
                                {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('coutry', trans('profile.country')) !!}
                                <select name="county" class="form-control">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}"
                                                @if( $country->id == $user->country_id )
                                                selected="selected"
                                                @endif
                                        > {{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                {!! Form::label('state', trans('profile.state') ) !!}
                                {!! Form::hidden('user_state_id', !empty($user->state_id) ? $user->state_id : '' ) !!}
                                <select name="state" class="form-control"></select>
                            </div>
                            <div class="form-group">
                                {!! Form::label('city', trans('profile.city') ) !!}
                                {!! Form::hidden('user_city_id', !empty($user->city_id) ? $user->city_id : '') !!}
                                <select name="city" class="form-control"></select>
                            </div>
                            <div class="form-group">
                                {!! Form::label('about', trans('profile.about') ) !!}
                                {!! Form::textarea('about', !empty($user->profile->about) ? $user->profile->about : '', ['class' => 'form-control']) !!}
                            </div>

                        </div>


                        <div class="col-md-6">
                            <h3>Ищу</h3>
                            <div class="form-group">
                                {!! Form::label('l_age_start', trans('profile.l_age_start') ) !!}
                                {!! Form::number('l_age_start', !empty($user->profile->l_age_start) ? $user->profile->l_age_start : '18', ['class' => 'form-control'] )!!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('l_age_stop', trans('profile.l_age_stop') ) !!}
                                {!! Form::number('l_age_stop', !empty($user->profile->l_age_stop) ? $user->profile->l_age_stop : '40', ['class' => 'form-control'] )!!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('looking', trans('profile.looking') ) !!}
                                {!! Form::textarea('looking', !empty($user->profile->looking) ? $user->profile->looking : '', ['class' => 'form-control'] )!!}
                            </div>
                            <h3> Дополнительная информация профиля </h3>
                            <div class="form-group">
                                {!! Form::label('height', trans('profile.height') ) !!}
                                {!! Form::text('height', !empty($user->profile->height) ? $user->profile->height : '' , ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('weight', trans('profile.weight') ) !!}
                                {!! Form::text('weight', !empty($user->profile->weight) ? $user->profile->width : '', ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('occupation', trans('profile.occupation') ) !!}
                                {!! Form::text('occupation', !empty($user->profile->occupation) ? $user->profile->occupation : '', ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('gender', trans('profile.gender') ) !!}
                                {!! Form::select('gender', $selects['gender'], !empty($user->profile->gender) ? $user->profile->gender : '' ,  ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('eye', trans('profile.eye') ) !!}
                                {!! Form::select('eye', $selects['eye'] , !empty( $user->profile->eye ) ? $user->profile->eye : '' ,  ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('hair', trans('profile.hair') ) !!}
                                {!! Form::select('hair', $selects['hair'], !empty($user->profile->hair) ? $user->profile->hair : '',  ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('education', trans('profile.education') ) !!}
                                {!! Form::select('education', $selects['education'], !empty($user->profile->education) ? $user->profile->education : '',  ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('kids', trans('profile.kids') ) !!}
                                {!! Form::select('kids', $selects['kids'], !empty($user->profile->kids) ? $user->profile->kids : '',  ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('want_kids', trans('profile.want_kids') ) !!}
                                {!! Form::select('want_kids', $selects['want_k'], !empty($user->profile->want_k) ? $user->profile->want_k : '',  ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('family', trans('profile.family') ) !!}
                                {!! Form::select('family', $selects['family'], !empty($user->profile->family) ? $user->profile->family : '',  ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('religion', trans('profile.religion') ) !!}
                                {!! Form::select('religion', $selects['religion'], !empty($user->profile->religion)? $user->profile->religion : '',  ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('smoke', trans('profile.smoke') ) !!}
                                {!! Form::select('smoke', $selects['smoke'], empty($user->profile->smoke) ? '' : $user->profile->smoke,  ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('drink', trans('profile.drink') ) !!}
                                {!! Form::select('drink', $selects['drink'], empty($user->profile->drink) ? '' : $user->profile->drink,  ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>
                </div>
                {!! Form::close() !!}

        </div>
    </section>
@stop

@section('scripts')

    <script src="{{ url('/assets/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/js/bootstrap-fileinput-master/js/fileinput.js') }}"></script>
    <script type="text/javascript" src="{{ url('/assets/js/file-input-init.js') }}"></script>
    <script>

        function get_cities( $id )
        {
            $.ajax({
                type: 'POST',
                url: '{{ url('/get/cities/') }}',
                data: {id: $id, _token: $('input[name="_token').val() },
                success: function( response ){
                    $('select[name="city"]').empty();
                    for ( var i = 0; i < response.length; i++)
                    {
                        if( response[i].id == $('input[name="user_city_id"]').val() )
                            $('select[name="city"]').append("<option value='" + response[i].id + "'  selected='selected'>" + response[i].name + "</option>");
                        else
                            $('select[name="city"]').append("<option value='" + response[i].id + "'>" + response[i].name + "</option>");
                    }

                },
                error: function( response ){
                    console.log( response );
                }
            });
        }

        function get_states( $id )
        {
            $.ajax({
                type: 'POST',
                url: '{{ url('/get/states/') }}',
                data: {id: $id, _token: $('input[name="_token"]').val()  },
                success: function( response ){
                    $('select[name="state"]').empty();

                    for( var i = 0; i < response.length; i++ )
                    {
                        if( response[i].id == $('input[name="user_state_id"]').val() )
                            $('select[name="state"]').append("<option value='" + response[i].id + "' selected='selected'>" + response[i].name + "</option>");
                        else
                            $('select[name="state"]').append("<option value='" + response[i].id + "'>" + response[i].name + "</option>");
                    }
                },
                error: function( response ){
                    console.log( response )
                }
            });

            get_cities($id);
        }

        $(window).on('load', function(){

            get_states( $('select[name="county"]').val() );

        });

        $(function() {

            $('button.status').click(function(){



                $.ajax({
                    type: 'POST',
                    url: '{{ url('/admin/girl/changeStatus') }}',
                    data: { id: $('select[name="status"]').val(),
                        user_id: $('input[name="user_id"]').val(),
                        why: $('textarea[name="why"]').val(),
                        _token: $('input[name="_token"]').val() },
                    success: function( response ){
                        console.log(response);
                    },
                    error: function( response ){
                        console.log(response);
                    }
                });

            });

            $('input[name="avatar"]').change(function(){
                $('#preview-avatar').css('display', 'none');
            });

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
                })

            });
        });

        $(window).on('load', function(){

            var city_id = $('input[name="city_id"]').val();

        })
    </script>
@stop