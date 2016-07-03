<!DOCTYPE html>
<html>
    <head>
        @section('page-title')
            <title>上海信豚实业有限公司</title>
        @show
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="/stylesheets/dist/bootstrap-grid.min.css">
        <link rel="stylesheet" href="/semantic/semantic.min.css">

        @section('additional-styles')
            <link rel="stylesheet" href="/stylesheets/dist/style.min.css">
        @show
        
        <script src="/javascripts/dist/html5shiv.min.js"></script>
        <script src="/javascripts/dist/respond.min.js"></script>
    </head>
    <body>
        <div class="main-content col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 no-boundry">
            <div class="main">
                
                <!--common header-->
                @include('layouts.header')
                <div class="crum">
                    @section('crum')
                    @show
                    
                </div>

                <!--body to show-->
                @section('main')
                @show

            </div>
            @section('footer')
                @include('layouts.footer')
            @show
               
        </div>

        @section('common-scripts')
            <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.0/js.cookie.min.js"></script>
            custmised bootstrap -->
            <script src="/javascripts/dist/jquery-2.1.4.min.js"></script>
            <script src="/javascripts/dist/js.cookie.js"></script>
            <script src="/javascripts/dist/bootstrap.min.js"></script>
            <script src="/semantic/semantic.min.js"></script>
             <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.min.js"></script>-->
        @show
        @section('additional-scripts')
            <!--script src='/javascripts/dist/vibrant.min.js' -->
            <script src="/javascripts/dist/main.babeled.min.js"></script>
        @show
    </body>
</html>