<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="shortcut icon" href="{{asset('frontend')}}/images/star.png" type="favicon/ico" /> -->

    <title>Mamma's Kitchen</title>

    <link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/owl.theme.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/animate.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/flexslider.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/pricing.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">



    <link rel="stylesheet" href="{{asset('frontend')}}/css/main.css">


    <script src="{{asset('frontend')}}/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="{{asset('frontend')}}/js/jquery.flexslider.min.js"></script>
    <script type="text/javascript">
        $(window).load(function() {
                $('.flexslider').flexslider({
                 animation: "slide",
                 controlsContainer: ".flexslider-container"
                });
            });
    </script>




</head>

<body data-spy="scroll" data-target="#template-navbar">


    <!--== 4. Navigation ==-->
    <nav id="template-navbar" class="navbar navbar-default custom-navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#Food-fair-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img id="logo" src="{{asset('frontend')}}/images/Logo_main.png" class="logo img-responsive">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="Food-fair-toggle">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#about">about</a></li>
                    <li><a href="#pricing">Menu List</a></li>
                    <li><a href="#featured-dish">featured</a></li>
                    <li><a href="#reserve">reservation</a></li>
                    <li><a href="#contact">contact</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.row -->
    </nav>


    <!--== 5. Header ==-->


    <section id="header-slider" class="owl-carousel">
        @foreach ($sliders as $slider)
        <div class="item" style="background: url({{asset('uploads/slider/'.$slider->image)}}); background-size:
            cover; background-position: bottom;">
            <div class="container">
                <div class="header-content">
                    <h1 class="header-title">{{$slider->title}}</h1>
                    <p class="header-sub-title">{{$slider->sub_title}}</p>
                </div> <!-- /.header-content -->
            </div>
        </div>
        @endforeach
    </section>



    <!--== 6. About us ==-->
    <section id="about" class="about">
        <img src="{{asset('frontend')}}/images/icons/about_color.png"
            class="img-responsive section-icon hidden-sm hidden-xs">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row dis-table">
                    <div class="hidden-xs col-sm-6 section-bg about-bg dis-table-cell">

                    </div>
                    <div class="col-xs-12 col-sm-6 dis-table-cell">
                        <div class="section-content">
                            <h2 class="section-content-title">About us</h2>
                            <p class="section-content-para">
                                Astronomy compels the soul to look upward, and leads us from this world to another.
                                Curious that we spend more time congratulating people who have succeeded than
                                encouraging people who have not. As we got further and further away, it [the Earth]
                                diminished in size.
                            </p>
                            <p class="section-content-para">
                                beautiful, warm, living object looked so fragile, so delicate, that if you touched it
                                with a finger it would crumble and fall apart. Seeing this has to change a man. Where
                                ignorance lurks, so too do the frontiers of discovery and imagination.
                            </p>
                        </div> <!-- /.section-content -->
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.container-fluid -->
        </div> <!-- /.wrapper -->
    </section> <!-- /#about -->


    <!--==  7. Afordable Pricing  ==-->
    <section id="pricing" class="pricing">
        <div id="w">
            <div class="pricing-filter">
                <div class="pricing-filter-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="section-header">
                                    <h2 class="pricing-title">Affordable Pricing</h2>
                                    <ul id="filter-list" class="clearfix">
                                        <li class="filter" data-filter="all">All</li>
                                        @foreach ($categories as $category)
                                        <li class="filter" data-filter=".id{{$category->id}}">
                                            {{$category->category}} <span
                                                class='badge'>{{$category->items->count()}}</span>
                                        </li>
                                        @endforeach

                                    </ul><!-- @end #filter-list -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <ul id="menu-pricing" class="menu-price">

                            @foreach ($items as $item)


                            <li class="item id{{$item->category->id}}">

                                <a href="#">
                                    <img src="{{asset('uploads/item/'.$item->image)}}" class="img-responsive"
                                        alt="Food">
                                    <div class="menu-desc text-center">
                                        <span>
                                            <h3>{{$item->name}}</h3>
                                            {{$item->description}}
                                        </span>
                                    </div>
                                </a>

                                <h2 class="white">${{$item->price}}</h2>
                            </li>
                            @endforeach
                        </ul>

                        <!-- <div class="text-center">
                                    <a id="loadPricingContent" class="btn btn-middle hidden-sm hidden-xs">Load More <span class="caret"></span></a>
                            </div> -->

                    </div>
                </div>
            </div>

        </div>
    </section>


    <!--== 8. Great Place to enjoy ==-->

    @foreach ($sections as $section)



    <section id="great-place-to-enjoy" class="great-place-to-enjoy">
        <img class="img-responsive section-icon hidden-sm hidden-xs"
            src="{{asset('uploads/section/'.$section->icon_image)}}" style='border-radius:50%'>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row dis-table">
                    <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                        <h2 class="section-title">{{$section->section_title}}</h2>
                    </div>
                    <div class="col-xs-6 col-sm-6 dis-table-cell "
                        style="background-image: url({{asset('uploads/section/'.$section->section_image)}});">

                    </div>
                </div> <!-- /.dis-table -->
            </div> <!-- /.row -->
        </div> <!-- /.wrapper -->
    </section> <!-- /#great-place-to-enjoy -->



    <!--==  9. Our Beer  ==-->
    <section id="beer" class="beer">
        <img class="img-responsive section-icon hidden-sm hidden-xs"
            src="{{asset('uploads/section/'.$section->icon_image)}}" style='border-radius:50%'>
        <div class="container-fluid">
            <div class="row dis-table">
                <div class="hidden-xs col-sm-6 dis-table-cell " style="background: url({{asset('uploads/section/'.$section->food_image)}}); background-repeat: no-repeat, no-repeat; background-position: 51%
                    58%, 75% 58%; background-size: 300px 300px, 240px 240px;">

                </div>

                <div class="col-xs-12 col-sm-6 dis-table-cell">
                    <div class="section-content">
                        <h2 class="section-content-title">{{$section->food_title}}</h2>
                        <div class="section-description">
                            <p class="section-content-para">
                                {{$section->food_description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endforeach


    <!--== 14. Have a look to our dishes ==-->

    <section id="have-a-look" class="have-a-look hidden-xs">
        <img class="img-responsive section-icon hidden-sm hidden-xs"
            src="{{asset('frontend')}}/images/icons/food_color.png">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">

                    <div class="menu-gallery" style="width: 50%; float:left;">
                        <div class="flexslider-container">
                            <div class="flexslider">
                                <ul class="slides">
                                    @foreach ($dishes as $dish)

                                    <li>
                                        <img src="{{asset('uploads/dish/'.$dish->image)}}" />
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="gallery-heading hidden-xs color-bg" style="width: 50%; float:right;">
                        <h2 class="section-title">Have A Look To Our Dishes</h2>
                    </div>


                </div> <!-- /.row -->
            </div> <!-- /.container-fluid -->
        </div> <!-- /.wrapper -->
    </section>




    <!--== 15. Reserve A Table! ==-->
    <section id="reserve" class="reserve">
        <img class="img-responsive section-icon hidden-sm hidden-xs"
            src="{{asset('frontend')}}/images/icons/reserve_black.png">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row dis-table">
                    <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                        <h2 class="section-title">Reserve A Table !</h2>
                    </div>
                    <div class="col-xs-6 col-sm-6 dis-table-cell section-bg">

                    </div>
                </div> <!-- /.dis-table -->
            </div> <!-- /.row -->
        </div> <!-- /.wrapper -->
    </section> <!-- /#reserve -->



    <section class="reservation">
        <img class="img-responsive section-icon hidden-sm hidden-xs"
            src="{{asset('frontend')}}/images/icons/reserve_color.png">
        <div class="wrapper">
            <div class="container-fluid">
                <div class=" section-content">
                    <div class="row">
                        <div class="col-md-5 col-sm-6">
                            <form class="reservation-form" method="post" action="{{route('home.reserve')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control reserve-form empty iconified"
                                                name="name" id="name" placeholder="  &#xf007;  Name"
                                                value='{{old('name')}}'>
                                            @error('name')
                                            <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email"
                                                class="form-control reserve-form empty iconified" id="email"
                                                placeholder="  &#xf1d8;  e-mail" value='{{old('email')}}'>
                                            @error('email')
                                            <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="tel" class="form-control reserve-form empty iconified"
                                                name="mobile" id="phone" placeholder="  &#xf095;  Phone"
                                                value='{{old('mobile')}}'>
                                            @error('mobile')
                                            <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control reserve-form empty iconified"
                                                name="time" id="datepicker" placeholder="&#xf017;  Time"
                                                value='{{old('time')}}'>
                                            @error('time')
                                            <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12">
                                        <textarea type="text" name="message"
                                            class="form-control reserve-form empty iconified" id="message" rows="3"
                                            placeholder="  &#xf086;  We're listening">{{old('message')}}</textarea>
                                        @error('message')
                                        <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 col-sm-12">
                                        <button type="submit" id="submit" name="submit" class="btn btn-reservation">
                                            <span><i class="fa fa-check-circle-o"></i></span>
                                            Make a reservation
                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="col-md-2 hidden-sm hidden-xs"></div>

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="opening-time">
                                <h3 class="opening-time-title">Hours</h3>
                                <p>Mon to Fri: 7:30 AM - 11:30 AM</p>
                                <p>Sat & Sun: 8:00 AM - 9:00 AM</p>

                                <div class="launch">
                                    <h4>Lunch</h4>
                                    <p>Mon to Fri: 12:00 PM - 5:00 PM</p>
                                </div>

                                <div class="dinner">
                                    <h4>Dinner</h4>
                                    <p>Mon to Sat: 6:00 PM - 1:00 AM</p>
                                    <p>Sun: 5:30 PM - 12:00 AM</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>




    <section id="contact" class="contact">
        <div class="container-fluid color-bg">
            <div class="row dis-table">
                <div class="hidden-xs col-sm-6 dis-table-cell">
                    <h2 class="section-title">Contact With us</h2>
                </div>
                <div class="col-xs-6 col-sm-6 dis-table-cell">
                    <div class="section-content">
                        <p>16th Birn street Get Plaza (4th floar) USA</p>
                        <p>+44 12 213584</p>
                        <p>example@mail.com </p>
                    </div>
                </div>
            </div>
            <div class="social-media">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <ul class="center-block">
                            <li><a href="#" class="fb"></a></li>
                            <li><a href="#" class="twit"></a></li>
                            <li><a href="#" class="g-plus"></a></li>
                            <li><a href="#" class="link"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid">
        <div class="row">
            <div id="map-canvas"></div>
        </div>
    </div>



    <section class="contact-form">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                    <div class="row">
                        <form class="contact-form" method="post" action="{{route('home.contact')}}">
                            @csrf

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input name="name" type="text" class="form-control" id="name" placeholder="  Name">
                                </div>
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control" id="email"
                                        placeholder="  Email">
                                </div>
                                <div class="form-group">
                                    <input name="subject" type="text" class="form-control" id="subject"
                                        placeholder="  Subject">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <textarea name="message" type="text" class="form-control" id="message" rows="7"
                                    placeholder="  Message"></textarea>
                            </div>

                            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                                <div class="text-center">
                                    <button type="submit" id="submit" name="submit" class="btn btn-send">Send </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="copyright text-center">
                        <p>
                            &copy; Copyright, 2015 <a href="#">Your Website Link.</a> Theme by <a
                                href="http://themewagon.com/" target="_blank">ThemeWagon</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('frontend')}}/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="{{asset('frontend')}}/js/jquery.mixitup.min.js"></script>
    <script src="{{asset('frontend')}}/js/wow.min.js"></script>
    <script src="{{asset('frontend')}}/js/jquery.validate.js"></script>
    <script type="text/javascript" src="{{asset('frontend')}}/js/jquery.hoverdir.js"></script>
    <script type="text/javascript" src="{{asset('frontend')}}/js/jQuery.scrollSpeed.js"></script>
    <script src="{{asset('frontend')}}/js/bootstrap-datetimepicker.min.js"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script src="{{asset('frontend')}}/js/script.js"></script>
    <script>
        $('#datepicker').datetimepicker({
            format:"dd MM yyyy - HH:11 p",
            showMeridian:true,
            autoclose:true,
            todayBtn:true
        });
    </script>

    @if ($errors->any())

    @foreach ($errors->all() as $error)


    <script>
        toastr.error('{{$error}}');
    </script>
    @endforeach
    @endif
    {!! Toastr::message() !!}
</body>

</html>