<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'SPBPH') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css"
        integrity="sha512-bYPO5jmStZ9WI2602V2zaivdAnbAhtfzmxnEGh9RwtlI00I9s8ulGe4oBa5XxiC6tCITJH/QG70jswBhbLkxPw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">


    <!-- Scripts -->

    <script src="{{ asset('js/jquery.validate.js') }}"></script>
    <script src="{{ asset('js/jquery-1.10.2.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>



    {{-- calendar --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/locales-all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.css" />


    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css"> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js"
        integrity="sha512-+UiyfI4KyV1uypmEqz9cOIJNwye+u+S58/hSwKEAeUMViTTqM9/L4lqu8UxJzhmzGpms8PzFJDzEqXL9niHyjA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/86937c1494.js" crossorigin="anonymous"></script>


    <script>
        $(function() {
            $("#datepicker_start").datetimepicker({
                timepicker: false,
                format: 'Y-m-d',
                onShow: function(ct) {
                    this.setOptions({
                        minDate: 0,
                        maxDate: jQuery('#datepicker_finish').val() ? jQuery(
                            '#datepicker_finish').val() : false
                    })
                },
            });
            $("#datepicker_finish").datetimepicker({
                timepicker: false,
                format: 'Y-m-d',
                onShow: function(ct) {
                    this.setOptions({
                        minDate: jQuery('#datepicker_start').val() ? jQuery(
                            '#datepicker_start').val() : false
                    })
                },
            });
            $("#timepicker_start").datetimepicker({
                datepicker: false,
                format: 'H:i',
                step: 5,
                pickSeconds: false,
                pick12HourFormat: false
            });
            $("#timepicker_finish").datetimepicker({
                datepicker: false,
                format: 'H:i',
                step: 5,
            });
        });
    </script>

    <script>
        /*to prevent Firefox FOUC, this must be here*/
        let FF_FOUC_FIX;
    </script>

    <!-- Styles -->
    <style>
        html {
            scroll-behavior: smooth;
        }

        html,
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            /* shiny1 */
            /* background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='1440' height='560' preserveAspectRatio='none' viewBox='0 0 1440 560'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1001%26quot%3b)' fill='none'%3e%3crect width='1440' height='560' x='0' y='0' fill='rgba(149%2c 233%2c 138%2c 1)'%3e%3c/rect%3e%3cpath d='M0%2c636.355C116.909%2c643.399%2c185.665%2c505.496%2c282.99%2c440.341C377.943%2c376.774%2c518.789%2c362.533%2c565.077%2c258.062C611.375%2c153.57%2c528.756%2c39.425%2c510.623%2c-73.416C492.873%2c-183.871%2c524.984%2c-307.471%2c459.608%2c-398.253C392.867%2c-490.931%2c274.074%2c-528.404%2c163.21%2c-555.841C55.761%2c-582.433%2c-54.006%2c-575.88%2c-162.116%2c-552.117C-276.776%2c-526.915%2c-409.75%2c-509.806%2c-478.657%2c-414.759C-547.134%2c-320.306%2c-502.671%2c-189.701%2c-509.301%2c-73.226C-515.272%2c31.663%2c-563.749%2c142.086%2c-515.674%2c235.5C-467.943%2c328.245%2c-344.244%2c343.496%2c-261.892%2c407.512C-168.471%2c480.132%2c-118.112%2c629.239%2c0%2c636.355' fill='%2343d82f'%3e%3c/path%3e%3cpath d='M1440 1015.377C1524.794 1011.983 1596.1390000000001 959.865 1668.758 915.9549999999999 1743.395 870.825 1830.734 834.294 1869.056 755.943 1907.665 677.005 1898.689 581.832 1873.3319999999999 497.696 1850.013 420.323 1792.608 360.76300000000003 1733.386 305.779 1679.356 255.61599999999999 1614.904 224.094 1547.202 194.90499999999997 1470.465 161.82 1395.202 116.22899999999998 1312.009 124.10399999999998 1221.339 132.687 1115.9 160.937 1070.714 240.012 1025.021 319.973 1100.805 418.27099999999996 1091.551 509.901 1082.901 595.544 997.842 668.831 1018.977 752.275 1040.399 836.8530000000001 1125.171 888.5160000000001 1199.161 934.7529999999999 1272.439 980.5450000000001 1353.66 1018.8330000000001 1440 1015.377' fill='%23e7fae5'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1001'%3e%3crect width='1440' height='560' fill='white'%3e%3c/rect%3e%3c/mask%3e%3c/defs%3e%3c/svg%3e"); */

            /* shiny2 */
            /* background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='1440' height='560' preserveAspectRatio='none' viewBox='0 0 1440 560'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1296%26quot%3b)' fill='none'%3e%3crect width='1440' height='560' x='0' y='0' fill='url(%23SvgjsLinearGradient1297)'%3e%3c/rect%3e%3cpath d='M1440 0L799.84 0L1440 166.12z' fill='rgba(255%2c 255%2c 255%2c .1)'%3e%3c/path%3e%3cpath d='M799.84 0L1440 166.12L1440 247.05L711.9300000000001 0z' fill='rgba(255%2c 255%2c 255%2c .075)'%3e%3c/path%3e%3cpath d='M711.9300000000001 0L1440 247.05L1440 251.46L273.55000000000007 0z' fill='rgba(255%2c 255%2c 255%2c .05)'%3e%3c/path%3e%3cpath d='M273.5500000000002 0L1440 251.46L1440 281.99L193.14000000000019 0z' fill='rgba(255%2c 255%2c 255%2c .025)'%3e%3c/path%3e%3cpath d='M0 560L185.2 560L0 300.58z' fill='rgba(0%2c 0%2c 0%2c .1)'%3e%3c/path%3e%3cpath d='M0 300.58L185.2 560L665.44 560L0 225.95999999999998z' fill='rgba(0%2c 0%2c 0%2c .075)'%3e%3c/path%3e%3cpath d='M0 225.95999999999998L665.44 560L1059.8500000000001 560L0 98.96999999999998z' fill='rgba(0%2c 0%2c 0%2c .05)'%3e%3c/path%3e%3cpath d='M0 98.96999999999997L1059.8500000000001 560L1119.65 560L0 29.019999999999968z' fill='rgba(0%2c 0%2c 0%2c .025)'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1296'%3e%3crect width='1440' height='560' fill='white'%3e%3c/rect%3e%3c/mask%3e%3clinearGradient x1='15.28%25' y1='-39.29%25' x2='84.72%25' y2='139.29%25' gradientUnits='userSpaceOnUse' id='SvgjsLinearGradient1297'%3e%3cstop stop-color='rgba(35%2c 232%2c 67%2c 1)' offset='0'%3e%3c/stop%3e%3cstop stop-color='rgba(1%2c 158%2c 0%2c 1)' offset='1'%3e%3c/stop%3e%3c/linearGradient%3e%3c/defs%3e%3c/svg%3e"); */

            /* rect */
            /* background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='1440' height='250' preserveAspectRatio='none' viewBox='0 0 1440 250'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1000%26quot%3b)' fill='none'%3e%3crect width='1440' height='250' x='0' y='0' fill='%230e2a47'%3e%3c/rect%3e%3cpath d='M16 250L266 0L471.5 0L221.5 250z' fill='url(%23SvgjsLinearGradient1001)'%3e%3c/path%3e%3cpath d='M284.6 250L534.6 0L621.6 0L371.6 250z' fill='url(%23SvgjsLinearGradient1001)'%3e%3c/path%3e%3cpath d='M493.20000000000005 250L743.2 0L810.7 0L560.7 250z' fill='url(%23SvgjsLinearGradient1001)'%3e%3c/path%3e%3cpath d='M741.8000000000001 250L991.8000000000001 0L1311.3000000000002 0L1061.3000000000002 250z' fill='url(%23SvgjsLinearGradient1001)'%3e%3c/path%3e%3cpath d='M1427 250L1177 0L1136.5 0L1386.5 250z' fill='url(%23SvgjsLinearGradient1002)'%3e%3c/path%3e%3cpath d='M1195.4 250L945.4000000000001 0L819.4000000000001 0L1069.4 250z' fill='url(%23SvgjsLinearGradient1002)'%3e%3c/path%3e%3cpath d='M949.8 250L699.8 0L431.29999999999995 0L681.3 250z' fill='url(%23SvgjsLinearGradient1002)'%3e%3c/path%3e%3cpath d='M707.1999999999999 250L457.19999999999993 0L148.19999999999993 0L398.19999999999993 250z' fill='url(%23SvgjsLinearGradient1002)'%3e%3c/path%3e%3cpath d='M1223.3729678036805 250L1440 33.37296780368038L1440 250z' fill='url(%23SvgjsLinearGradient1001)'%3e%3c/path%3e%3cpath d='M0 250L216.62703219631962 250L 0 33.37296780368038z' fill='url(%23SvgjsLinearGradient1002)'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1000'%3e%3crect width='1440' height='250' fill='white'%3e%3c/rect%3e%3c/mask%3e%3clinearGradient x1='0%25' y1='100%25' x2='100%25' y2='0%25' id='SvgjsLinearGradient1001'%3e%3cstop stop-color='rgba(15%2c 70%2c 185%2c 0.2)' offset='0'%3e%3c/stop%3e%3cstop stop-opacity='0' stop-color='rgba(15%2c 70%2c 185%2c 0.2)' offset='0.66'%3e%3c/stop%3e%3c/linearGradient%3e%3clinearGradient x1='100%25' y1='100%25' x2='0%25' y2='0%25' id='SvgjsLinearGradient1002'%3e%3cstop stop-color='rgba(15%2c 70%2c 185%2c 0.2)' offset='0'%3e%3c/stop%3e%3cstop stop-opacity='0' stop-color='rgba(15%2c 70%2c 185%2c 0.2)' offset='0.66'%3e%3c/stop%3e%3c/linearGradient%3e%3c/defs%3e%3c/svg%3e"); */

            /* abstract paper */
            /* background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='1440' height='560' preserveAspectRatio='none' viewBox='0 0 1440 560'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1022%26quot%3b)' fill='none'%3e%3crect width='1440' height='560' x='0' y='0' fill='%231a4e83'%3e%3c/rect%3e%3cpath d='M0 0L946.98 0L0 702.19z' filter='url(%23SvgjsFilter1023)' fill='%232d409e'%3e%3c/path%3e%3cpath d='M0 560L946.98 560L0 -142.19000000000005z' filter='url(%23SvgjsFilter1023)' fill='%232d409e'%3e%3c/path%3e%3cpath d='M1440 560L493.02 560L1440 -142.19000000000005z' filter='url(%23SvgjsFilter1023)' fill='%232d409e'%3e%3c/path%3e%3cpath d='M1440 0L493.02 0L1440 702.19z' filter='url(%23SvgjsFilter1023)' fill='%232d409e'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1022'%3e%3crect width='1440' height='560' fill='white'%3e%3c/rect%3e%3c/mask%3e%3cfilter height='130%25' id='SvgjsFilter1023'%3e%3cfeGaussianBlur in='SourceAlpha' stdDeviation='5' result='TopLeftG'%3e%3c/feGaussianBlur%3e%3cfeOffset dx='-5' dy='-5' in='TopLeftG' result='TopLeftO'%3e%3c/feOffset%3e%3cfeComponentTransfer in='TopLeftO' result='TopLeftC'%3e%3cfeFuncA type='linear' slope='0.7'%3e%3c/feFuncA%3e%3c/feComponentTransfer%3e%3cfeGaussianBlur in='SourceAlpha' stdDeviation='5' result='TopRightG'%3e%3c/feGaussianBlur%3e%3cfeOffset dx='5' dy='-5' in='TopRightG' result='TopRightO'%3e%3c/feOffset%3e%3cfeComponentTransfer in='TopRightO' result='TopRightC'%3e%3cfeFuncA type='linear' slope='0.7'%3e%3c/feFuncA%3e%3c/feComponentTransfer%3e%3cfeGaussianBlur in='SourceAlpha' stdDeviation='5' result='BottomLeftG'%3e%3c/feGaussianBlur%3e%3cfeOffset dx='-5' dy='5' in='BottomLeftG' result='BottomLeftO'%3e%3c/feOffset%3e%3cfeComponentTransfer in='BottomLeftO' result='BottomLeftC'%3e%3cfeFuncA type='linear' slope='0.7'%3e%3c/feFuncA%3e%3c/feComponentTransfer%3e%3cfeGaussianBlur in='SourceAlpha' stdDeviation='5' result='BottomRightG'%3e%3c/feGaussianBlur%3e%3cfeOffset dx='5' dy='5' in='BottomRightG' result='BottomRightO'%3e%3c/feOffset%3e%3cfeComponentTransfer in='BottomRightO' result='BottomRightC'%3e%3cfeFuncA type='linear' slope='0.7'%3e%3c/feFuncA%3e%3c/feComponentTransfer%3e%3cfeMerge%3e%3cfeMergeNode in='TopLeftC'%3e%3c/feMergeNode%3e%3cfeMergeNode in='TopRightC'%3e%3c/feMergeNode%3e%3cfeMergeNode in='BottomLeftC'%3e%3c/feMergeNode%3e%3cfeMergeNode in='BottomRightC'%3e%3c/feMergeNode%3e%3cfeMergeNode in='SourceGraphic'%3e%3c/feMergeNode%3e%3c/feMerge%3e%3c/filter%3e%3c/defs%3e%3c/svg%3e"); */

            /* background-repeat: repeat-y;
            background-size: cover;
            background-attachment: fixed; */

            background-color: #e4e4e4;
        }


        .cover {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='1440' height='250' preserveAspectRatio='none' viewBox='0 0 1440 250'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1000%26quot%3b)' fill='none'%3e%3crect width='1440' height='250' x='0' y='0' fill='%230e2a47'%3e%3c/rect%3e%3cpath d='M16 250L266 0L471.5 0L221.5 250z' fill='url(%23SvgjsLinearGradient1001)'%3e%3c/path%3e%3cpath d='M284.6 250L534.6 0L621.6 0L371.6 250z' fill='url(%23SvgjsLinearGradient1001)'%3e%3c/path%3e%3cpath d='M493.20000000000005 250L743.2 0L810.7 0L560.7 250z' fill='url(%23SvgjsLinearGradient1001)'%3e%3c/path%3e%3cpath d='M741.8000000000001 250L991.8000000000001 0L1311.3000000000002 0L1061.3000000000002 250z' fill='url(%23SvgjsLinearGradient1001)'%3e%3c/path%3e%3cpath d='M1427 250L1177 0L1136.5 0L1386.5 250z' fill='url(%23SvgjsLinearGradient1002)'%3e%3c/path%3e%3cpath d='M1195.4 250L945.4000000000001 0L819.4000000000001 0L1069.4 250z' fill='url(%23SvgjsLinearGradient1002)'%3e%3c/path%3e%3cpath d='M949.8 250L699.8 0L431.29999999999995 0L681.3 250z' fill='url(%23SvgjsLinearGradient1002)'%3e%3c/path%3e%3cpath d='M707.1999999999999 250L457.19999999999993 0L148.19999999999993 0L398.19999999999993 250z' fill='url(%23SvgjsLinearGradient1002)'%3e%3c/path%3e%3cpath d='M1223.3729678036805 250L1440 33.37296780368038L1440 250z' fill='url(%23SvgjsLinearGradient1001)'%3e%3c/path%3e%3cpath d='M0 250L216.62703219631962 250L 0 33.37296780368038z' fill='url(%23SvgjsLinearGradient1002)'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1000'%3e%3crect width='1440' height='250' fill='white'%3e%3c/rect%3e%3c/mask%3e%3clinearGradient x1='0%25' y1='100%25' x2='100%25' y2='0%25' id='SvgjsLinearGradient1001'%3e%3cstop stop-color='rgba(15%2c 70%2c 185%2c 0.2)' offset='0'%3e%3c/stop%3e%3cstop stop-opacity='0' stop-color='rgba(15%2c 70%2c 185%2c 0.2)' offset='0.66'%3e%3c/stop%3e%3c/linearGradient%3e%3clinearGradient x1='100%25' y1='100%25' x2='0%25' y2='0%25' id='SvgjsLinearGradient1002'%3e%3cstop stop-color='rgba(15%2c 70%2c 185%2c 0.2)' offset='0'%3e%3c/stop%3e%3cstop stop-opacity='0' stop-color='rgba(15%2c 70%2c 185%2c 0.2)' offset='0.66'%3e%3c/stop%3e%3c/linearGradient%3e%3c/defs%3e%3c/svg%3e");
            background-repeat: repeat-y;
            background-size: cover;
            background-attachment: fixed;
        }

        .kalender {
            background-color: #636363;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
            margin-top: 50px;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #ffffff;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .custom-toggler .navbar-toggler {
            border-color: lightgreen;
        }

        @media (max-width: 768px) {
            .carousel-inner .carousel-item>div {
                display: none;
            }

            .carousel-inner .carousel-item>div:first-child {
                display: block;
            }
        }

        .carousel-inner .carousel-item.active,
        .carousel-inner .carousel-item-next,
        .carousel-inner .carousel-item-prev {
            display: flex;
        }

        /* display 3 */
        @media (min-width: 768px) {

            .carousel-inner .carousel-item-right.active,
            .carousel-inner .carousel-item-next {
                transform: translateX(33.333%);
            }

            .carousel-inner .carousel-item-left.active,
            .carousel-inner .carousel-item-prev {
                transform: translateX(-33.333%);
            }
        }

        .carousel-inner .carousel-item-right,
        .carousel-inner .carousel-item-left {
            transform: translateX(0);
        }

        .card-img-top {
            width: 100%;
            height: 15vw;
            object-fit: cover;
        }

        /* [1] The container */
        .img-hover-zoom {
            height: 300px;
            /* [1.1] Set it as per your need */
            overflow: hidden;
            /* [1.2] Hide the overflowing of child elements */
            text-decoration: none;
            color: rgb(36, 36, 36);
        }

        /* [2] Transition property for smooth transformation of images */
        .img-hover-zoom img {
            transition: transform .5s ease;
        }

        /* [3] Finally, transforming the image when container gets hovered */
        .img-hover-zoom:hover img {
            transform: scale(1.4);
        }

        .img-hover-zoom:hover {
            text-decoration: none;
            color: transparent;
        }

        .in-card-scroll {
            height: 150px;
            overflow-y: scroll;
        }

        .tooltip-container {
            position: relative;

            &:hover {
                .tooltip-content {
                    visibility: visible;
                    opacity: 1;
                    transition: .25s all ease;
                    transition-delay: 0s;
                    top: -125px;
                }
            }
        }


        /* Support for all WebKit browsers. */
        -webkit-font-smoothing: antialiased;
        /* Support for Safari and Chrome. */
        text-rendering: optimizeLegibility;

        /* Support for Firefox. */
        -moz-osx-font-smoothing: grayscale;

        /* Support for IE. */
        font-feature-settings: 'liga';

        .tooltip-container {
            position: relative;
        }

        .tooltip-content:hover {
            visibility: visible;
            opacity: 1;
            transition: .25s all ease;
            transition-delay: 0s;
            top: -125px;
        }

        .tooltip-content {
            visibility: hidden;
            opacity: 0;
            position: absolute;
            background: #000000;
            left: -38px;
            top: -130px;
            padding: 0 15px;
            margin: 16px;
            font-size: 15px;
            width: 250px;
            transition: .25s all ease;
            transition-delay: .25s;
            z-index: 2;
            color: #FFFFFF;
        }

        .tooltip-content::after {}

        .separator {
            margin-top: 25px;
            border: 0;
        }

        .separator--line {
            border: 0;
            border-bottom: 5px solid #00226d;
            width: 0;
            animation: separator-width 1s ease-out forwards;
        }

        @keyframes separator-width {
            0% {
                width: 0;
            }

            100% {
                width: 100%;
            }
        }

        .separator--dots {
            overflow: visible;
            border: 0;
            content: "";
            background-color: #00226d;
            display: block;
            height: 7px;
            width: 7px;
            border-radius: 50%;
            position: relative;
        }

        .separator--dots-white {
            overflow: visible;
            border: 0;
            content: "";
            background-color: #e2e2e2;
            display: block;
            height: 7px;
            width: 7px;
            border-radius: 50%;
            position: relative;
        }

        .separator--dots:before {
            content: "";
            background-color: #00226d;
            display: block;
            height: 7px;
            width: 7px;
            border-radius: 50%;
            position: absolute;
            left: -32px;
            animation: dot-move-left 1s ease-out forwards;
        }

        .separator--dots-white:before {
            content: "";
            background-color: #e2e2e2;
            display: block;
            height: 7px;
            width: 7px;
            border-radius: 50%;
            position: absolute;
            left: -32px;
            animation: dot-move-left 1s ease-out forwards;
        }

        .separator--dots:after {
            content: "";
            background-color: #00226d;
            display: block;
            height: 7px;
            width: 7px;
            border-radius: 50%;
            position: absolute;
            left: 32px;
            animation: dot-move-right 1s ease-out forwards;
        }
        .separator--dots-white:after {
            content: "";
            background-color: #e2e2e2;
            display: block;
            height: 7px;
            width: 7px;
            border-radius: 50%;
            position: absolute;
            left: 32px;
            animation: dot-move-right 1s ease-out forwards;
        }
        @keyframes dot-move-right {
            0% {
                left: 0;
            }

            100% {
                left: 32px;
            }
        }

        @keyframes dot-move-left {
            0% {
                left: 0;
            }

            100% {
                left: -32px;
            }
        }


        .separator--dotter {
            border: 0;
            border-bottom: 5px dotted #00226d;
            width: 0;
            animation: separator-width 1.5s ease-out forwards;
        }

        .popover-header {
            background: #3b3b3b;
            color: white;
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg text-white navbar-light bg-light">
        <a href="/"><img class="navbar-brand" src="{{ asset('images/cop.jpeg') }}" alt="COP" width="250px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <div class="d-flex">
                    @if (Route::has('login'))
                        <div class="top-right links">
                            <a href="#calender" class="text-dark">Ke Kalender</a>
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-dark">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-dark">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-dark">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </nav>
    @yield('content')
    <p class="text-dark text-center pt-3">&copy;Copyright 2022 Sistem Informasi Booking Sistem
    </p>



    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>


    <script>
        $('.select2').select2({
            placeholder: "Pilih...",
            allowClear: true
        });

        $(function() {
            $('[data-toggle="modal"]').onClick(function() {
                var modalId = $(this).data('target');
                $(modalId).modal('show');

            });

        });


        $('[data-toggle="popover"]').popover({
            template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
        })
    </script>


</body>

</html>
