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
                <li class="active"><a href="#item1">Home</a></li>
                <li><a  href="#item2" >Features</a></li>
                <li><a  href="#item3" >Contact</a></li>
            </ul>
        </nav>
    </div>
</div>

<div id="wrapper">
    <div id="mask">

        <div id="item1" class="item">

            <div class="content">
                <div class="site-wrapper-inner">

                    <div class="cover-container">



                        <div class="inner cover" id="index">
                            <h1 class="cover-heading">Find yourself a cleaner <u>TODAY</u></h1>
                            <p class="lead">Finding cleaner is as simple as making a mess.</p>
                            <p class="lead">
                                <a href="#item2" class="btn btn-lg btn-default">Find now</a>

                            </p>
                        </div>


                    </div>

                </div>
            </div>
        </div>

        <div id="item2" class="item">

            <div class="content">
                <div id="floating-panel">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" />
                    </div>
                    <div class="form-group">
                        <label for="name">Phone:</label>
                        <input type="text" id="phone" name="phone" />
                    </div>
                    <div class="form-group">
                        <label for="name">Email:</label>
                        <input type="text" id="email" name="email" />
                    </div>
                    <div class="form-group">
                        <label for="date">Time:</label>
                        <input type="text" id="date" name="date" data-theme="app" />
                        <input type="text" id="time" />

                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input id="address" name="address" type="textbox" placeholder="Address" onFocus="geolocate()">
                    </div>
                    <div class="form-group">
                        <label for="address">Time:</label>
                        <input type="text" id="date" data-theme="app" />
                        <input type="text" id="time" />
                    </div>
                    <div class="form-group">
                        <label for="address">Until:</label>
                        <input type="text" id="until" />
                    </div>
                    <a href="#" id="maids" class="btn btn-lg btn-default">Find now</a>
                </div>
            </div>
        </div>

        <div id="item3" class="item">
            <div class="content">
                    <section class="products">

                        <div class="product-card">
                            <div class="product-image">
                                <img src="{{asset('img/maid-1.png')}}">
                            </div>
                            <div class="product-info">
                                <h5>Greete</h5>
                                <h6>$99.99</h6>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="{{asset('img/maid-2.png')}}">
                            </div>
                            <div class="product-info">
                                <h5>Liisa</h5>
                                <h6>$99.99</h6>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="{{asset('img/maid-3.png')}}">
                            </div>
                            <div class="product-info">
                                <h5>Maria</h5>
                                <h6>$99.99</h6>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="{{asset('img/maid-4.png')}}">
                            </div>
                            <div class="product-info">
                                <h5>Winter Jacket</h5>
                                <h6>$99.99</h6>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="{{asset('img/maid-5.png')}}">
                            </div>
                            <div class="product-info">
                                <h5>Winter Jacket</h5>
                                <h6>$99.99</h6>
                            </div>
                        </div>

                        <!-- more products -->

                    </section>

            </div>
        </div>

        <div id="item4" class="item">
            <a name="item4"></a>
            <div class="content">item4 <a href="#item1" class="panel">back</a></div>
        </div>

        <div id="item5" class="item">
            <a name="item5"></a>
            <div class="content">item5 <a href="#item1" class="panel">back</a></div>
        </div>

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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRGfHgRLdHR_eOODss3IqujtskAUUJPq4&libraries=places&callback=initMap" async defer></script>
<script>
    $('#maids').on('click', function(){

        start = new Date($('#date').val() + ' ' + $('#time').val()).getTime() / 1000;
        end = new Date($('#date').val() + ' ' + $('#until').val()).getTime() / 1000;
        $.ajax({
            type: 'POST',
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            url: 'getMaids',
            data: { start: start, end: end, county: 'Harjumaa'}
        })
                .done(function(data){
                    console.log( data );
                })
                .error(function(data){
                    console.log( data );
                });
    });
</script>
<script>
    $( "#time" ).timeDropper({backgroundColor: "#A0785F", primaryColor: "#fff", borderColor: "#A4EAEC"});
    $( "#until" ).timeDropper({backgroundColor: "#A0785F", primaryColor: "#fff", borderColor: "#A4EAEC"});
</script>
<script>
    $('#date').dateDropper();
</script>
    <script>
        var placeSearch, autocomplete;
    function initMap() {

        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('address')),
            {types: ['geocode']});
        autocomplete.addListener('place_changed', fillInAddress);
        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
    }

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();
        console.log(place.address_components);
//        for (var i = 0; i < place.address_components.length; i++) {
//            var addressType = place.address_components[i].types[0];
//
//           var val = place.address_components[i][addressType];
//            console.log(addressType + ':' +val )
//
//
//        }
    }

    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }
</script>
<script>

    $(document).ready(function() {

        $('a').click(function () {

            $('a').removeClass('selected');
            $(this).addClass('selected');

            current = $(this);

            $('#wrapper').scrollTo($(this).attr('href'), 800);

            return false;
        });

        $(window).resize(function () {
            resizePanel();
        });

    });

    function resizePanel() {

        width = $(window).width();
        height = $(window).height();

        mask_width = width * $('.item').length;

        $('#debug').html(width  + ' ' + height + ' ' + mask_width);

        $('#wrapper, .item').css({width: width, height: height});
        $('#mask').css({width: mask_width, height: height});
        $('#wrapper').scrollTo($('a.selected').attr('href'), 0);

    }

</script>
</body>
</html>
