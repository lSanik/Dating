@extends('admin.layout')

@section('content')
<section class="panel panel-default">
    <header class="panel-heading">{{ trans('contacts.header') }}</header>
    <div class="panel-body">
        <table class="table table-hovered">
            <thead>

            </thead>
            <tbody>
                @foreach($messages as $m)
                    <tr>
                        <td>{{ $m->id }}</td>
                        <td>{{ $m->name }}</td>
                        <td>{{ $m->email }}</td>
                        <td>{{ $m->subject }}</td>
                        <td>
                            <a href="{{ url('/admin/contacts/message/'.$m->id) }}"><i class="fa fa-eye"></i></a>
                            <a href="{{ url('/admin/contacts/dropMessage/'.$m->id) }}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@stop