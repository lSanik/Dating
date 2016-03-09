@extends('admin.layout')

@section('styles')

@stop

@section('content')

        <section class="panel">

            <div class="panel-body">

                <div class="col-md-6">
                    <header class="panel-heading">
                        Ваши запросы
                    </header>

                    <pre>
                        {{ var_dump( $tickets ) }}
                    </pre>
                </div>

            <div class="col-md-6">
                <header class="panel-heading">
                    Отправить сообщение в службу поддержки партнеров
                </header>

                    {!! Form::open(['url' => '/admin/support', 'class' => 'form-inline']) !!}
                    <div class="row">
                        <div class="col-md-3">
                            {!! Form::label('subjects', 'Тематика') !!}
                        </div>
                        <div class="col-md-9">
                            <select name="subjects" class="form-control">
                                @foreach($selects['subject'] as $key => $value)
                                    <option value="{{ $key }}">{{ trans('support.'.$value) }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {!! Form::label('subject', 'Тема') !!}
                        </div>
                        <div class="col-md-9">
                            {!! Form::text('subject', null, ['class' => 'form-control col-md-12']) !!}
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {!! Form::label('message', 'Сообщение') !!}
                        </div>
                        <div class="col-md-9">
                            {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                        </div>

                    </div>
                    <div class="row">
                        <div class="text-center">
                            {!! Form::submit( trans('buttons.send'), ['class' => 'btn btn-success'] ) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </section>


@stop

@section('scripts')

@stop