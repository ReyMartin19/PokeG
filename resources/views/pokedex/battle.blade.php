@extends('layouts.app')
@section('content')
    <h1 class="text-3xl font-bold">Battle</h1> 
    <a href="{{ route('battle.init') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Match</a>
@endsection