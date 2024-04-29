<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="{{assert('css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/templatemo-style.css')}}" />
    <title>Mini Profile - Free Bootstrap CSS Template</title>

    <!--
    Mini Profile Template
    https://templatemo.com/tm-530-mini-profile
    -->
</head>
<body>
<!-- Welcome Section -->
<section id="tmWelcome" class="parallax-window" data-parallax="scroll" data-image-src="{{asset('images/news/'.$news->image)}}">
    <div class="container-fluid tm-brand-container-outer">
        <div class="row">
            <div class="col-12">
                <!-- Logo Area -->
                <!-- Black transparent bg -->
                <div class="ml-auto mr-0 tm-bg-black-transparent text-white tm-brand-container-inner">
                    <div class="tm-brand-container text-center">
                        <h1 class="tm-brand-name">{{$news->title}}</h1>
                        <p class="tm-brand-description mb-0">Мавзӯъ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tm-bg-white-transparent tm-welcome-container">
        <div class="container-fluid">
            <div class="row h-100">
                <!-- Welcome Text -->
                <!-- White transparent bg -->
                <div class="col-md-7 tm-welcome-left-col">
                    <div class="tm-welcome-left">
                        <h2 class="tm-welcome-title">Бештари мавзӯъ</h2>
                        <p class="pb-0">
                            {{$news->text}} </p>
                    </div>
                </div>
                <!-- Brown bg -->
                <div class="col-md-5">
                    <div class="tm-welcome-right">
                        <i class="fas fa-4x fa-address-card p-3 tm-welcome-icon"></i>
                        <p class="mb-0">
                            Категория
                            {{$news->category->name}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Welcome section -->

<!-- Portfolio section -->

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/parallax.min.js')}}"></script>
<script>
    function detectMsBrowser() {
        using_ms_browser =
            navigator.appName == "Microsoft Internet Explorer" ||
            (navigator.appName == "Netscape" &&
                navigator.appVersion.indexOf("Edge") > -1) ||
            (navigator.appName == "Netscape" &&
                navigator.appVersion.indexOf("Trident") > -1);

        if (using_ms_browser == true) {
            alert(
                "Please use Chrome or Firefox for the best browsing experience!"
            );
        }
    }
    function setBrandMarginTop() {
        var bottomContainerHeight = $(".tm-welcome-container").height();

        $(".tm-brand-container-outer").css({
            "margin-top": -bottomContainerHeight + "px"
        });
    }

    $(function() {
        setBrandMarginTop();
        detectMsBrowser();

        // Handle window resize event
        $(window).resize(function() {
            setBrandMarginTop();
        });
    });
</script>
</body>
</html>
