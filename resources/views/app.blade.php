<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cleaning service booking system">
    <meta name="author" content="Kaspar Martin Suursalu">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="../../favicon.ico">

    <title>Cover Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- FontAwesome core CSS -->
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="{{asset('css/timedropper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/datedropper.min.css')}}">
    <link href="{{asset('css/jquery.bxslider.css')}}" rel="stylesheet">
    <link href="{{asset('css/cover.css')}}" rel="stylesheet">
    <!-- Style Overrides -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

</head>

<body>
<div class="site-wrapper">
<div class="masthead clearfix">
    <div class="inner">
        <h3 class="masthead-brand">Cleaning Booking</h3>
        <nav>
            <ul class="nav masthead-nav">
                <li class="active"><a href="#item1" >Home</a></li>
                <li><a  href="#item2" >Form</a></li>
                <li class="disabled"><a  href="#item3" >Maids</a></li>
                <li class="disabled"><a  href="#item4" >Confirmation</a></li>
                <li class="disabled"><a  href="#item5" >Ticket</a></li>
            </ul>
        </nav>
    </div>
</div>

<div id="wrapper">
    <div id="mask">
        @include('home')
        @include('form')
        @include('maids')
        @include('confirm')
        @if(isset($ticket))
            @include('ticket', $ticket)
        @else
            @include('ticket')
        @endif

    </div>
</div>
    <div class="mastfoot">
        <div class="inner">
            <p>Booking system by Kaspar Martin Suursalu</p>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Jquery v1.11.1 -->
<script src="{{asset('js/jquery.js')}}"></script>
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.scrollTo.js')}}"></script>
<script src="{{asset('js/timedropper.min.js')}}"></script>
<script src="{{asset('js/datedropper.min.js')}}"></script>
<script src="{{asset('js/jquery.bxslider.min.js')}}"></script>

<script src="{{asset('js/app.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRGfHgRLdHR_eOODss3IqujtskAUUJPq4&libraries=places&callback=initMap" async defer></script>
<script>


</script>
</body>
</html>
