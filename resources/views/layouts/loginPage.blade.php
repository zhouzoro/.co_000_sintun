@extends('layouts.app')

@section('page-title')
<title>内容管理——上海信豚实业有限公司</title>@endsection
@section('additional-styles')
@parent
<link rel="stylesheet" href="/stylesheets/dist/font-awesome.min.css"/>
<link rel="stylesheet" href="/stylesheets/dist/root.min.css"/>@endsection
@section('main')

    <div class='container-fluid no-boundry login-page'>
		<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">

			@include('inputs.login')
		</div>
    </div>
@endsection

@section('additional-scripts')
<script src="/tinymce/tinymce.min.js"></script>
<script src="/javascripts/dist/root.babeled.min.js"></script>@endsection