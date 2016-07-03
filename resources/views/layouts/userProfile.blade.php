@extends('layouts.app')
@section('page-title')
	<title>{{$user->username.' -- '.'漫行邮轮'}}</title>
@endsection


@section('main')
	@parent
	@include('contents.user')
@endsection