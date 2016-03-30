@extends('admin.layout')

@section('style')

@stop
@section('content')

    <section class="panel">
        <heading>

        </heading>
        <div class="panel-body">
            <table class="table table-hovered">
                <thead>
                <th>ID</th>
                <th>Имя/Фамилия</th>
                <th>Аватар</th>
                @if( Auth::user()->hasRole('Owner') )
                    <th> Партнер </th>
                @endif
                <th>Онлайн</th>
                <th>Web камера</th>
                <th>Последний вход</th>
                <th><i class="fa fa-cogs"></i> Управление</th>
                </thead>
                <tbody>
                @foreach($girls as $girl)
                    <tr>
                        <td>{{ $girl->id }}</td>
                        <td>{{ $girl->first_name }} {{ $girl->last_name }}</td>
                        <td><img width="150px" src="{{ url('uploads/girls/avatars/'.$girl->avatar)}}"></td>
                        @if( Auth::user()->hasRole('Owner') )
                            <td>{{ $girl->partner_id }}</td> <!-- Уточнить что выводить -->
                        @endif

                        <td> TRUE/FALSE <!-- @todo logic --> </td>
                        <td> TRUE/FALSE <!-- @todo logic --> </td>
                        <td> {{ $girl->last_login }} </td>
                        <td>
                            <a class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
                            <a href="{{ url('admin/girl/edit/'.$girl->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>

@stop
@section('scripts')

@stop