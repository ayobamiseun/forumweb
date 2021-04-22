<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>{{ config('app.name', 'Testimony') }}</title>
        <link rel="shortcut icon" href="{{ asset('img/Letter-T-PNG-Free-Commercial-Use-Images.png') }}">
        @yield('styles')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/css/froala_style.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/css/stylesheet.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/responsive.css') }}" rel="stylesheet" media="all and (max-width: 700px), all and (max-device-width: 700px)">
        <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
        <!--[if lte IE 9]>
            <link href="{{ asset('/css/tweaks.css') }}" rel="stylesheet">
        <![endif]-->
    </head>
    <body>
    <!-- modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <!-- <h5 class="modal-title" id="exampleModalLabel">Search</h5> -->
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form action="{{ route('search') }}" method="get">
                                <fieldset>
                                    <input name="q" type="search" maxlength="128" title="Search for keywords" class="inputbox search tiny" size="20" value="" placeholder="Search…" />
                                    <button class="button icon-button search-icon" type="submit" title="Search">Search</button>
                                </fieldset>
                            </form>
                            </div>
                           
                            </div>
                        </div>
                 </div>
     <!-- modal -->
     <!-- modal -->
     <div class="modal fade" id="post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title align-center"  id="exampleModalLabel">Share Testimony</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('topic.create') }}" id="register">
                {{ csrf_field() }}
                <div class="panel">
                    <div class="inner">
                        <h2>Share Your Testimony</h2>
                        <fieldset class="fields2">
                            <div >
                                <label for="title">Title:</label>
                                <input type="text" name="title" id="title" size="25" value="{{ old('title') }}" class="inputbox" title="Title"  style=" width:100%;"/>
                                    @if ($errors->has('title'))
                                    <br /><span class="error">{{ $errors->first('title') }}</span>
                                    @endif
                            </div>
                            <div>
                                <label for="description">Description:</label>
                                <textarea name="description" id="description" title="description"  style=" width:100%; height:100px;">{{ old('description') }}</textarea>
                                    @if ($errors->has('description'))
                                    <br /><span class="error">{{ $errors->first('description') }}</span>
                                    @endif

                            </div>
                           
                        </fieldset>
                    </div>
                </div>
                <div class="panel">
                    <div class="inner">
                        <fieldset class="submit-buttons">
                            <input type="reset" value="Reset" name="reset" class="button2" />&nbsp;
                            <input type="submit" name="submit" id="submit" value="Submit" class="button1 default-submit-action" />
                        </fieldset>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>
     <!-- modal -->
                 
        <div id="wrap">
            <div id="page-header">
                <div class="headerbar" role="banner">
                    <!-- <div class="inner">
                        <div id="site-description">
                            <a class="logo" href="{{ route('index') }}" title="Board index"><img src="{{ asset('/img/vanhack-logo.svg') }}" title="VanHack Forum" style="width:50px"></a>
                            <h1>Testimonyr</h1>
                        </div>
                        <div id="search-box" class="search-box search-header" role="search">
                            <form action="{{ route('search') }}" method="get">
                                <fieldset>
                                    <input name="q" type="search" maxlength="128" title="Search for keywords" class="inputbox search tiny" size="20" value="" placeholder="Search…" />
                                    <button class="button icon-button search-icon" type="submit" title="Search">Search</button>
                                </fieldset>
                            </form>
                        </div>
                    </div> -->
                </div>
                <div class="navbar" role="navigation">
                    <div class="inner">
                        <ul id="nav-main" class="linklist bulletin" role="menubar">
                            <li class="" ><a href="{{ route('index') }}" title="Board indes" role="menuitem"><img src="{{ asset('/img/Letter-T-PNG-Free-Commercial-Use-Images.png') }}" title="Forum" style="width:20px"></a></li>
                            <!-- <li class="small-icon icon-search" data-toggle="modal" data-target="#exampleModal"><a href="{{ route('faq') }}" rel="help" title="Frequently Asked Questions" role="menuitem"></a> <button data-toggle="modal" data-target="#exampleModal">search</button></li> -->
                            <li class="small-icon icon-search rightside" data-toggle="modal" data-target="#exampleModal"><a href="{{ route('faq') }}" rel="help" title="Frequently Asked Questions" role="menuitem"></a> <button data-toggle="modal" data-target="#exampleModal"></button></li>
                            
                           
                            @if (Auth::check())
                            <li class="small-icon icon-logout 
                            rightside" ><a href="{{ route('logout') }}" title="Login" role="menuitem" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color:black">Logout</a></li>
                            <li class="small-icon icon-phone rightside" data-toggle="modal" data-target="#post"><a href="{{ route('faq') }}" rel="help" title="Frequently Asked Questions" role="menuitem"></a> <button data-toggle="modal" data-target="#post">post</button></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            <li class="small-icon small-icon-profile rightside"><a href="{{ route('profile') }}" role="menuitem"style="color:black"><img src="{{ $_user->profile_small_picture_url }}" /> {{ $_user->user_name }}</a></li>
                            
                            @else
                            <li class="small-icon icon-logout rightside"><a href="{{ route('login') }}" title="Login" role="menuitem">Login</a></li>
                            <li class="small-icon icon-register rightside"><a href="{{ route('register') }}" role="menuitem">Register</a></li>
                            @endif
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div id="page-body" role="main">
                <!-- <p class="responsive-center time">{{ \Carbon\Carbon::now()->format('d M Y | H:i') }}</p> -->
                <div class="clear"></div>
                @if (Session::has('status'))
                <div class="alert alert-success alert-dismissable" style="margin-top:18px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                    {{ Session::get('status') }}
                </div>
                @endif
                @if (Session::has('message'))
                <div class="alert alert-success alert-dismissable" style="margin-top:18px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                    {!! Session::get('message') !!}
                </div>
                @endif
                @yield('content')
            </div>
            <div id="page-footer" role="contentinfo">
                <div class="navbar" role="navigation">
                    <div class="inner">
                        <ul id="nav-footer" class="linklist bulletin" role="menubar">
                            <li class="small-icon icon-home breadcrumbs">
                                <span class="crumb"><a href="{{ route('index') }}">Board index</a></span>
                            </li>
                            <!-- <li class="rightside">All times are <abbr title="UTC">UTC</abbr></li> -->
                        </ul>
                    </div>
                </div>
                <div class="copyright">
                    LTM/Radio
                </div>
            </div>
        </div>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/popper.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        </script>
<script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.scrolling-pagination').jscroll({
            autoTrigger: true,
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.scrolling-pagination',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
</script>
        @yield('scripts')
    </body>
</html>
