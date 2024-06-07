<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <style>
        p,h1 {
            background-color: white;
            color: black;

        }
    </style>
    <link rel="stylesheet" href="{{asset('styles/users.css')}}">


</html>

@extends('layout.index')
@section('content')
<div id="content-outer-users">
    <div id="inner">
    <p>Broj pratioca: {{$users->count()}}</p>
    <div id="table-div">
        <div id="seriously" >Da li ste sigurni da zelite udaljiti korisnika? 
            <button class="acc" id="acc" onclick="deleteUser(this)">Da</button>
            <button class="acc" onclick="hide()">Ne</button>
        </div>
        @if($users->count() == 0) 
            <h2>Nemate pratioca</h2>
        
        @else
        
        <span id="user-options" style="background-color: rgb(86, 134, 86); padding:0.3rem; margin:0 1rem 3rem 0; color:white;">Nepoželjni korisnik je: </span>
        @if($baduser == Session::Get($baduser))
        <p>{{$baduser->username}}</p>
        <a href="{{route('alert')}}"><button id="user-options2">Upozori</button></a>
        @else
        <span>Nema nepoželjnih korisnika.</span>
        @endif
        
        <table id="tbl">
        <tbody>
            <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Email</th>
    
            </tr>
            @foreach ($users as $user)
            <tr >
                <td>{{$user->firstname}}</td>
                <td>{{$user->lastname}}</td>
                <td>{{$user->email}}</td>
                
               
                <td data-user-id={{$user->id}} data-topic-id={{$topic->id}}><button class="user-options" onclick="display(this)">Udalji sa teme</button></td>
                <td><button class="user-options" onclick="display(this)">Udalji sa svih mojih tema</button></td>
                
            </tr>
        @endforeach
    
        </tbody>
    </table>
@endif
</div>
</div>
</div>

<script src='{{asset("javascript/users.js")}}'></script>


@endsection
