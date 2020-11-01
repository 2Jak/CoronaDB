@extends('layouts.app')

@section('content')
    <h1>Report New Case</h1>
    {!! Form::open(['action' => 'ConfirmedCasesController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Severity 0-recovered 1-4- light 5-6-medium 7-8-heavy 9-ventilated 10-dead')}}
            {{Form::number('severity', '0', ['classes' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Age')}}
            {{Form::number('age', '0', ['classes' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Gender')}}
            {{Form::select('gender', [1 => 'Male', 0 => 'Female'], 1)}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Residance')}}
            {{Form::text('residance', '', ['classes' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Recovering At //0-home 1-hotel 2-hospital')}}
            {{Form::number('recovering_at', '0', ['classes' => 'form-control'])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
    <h1>Confirmed Cases</h1>
    @if(count($confirmedCases) > 0)
        <div class="card">
            <ul class="list-group list-group-flush">
                @foreach($confirmedCases as $case)
                    <li class="list-group-item">
                        <h4>Id: {{$case->id}}</h4>
                        <h4>Age: {{$case->age}}</h4>
                        <h4>Severity: {{$case->severity}}</h4>
                        {!!Form::open(['action' => ['ConfirmedCasesController@destroy', $case->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                    </li>
                @endforeach
            </ul>
        </div>
    @else
        <div class="card">
            <h3>No Cases to Show.</h3>
        </div>
    @endif
@endsection