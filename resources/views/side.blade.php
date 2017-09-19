
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">


    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <div id="side" class="row">
        <div class="navbar-fixed-top">
        <nav style="background-color: #28abcb" >
        <ul class="navbar-header" style="font-size: xx-large">
           <li><a href="{{ url('/home') }}"><h6> HOME</h6> </a></li>
           <li><a href="{{ url('/home') }}"><h6> Profile</h6> </a></li>
           <li class="pull-right"><a href="{{ url('/logout') }}" > <h6><span class="glyphicon glyphicon-log-out"></span></h6>
               </a></li>

        </ul>
    </nav>

            </div>


<ul id="slide-out" class="side-nav fixed" style="background-color: #28abcb">
    </br></br></br>

    <li><div class="userView">
            <div class="background" style="background: transparent">
                <img src="images/user-img-background.jpg" width="320px" height="220px">
            </div>

                <span class="white-text name">Super Admin</span>
            {{--<span class="white-text name"> {{ Auth::user()->name }}</span>--}}

            <a href=""><img class="circle" src="images/patrick.jpg"></a>

           <span class="white-text email">{{ Auth::user()->email }}</span>

            {{--category of authenticate person--}}

        </div></li>
    {{--<li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>--}}

        <li><a href="home">Home</a></li>
        <li><a href="register">Register Nurse</a></li>
        <li><a href="blockUser">Block User</a></li>

    {{--<li><a href="{{ url('/logout') }}"> <span class="glyphicon glyphicon-log-out"></span> </a></li>--}}
   <li> <a href="{{ route('logout') }}">
           Logout <span class="glyphicon glyphicon-log-out"></span>
       </a></li>

    {{--<li><a href="#!">Second Link</a></li>--}}
    {{--<li><div class="divider"></div></li>--}}
    {{--<li><a class="subheader">Subheader</a></li>--}}
    {{--<li><a class="waves-effect" href="#!">Third Link With Waves</a></li>--}}
</ul>
<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>

        @yield('data')

    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

<script>

    $('.button-collapse').sideNav({
                width:300,// Default is 240
                edge: 'right', // Choose the horizontal origin
                closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
                draggable: true // Choose whether you can drag to open on touch screens
            }
    );
</script>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
