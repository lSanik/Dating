@extends('client.app')

@section('styles')

@stop

@section('content')
<div class="container">
    <div class="row col-md-10 col-md-offset-1">
        <h1>{{ trans('contacts.heading') }}</h1>
        <div class="col-md-6">
            <h4>{{ trans('contacts.left_h') }}</h4>
            <p style="font-weight: 700;">{{ trans('contacts.address') }}</p sty>
            <p>{{ trans('contacts.office_address') }}</p>

            <p style="font-weight: 700;">{{ trans('contacts.email') }}</p>
            <p><a href="mailto:{{trans('contacts.office_email')}}">{{ trans('contacts.office_email') }}</a></p>

            <p style="font-weight: 700;">{{ trans('contacts.phone') }}</p>
            <p>{{ trans('contacts.office_phone') }}</p>
        </div>
        <div class="col-md-6">
            <h4>{{ trans('contacts.right_h') }}</h4>

            @if( Session::has('success_message') )
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ Session::get('success_message') }}
                        </div>
                    </div>
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::open(['url' => '/contacts/message', 'method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::label('name', trans('contacts.name')) !!}
                {!! Form::input('name', 'name', null,['class' => 'form-control', 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', trans('contacts.email')) !!}
                {!! Form::input('email','email', null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('subject', trans('contacts.subject')) !!}
                {!! Form::input('subject','subject', null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('message', trans('contacts.message')) !!}
                <textarea name="message" class="form-control"></textarea>
            </div>
            <div class="form-group">
                {!! Form::submit(trans('contacts.submit'), ['class' => 'btn btn-pink']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop

@section('scripts')

@stop