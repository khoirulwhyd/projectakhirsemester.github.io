<!DOCTYPE html>
<html>
<head>
    	<title>PILKETUM</title>
      <!--Import Google Icon Font-->
      <link href="../source/font/a.css" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../source/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../source/css/calon.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style type="text/css">
      	
    header, main, footer {
      padding-left: 300px;
    }

    @media only screen and (max-width : 992px) {
      header, main, footer {
        padding-left: 0;
      }
    }
    @media only screen and (max-width : 992px) {
      .a {
        display: block !important;
      }
      .b{
      	width: 100% !important;
      }
      .c{
      	padding: 0px !important;
      }
    }
      </style>
</head>
<body>
    <!-- Navbar goes here -->
  <nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo"><i class="material-icons">cloud</i>Logo</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="sass.html"><i class="material-icons">search</i></a></li>
        <li><a href="badges.html"><i class="material-icons">view_module</i></a></li>
        <li><a href="collapsible.html"><i class="material-icons">refresh</i></a></li>
        <li><a href="mobile.html"><i class="material-icons">more_vert</i></a></li>
      </ul>
    </div>
  </nav>
    <!-- Page Layout here -->
    <div class="row">

      <div class="col m2 l3" style="padding: 0px;">
        <!-- Grey navigation panel -->
        <ul id="slide-out" class="sidenav sidenav-fixed">
		    <li><div class="user-view">
		      <div class="background">
		        <img src="images/office.jpg">
		      </div>
		      <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
		      <a href="#name"><span class="white-text name">John Doe</span></a>
		      <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
		    </div></li>
		    <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
		    <li><a href="#!">Second Link</a></li>
		    <li><div class="divider"></div></li>
		    <li><a class="subheader">Subheader</a></li>
		    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
		</ul>
      </div>

      <div class="col s12 m8 l9">
       <div class="row">
       		<div class="col s12 m12 l12"><p><a href="#" data-target="slide-out" class="sidenav-trigger black-text a" style="display: none;"><i class="material-icons" >menu</i></a></p></div>
       	    <div class="col s12 m4 l2"><p>s12 m4</p></div>
		    <div class="col s12 m4 l8"><p>s12 m4</p></div>
		    <div class="col s12 m4 l2"><p>s12 m4</p></div>	
       </div>
      </div>

    </div>





<!--     <div class="row">
      <div class="col s3 m3 l3">
	       <ul id="slide-out" class="sidenav sidenav-fixed">
		    <li><div class="user-view">
		      <div class="background">
		        <img src="images/office.jpg">
		      </div>
		      <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
		      <a href="#name"><span class="white-text name">John Doe</span></a>
		      <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
		    </div></li>
		    <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
		    <li><a href="#!">Second Link</a></li>
		    <li><div class="divider"></div></li>
		    <li><a class="subheader">Subheader</a></li>
		    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
		  </ul>
      </div>

      <div class="col s12 m9 l9 b" style="padding: 0px;margin: 0px;">
	    <div class="row" style="margin: 0px">
	    <div class="col s12 c" style="padding: 0px">
	    	  <div class="card-panel light-blue" style="margin: 0px">
	    	  	<a href="#" data-target="slide-out" class="sidenav-trigger black-text a" style="display: none;"><i class="material-icons" >menu</i></a>
			    <span class="black-text text-darken-2">This is a card panel with dark blue text</span>
			  </div>
			  <Dropdown Structure >
			<ul id="dropdown1" class="dropdown-content">
			  <li><a href="#!">one</a></li>
			  <li><a href="#!">two</a></li>
			  <li class="divider"></li>
			  <li><a href="#!">three</a></li>
			</ul>
			<nav>
			  <div class="nav-wrapper">
			    <a href="#!" class="brand-logo">Logo</a>
			    <ul class="right hide-on-med-and-down">
			      <li><a href="sass.html">Sass</a></li>
			      <li><a href="badges.html">Components</a></li>
			      <!Dropdown Trigger --\>
			      <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
			    </ul>
			  </div>
			</nav>
	    </div>
	    <div class="col s12 m4 l2"><p>s12 m4</p></div>
	    <div class="col s12 m4 l8"><p>s12 m4</p></div>
	    <div class="col s12 m4 l2"><p>s12 m4</p></div>
	    </div>
      </div>
    </div> -->
<script src="../source/js/jquery-1.8.3.min.js"></script>
<script src="../source/js/materialize.min.js"></script>
<script type="text/javascript">
	  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
</script>
</body>
</html>