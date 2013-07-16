@extends('layouts.scaffold')

@section('main')

<h1>Edit Todo</h1>
{{ Form::model($todo, array('method' => 'PATCH', 'route' => array('todos.update', $todo->id))) }}
    <ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('completed', 'Completed:') }}
            {{ Form::checkbox('completed') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('todos.show', 'Cancel', $todo->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop