<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
<head>
  <title>{{ config('app.name', 'Laravel') }}</title>	
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta charset="utf-8">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- <script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
    </script> -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <link rel="stylesheet" href="{{url('/')}}/css/ChildrensInformation.css">



    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">

  </head>
  <body>
  <div class="nav-bar">
  <h1 class="head" id="head">Orphan Care Solutions</h1>
  
  <a href="{{ route('logout') }}"
      onclick="event.preventDefault();
               document.getElementById('logout-form').submit();" class="logout">
      <span class="glyphicon">&#xe163;</span>Logout
  </a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
  </form>

  <!-- <a href="../auth/logout" class="logout"><span class="glyphicon">&#xe163;</span> Logout</a> -->
  <p class="welcome">Welcome {{ Auth::user()->name }} !</p>
</div>
<div class="vmenu-button" id="ham"><span class="glyphicon">&#xe236;</span></div>
    <div>
      <div class="menu-box" id="accordion">
      <ul>
        <li>
          <a href="{{url('care_giver')}}" class="vert-menu-item-home">
            <span class="glyphicon">&#xe021;</span>
            Home
          </a>
        </li>
        <li>
          <a class="vert-menu-item collapsed" data-parent="#accordion" data-toggle="collapse" data-target="#prof-col">
            Settings
          </a>
          <ul id="prof-col" class="col collapse">

            <li><a href="{{url('/care_giver/changepassword')}}">Change Password</a></li>
          </ul>
        </li>
        <li>
          <a class="vert-menu-item collapsed" data-parent="#accordion" data-toggle="collapse" data-target="#child-col">
            Children
          </a>
          <ul id="child-col" class="col collapse">
            <li><a href="{{url('care_giver/children')}}">View</a></li>
          </ul>
        </li>
        
       
      </ul>
    </div> 
    <div class="workspace-box"> 
      @yield('content')
    </div>
  </div>
  </body>
</html>
