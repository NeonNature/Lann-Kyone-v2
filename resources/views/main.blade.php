<!DOCTYPE html>
<html>
<head>
  <title>Lan Kyone</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfl-3OpxnLkWWfQ3PBoZUXOteCKYRLAXw&libraries=geometry,places">
</script>
  <style>
  li:hover a i, .activepill {
    transform: scale(2);
  }
  li:hover a i , li a i, #main:hover, #main {
    transition: 0.2s ease-in-out;
  }
  
  #main:hover {
  transform: rotate(90deg);
  }
  
  .container {
  margin-top: 70px;
  }
  
  .ft:focus {
  outline: none;
  -webkit-box-shadow: none;
  box-shadow: none;
}
.ft, .ft:focus {
background-color: transparent;
color:white;
}

.bgr {
    border-color: transparent;
}
.navbar {
  height:40px;
}
.ef {
  width:200px;    
}
.eff {
   margin: 0 5px 0 5px;
}
.lecontent {
height:200px;
}
#map {
  height: 100%;
  width: 100%;
  margin: 0px;
  padding: 0px
}
html, 
body {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    overflow-x: hidden; 
    background: url(images/bg.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
    
.ci1{      
      height: 70px;
  }
  
  .ci2 {
   height: 120px;
  }
  
.pp {
  width: 150px; 
    height: 150px;
}
  </style>
</head>
<body id="app">
  <nav class="navbar navbar-dark fixed-top">
      <b id="toptitle" class="text-light mx-auto">
         Route
      </b>
  </nav>
    <nav class="fixed-bottom ">
       <ul class="nav nav-navpills nav-justified">
    <li class="nav-item"  id="n1">
      <a class="nav-link" data-toggle="pill" href="#route"><i class="fa fa-map-marker activepill text-warning"></i></a>
    </li>
    <li class="nav-item"  id="n2">
      <a class="nav-link" data-toggle="pill" href="#calendar"><i class="fa fa-calendar text-info"></i></a>
    </li>
    <li class="nav-item" id="main">
      <a class="nav-link" data-toggle="pill" href="#dash"><i class="fa fa-th-large text-danger"></i></a>
    </li>
    <li class="nav-item"  id="n3">
      <a class="nav-link" data-toggle="pill" href="#inbox"><i class="fa fa-commenting-o text-info"></i></a>
    </li>
    <li class="nav-item"  id="n4">
      <a class="nav-link" data-toggle="pill" href="#barz"><i class="fa fa-navicon text-warning"></i></a>
    </li>
  </ul>
  </nav>
    <div class="tab-content">

      <!--  -------------------------           ROUTE    --------------------           -->

    <div id="route" class="container tab-pane active">
  <form action="booking" method="POST">
    <div class="form-group">
      <div class="border p-1 rounded">
        <input type="hidden" name="_token" value={{csrf_token()}}>
        <input type="hidden" id="routeDistance" value="">
        <input type="text" class="form-control ft border-left-0 border-right-0 border-top-0" id="origin-input" name="start" placeholder="From">
        <input type="text" class="form-control ft border-0" id="destination-input" name="end" placeholder="To">
      </div>
    </div>
        <div class="d-flex" role="group">
         <input type="text" placeholder="Time" id="time" name="time" class="btn bgr btn-light w-100 col-6"  onfocus="(this.type='time')" onblur="if(!this.value)this.type='text'">
        <input type="text" placeholder="Date" id="trio2date" name="date" class="btn bgr btn-light w-100 col-6"  onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'">
      </div><br>
      @if (\Session::has('errors'))
      <div class="alert alert-danger">
          <p>{{ \Session::get('errors') }}</p>
      </div><br />
      @endif
      @if (\Session::has('status'))
      <div class="alert alert-success">
          <p>{{ \Session::get('status') }}</p>
      </div><br />
      @endif
      
    

        <div class="lecontent mt-1 mb-1">
          <div id="total"></div>
          <div id="map"></div>
          <div class="d-flex ef mx-auto">
         <a class="btn btn-success mt-3 w-100" id="btnCalculateFees" data-toggle="modal" href="#calc">Calculate Fees</a>
      </div>
        </div>
        
        
        
        
        <div class="modal fade" id="calc">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-center">Confirmation</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        
         <div class="row">
          <b class="col-3">From :</b><span id="txtstart" class="col-9">Chit Poat</span>
          </div><div class="row">
          <b class="col-3">To :</b><span id="txtend" class="col-9">Chit Poat</span>
          </div><div class="row">
          <b class="col-3">Time :</b><span id="txttime" class="col-9">Romantic Time</span>
          </div><div class="row">
          <b class="col-3">Date :</b><span id="txtdate" class="col-9">Romantic Day</span>
          </div>
         <hr />
         <div class="row text-center">
  <div class="card col-3 bg-light text-dark">
    <span class="card-text"><i class="fa fa-user"></i><br /><p id="1user">2500</p></span>
  </div>
  <div class="card col-3 bg-light text-dark">
    <span class="card-text"><i class="fa fa-user"></i><i class="fa fa-user"></i><br /><p id="2user">2500</p></span>
  </div>
  <div class="card col-3 bg-light text-dark">
    <span class="card-text"><i class="fa fa-user"></i><i class="fa fa-user"></i><i class="fa fa-user"></i><br /><p id="3user">2500</p></span>
  </div>
  <div class="card col-3 bg-light text-dark">
    <span class="card-text"><i class="fa fa-user" style="font-size:12px"></i><i class="fa fa-user" style="font-size:12px"></i><i class="fa fa-user" style="font-size:12px"></i><i class="fa fa-user" style="font-size:12px"></i><br /><p id="4user">2500</p></span>
  </div>
  </div>
         
        </div>
        <div class="modal-footer">
          <button type="button" id="btnBook" class="btn btn-block btn-success">Confirm</button>
          <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Cancel</button>
        </div>
        
      </div>
    </div>
  </div>
  </form>
  </div>


<!-- ----------------------- Calendar ----------------------->
<div id="calendar" class="container tab-pane fade">
   
  <div class="card" id="c1">
    <div class="card-body">
     <div class="card-text row">
     <div class="col-4 text-center">
        <h4>20</h4>
        <h5>WED</h5>
      </div>
      <div class="col-8">
        <small>Some example text. Some example .....</small>
      </div>
      </div>
      <div class="float-left">
      <a  data-toggle="modal" data-target="#card1"><span class="badge badge-secondary">View</span></a>
      </div>
      <div class="float-right">
      <a href="#"><span class="badge badge-danger">Delete</span></a>
      </div>
    </div>
  </div>
  <div class="modal fade" id="card1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-center ml-3"><h4>20 WED</h4> <small class="ml-2">July, 2018</small></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         Some example text. Some example text. Some example text. Some example text.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-block btn-secondary">Edit</button>
        </div>
        
      </div>
    </div>
  </div>
</div>
<!-- ----------------------- Calendar ----------------------->
<div id="dash" class="container tab-pane fade">
   
   
<div id="slide1" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner ci1 text-center">
    <div class="carousel-item active">
     <div class="card bg-light">
    <div class="card-body">
      <p class="card-text">Weather</p>
    </div>
  </div>
    </div>
    <div class="carousel-item">
      <div class="card bg-light">
    <div class="card-body">
      <p class="card-text">Traffic</p>
    </div>
  </div>
    </div>
    <div class="carousel-item">
      <div class="card bg-light">
    <div class="card-body">
      <p class="card-text">Advertisements</p>
    </div>
  </div>
    </div>
    <br />
  </div>
  <a class="carousel-control-prev" href="#slide1" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#slide1" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
  
</div>
<div class="card">
    <div class="card-body">
      <h5 class="card-title text-center">Bookmarked Route</h5>
    <hr />
      <p class="card-text">
      <ul> <li id="dbdata">
      Home ----- YTU <br/> 
      21th July, 2018 <br/>
      7:10 A.M.
      </li> </ul>
      </p>
    </div>
</div>
<div id="slide2" class="carousel slide mt-1" data-ride="carousel">
  <div class="carousel-inner ci2 text-center">
    <div class="carousel-item active">
     <div class="card ci2 bg-light">
    <div class="card-body">
      <p class="card-text">Survey Result</p>
    </div>
  </div>
    </div>
    <div class="carousel-item">
      <div class="card ci2 bg-light">
    <div class="card-body">
      <p class="card-text">Driver Feedback</p>
    </div>
  </div>
    </div>
    <div class="carousel-item">
      <div class="card ci2 bg-light">
    <div class="card-body">
      <p class="card-text">Some Random Quack</p>
    </div>
  </div>
    </div>
    <br />
  </div>
  <a class="carousel-control-prev" href="#slide2" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#slide2" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
  
</div>
</div>
<!--               ----------------Inbox--------------------- -->


<div id="inbox" class="container tab-pane fade">
  <div></div>
</div>


<!--               ----------------Nav--------------------- -->


<div id="barz" class="container tab-pane fade">


   <img src="https://avatarfiles.alphacoders.com/477/47.jpg
" class="rounded-circle pp d-block mx-auto" alt="Profile Picture">

<div class="text-center mt-3">
<i class="text-light" id="phone">+959 123456789</i>
<p class="text-light" id="organization">ducksquad@quack.com</p>
</div>
<button type="button" class="btn btn-outline-danger btn-block mt-3">Logout</button>
<hr /><br /><br />
<div class="text-center">
<h5 class="text-light">Connected Apps</h5><br />
<i class="fa fa-facebook-square text-primary mr-3" style="font-size:24px;"></i>
<i class="fa fa-twitter text-secondary mr-3" style="font-size:24px"></i>
<i class="fa fa-reddit text-secondary mr-3" style="font-size:24px"></i>
</div>
<hr />


</div>


</div>
</body>
</html>
<script>
$( document ).ready(function() {
   $.ajaxSetup({
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

$('#n1').click(function()
    {
      var today=new Date();
      var date=today.getDate();
      var month=today.getMonth()+1;
      var year=today.getFullYear();
      document.getElementById('trio2date').value=date+'/'+month+'/'+year;

      $( ".fa-map-marker" ).addClass( "activepill" );      
      $( ".fa-calendar" ).removeClass( "activepill" );
      $( ".fa-th-large" ).removeClass( "activepill" );
      $( ".fa-commenting-o" ).removeClass( "activepill" );
      $( ".fa-navicon" ).removeClass( "activepill" );
      document.getElementById("toptitle").innerHTML = "Route";
    });
  $('#n1').click(function()
    {
      
      $( ".fa-map-marker" ).addClass( "activepill" );      
      $( ".fa-calendar" ).removeClass( "activepill" );
      $( ".fa-th-large" ).removeClass( "activepill" );
      $( ".fa-commenting-o" ).removeClass( "activepill" );
      $( ".fa-navicon" ).removeClass( "activepill" );
      document.getElementById("toptitle").innerHTML = "Route";
    });
  $('#n2').click(function()
    {
      
      $( ".fa-map-marker" ).removeClass( "activepill" );      
      $( ".fa-calendar" ).addClass( "activepill" );
      $( ".fa-th-large" ).removeClass( "activepill" );
      $( ".fa-commenting-o" ).removeClass( "activepill" );
      $( ".fa-navicon" ).removeClass( "activepill" );
      document.getElementById("toptitle").innerHTML = "Calendar";
    });
  $('#main').click(function()
    {
      $.get('booking/last/{{Auth::user()->id}}', function(data, status)
      {


        var startarr=data.start.split(',');
        var endarr=data.end.split(',');
        document.getElementById("dbdata").innerHTML=startarr[0]+" ----- "+endarr[0]+"<br>"+data.time;
      });
      
      $( ".fa-map-marker" ).removeClass( "activepill" );      
      $( ".fa-calendar" ).removeClass( "activepill" );
      $( ".fa-th-large" ).addClass( "activepill" );
      $( ".fa-commenting-o" ).removeClass( "activepill" );
      $( ".fa-navicon" ).removeClass( "activepill" );
      document.getElementById("toptitle").innerHTML = "Dashboard";
    });
  $('#n3').click(function()
    {
      $.get('booking/last/{{Auth::user()->id}}', function(data, status)
      {
          var contentshtml=$('#inbox');
          var contents=$('#inbox').html();
          if(data.status==0)
          {
            var content='<div class="card" id="c1"> <div class="card-body"><div class="card-text">Your booking is submitted. Please get ready to ride.</div><div class="float-left"></div></div>';
            contentshtml.html(content+contents);
          }
          else if(data.status==1)
          {
            var startarr=data.start.split(',');
            var endarr=data.end.split(',');
            var content='<div class="card" id="c1"> <div class="card-body"><div class="card-text">Your booking from '+startarr[0]+' to '+endarr[0]+' is ready. Please get ready to ride.</div><div class="float-left"></div></div>';
            contentshtml.html(content+contents);
          }
      });

      $( ".fa-map-marker" ).removeClass( "activepill" );      
      $( ".fa-calendar" ).removeClass( "activepill" );
      $( ".fa-th-large" ).removeClass( "activepill" );
      $( ".fa-commenting-o" ).addClass( "activepill" );
      $( ".fa-navicon" ).removeClass( "activepill" );
      document.getElementById("toptitle").innerHTML = "Messages";
    });
$('#n4').click(function()
    {
      $.get('user/{{Auth::user()->id}}', function(data, status){
        document.getElementById("toptitle").innerHTML = data.name;
        document.getElementById("phone").innerHTML = data.phone;
        document.getElementById("organization").innerHTML = data.organization;
      });
      
      $( ".fa-map-marker" ).removeClass( "activepill" );      
      $( ".fa-calendar" ).removeClass( "activepill" );
      $( ".fa-th-large" ).removeClass( "activepill" );
      $( ".fa-commenting-o" ).removeClass( "activepill" );
      $( ".fa-navicon" ).addClass( "activepill" );
      //document.getElementById("toptitle").innerHTML = "Full Name";
    });
$('#btnCalculateFees').click(function()
{
  var start=$("input[name=start]").val();
  var end=$("input[name=end]").val();
  var time=$("input[name=time]").val();
  var date=$("input[name=date").val();
  var distance=document.getElementById('routeDistance').value;

  var startarr=start.split(',');
  var endarr=end.split(',');
  var distancearr=distance.split(' ');

  document.getElementById('txtstart').innerHTML=startarr[0];
  document.getElementById('txtend').innerHTML=endarr[0];
  document.getElementById('txttime').innerHTML=time.toString();
  document.getElementById('txtdate').innerHTML=date;
  var cost=parseInt(calculateFee(parseInt(distancearr[0])));
  cost=Math.round(cost/100)*100;

  document.getElementById('1user').innerHTML=cost+" MMK";
  document.getElementById('2user').innerHTML=Math.round(cost/200)*100+ " MMK";
  document.getElementById('3user').innerHTML=Math.round(cost/300)*100+" MMK";
  document.getElementById('4user').innerHTML=Math.round(cost/400)*100+" MMK";

});
$('#btnBook').click(function()
  {
    var start=$("input[name=start]").val();
      var end=$("input[name=end]").val();
      var time=$("input[name=time]").val();
      var cost=document.getElementById('1user').innerHTML;
      console.log(parseInt(cost));
      $.post("booking", 
        {
          "start": start,
          "end": end,
          "time": time,
          "price": parseInt(cost)
        },function(data, status){
          document.write(data);
      });

  });

function calculateFee(mile)
{
  var cost=1300+(1.60934*mile*300);
  var cost1=Math.round(cost/100)*100;
  var cost2=Math.round(cost/200)*100;
  var cost3=Math.round(cost/300)*100;
  var cost4=Math.round(cost/400)*100;
  totalcost=[cost1, cost2, cost3, cost4];
  return totalcost;
}
    
var infowindow;
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    mapTypeControl: false,
    center: {
      lat: 16.866069,
      lng: 96.195132
    },
    zoom: 14
  });
  infowindow = new google.maps.InfoWindow();
  new AutocompleteDirectionsHandler(map);
}
function AutocompleteDirectionsHandler(map) {
  this.map = map;
  this.originPlaceId = null;
  this.destinationPlaceId = null;
  this.travelMode = 'DRIVING';
  var originInput = document.getElementById('origin-input');
  var destinationInput = document.getElementById('destination-input');
  this.directionsService = new google.maps.DirectionsService();
  this.directionsDisplay = new google.maps.DirectionsRenderer();
  this.directionsDisplay.setMap(map);
  var originAutocomplete = new google.maps.places.Autocomplete(
    originInput, {
      placeIdOnly: true
    });
  var destinationAutocomplete = new google.maps.places.Autocomplete(
    destinationInput, {
      placeIdOnly: true
    });
  this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
  this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');
}
// Sets a listener on a radio button to change the filter type on Places
// Autocomplete.
AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
  var me = this;
  autocomplete.bindTo('bounds', this.map);
  autocomplete.addListener('place_changed', function() {
    var place = autocomplete.getPlace();
    if (!place.place_id) {
      window.alert("Please select an option from the dropdown list.");
      return;
    }
    if (mode === 'ORIG') {
      me.originPlaceId = place.place_id;
    } else {
      me.destinationPlaceId = place.place_id;
    }
    me.route();
  });
};
AutocompleteDirectionsHandler.prototype.route = function() {
  if (!this.originPlaceId || !this.destinationPlaceId) {
    return;
  }
  var me = this;
  this.directionsService.route({
    origin: {
      'placeId': this.originPlaceId
    },
    destination: {
      'placeId': this.destinationPlaceId
    },
    travelMode: this.travelMode
  }, function(response, status) {
    if (status === 'OK') {
      me.directionsDisplay.setDirections(response);
      var center = response.routes[0].overview_path[Math.floor(response.routes[0].overview_path.length / 2)];
      infowindow.setPosition(center);
      infowindow.setContent(response.routes[0].legs[0].duration.text + "<br>" + response.routes[0].legs[0].distance.text);
      document.getElementById('routeDistance').value=response.routes[0].legs[0].distance.text;
      infowindow.open(me.map);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
};
google.maps.event.addDomListener(window, "load", initMap);
</script>