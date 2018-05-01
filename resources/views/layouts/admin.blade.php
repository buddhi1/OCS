<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
    </script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="{{url('/')}}/css/ChildrensInformation.css">


    <meta charset="utf-8">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">

  </head>
  <body>


        <div class="menu-box" id="accordion">
      <ul>
        <li>
          <a href="../users/profile" class="vert-menu-item-home">
            <span class="glyphicon">&#xe021;</span>
            Home
          </a>
        </li>
        <li>
          <a class="vert-menu-item collapsed" data-parent="#accordion" data-toggle="collapse" data-target="#prof-col">
            Settings
          </a>
          <ul id="prof-col" class="col collapse">

            <li><a href="/SMP/users/changePassword">Change Password</a></li>
          </ul>
        </li>
        <li>
          <a class="vert-menu-item collapsed" data-parent="#accordion" data-toggle="collapse" data-target="#user-col">
            Users
          </a>
          <ul id="user-col" class="col collapse">
            <li><a href="../users/create">Create User</a></li>
            <li><a href="../users/index">All Users</a></li>
          </ul>
        </li>
        <li>
          <a class="vert-menu-item collapsed" data-parent="#accordion" data-toggle="collapse" data-target="#careGiver-col">
            Care Giver
          </a>
          <ul id="careGiver-col" class="col collapse">
            <li><a href="">Edit</a></li>
            <li><a href="">View</a></li>
          </ul>
        </li>

        <li>
          <a class="vert-menu-item collapsed" data-parent="#accordion" data-toggle="collapse" data-target="#agency-col">
            Agency
          </a>
          <ul id="agency-col" class="col collapse">
            <li><a href="">Edit</a></li>
            <li><a href="">View</a></li>
          </ul>
        </li>
        <li>
          <a class="vert-menu-item collapsed" data-parent="#accordion" data-toggle="collapse" data-target="#CaseWorker-col">
            Case Worker
          </a>
          <ul id="CaseWorker-col" class="col collapse">
            <li><a href="">Edit</a></li>
            <li><a href="">View</a></li>
          </ul>
        </li>


        <li>
          <a class="vert-menu-item collapsed" data-parent="#accordion" data-toggle="collapse" data-target="#child-col">
            Child
          </a>
          <ul id="child-col" class="col collapse">
            <li><a href="">Edit</a></li>
            <li><a href="">View</a></li>
          </ul>
        </li>


        <li>
          <a class="vert-menu-item collapsed" data-parent="#accordion" data-toggle="collapse" data-target="#advocate-col">
            Advocate
          </a>
          <ul id="advocate-col" class="col collapse">
            <li><a href="">Edit</a></li>
            <li><a href="">View</a></li>
          </ul>
        </li>


      </ul>
    </div>  
  @yield('content')
  </body>
</html>
