@extends('layouts.app')
@section('content')
    <h1>My Profile</h1>
    <h3>{{$id}}</h3>
    <table>
        @foreach($names as $n)
        <tr><td>{{$n}}</td></tr> 
        @endforeach
    </table>
@endsection
