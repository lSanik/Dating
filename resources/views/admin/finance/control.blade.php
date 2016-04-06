@extends('admin.layout')

@section('styles')
        <!--bootstrap-touchspin-->
    <link href="css/bootstrap-touchspin.css" rel="stylesheet">
@stop

@section('content')
<div class="row">
    <div class="col-lg-6">

        @for($i = 0; $i < (sizeof($plans)/2); $i++)
            <section class="panel">
                <header class="panel-heading">
                    {{ trans('finance_plans.'.$plans[$i]->name) }}
                    <span class="tools pull-right">
                    <a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>
                </span>
                </header>
                <div class="panel-body">
                    {!! Form::open(['url' => '/admin/finance/'.$plans[$i]->id, 'class' => 'form-inline '.$plans[$i]->name]) !!}
                    <div class="col-md-6">
                        {{ trans('finance_plans_text.'.$plans[$i]->name) }}:
                        {!! Form::hidden('id', $plans[$i]->id) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::text('price', $plans[$i]->price, ['class' => 'form-control']) !!}
                    </div>

                    <div class="col-md-6 col-md-offset-6">
                        <br/>
                        <div class="pull-right">
                            {!! Form::submit(trans('buttons.save'), ['class' => 'btn btn-success'])!!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </section>
        @endfor
    </div>
    <div class="col-lg-6">
        @for( $i = (sizeof($plans)/2); $i < sizeof($plans); $i++ )
            <section class="panel">
                <header class="panel-heading">
                    {{ trans('finance_plans.'.$plans[$i]->name) }}
                    <span class="tools pull-right">
                    <a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>
                </span>
                </header>
                <div class="panel-body">
                    {!! Form::open(['url' => '/admin/finance/'.$plans[$i]->id, 'class' => 'form-inline '.$plans[$i]->name]) !!}
                    <div class="col-md-6">
                        {{ trans('finance_plans_text.'.$plans[$i]->name) }}:
                        {!! Form::hidden('id', $plans[$i]->id) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::text('price', $plans[$i]->price, ['class' => 'form-control']) !!}
                    </div>

                    <div class="col-md-6 col-md-offset-6">
                        <br/>
                        <div class="pull-right">
                            {!! Form::submit(trans('buttons.save'), ['class' => 'btn btn-success'])!!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </section>
        @endfor
    </div>
</div>
@stop

@section('scripts')

    <!--touchspin spinner-->
    <script src="/assets/js/touchspin.js"></script>
    <!-- Spinner init -->
    <script src="/assets/js/spinner-init.js"></script>

@stop