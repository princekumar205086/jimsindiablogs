<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Personal blog</title>

  <!-- Fonts -->
  <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- css goes here -->
  <style>
    body,
    html {
      height: 100%;
      margin: 0;
    }

    .bgimg {
      background-image: url("public/img/beach.jpg");
      height: 100%;
      background-position: center;
      background-size: cover;
      position: relative;
      color: white;
      font-family: "Courier New", Courier, monospace;
      font-size: 25px;
    }

    .topleft {
      position: absolute;
      top: 0;
      left: 16px;
    }

    .bottomleft {
      position: absolute;
      bottom: 0;
      left: 16px;
      background-color: #4195f1;
      opacity: 0.8;
    }

    .middle {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      opacity: 0.8;
      /* add this line */
      background-color: #4195f1;
      padding:50px;
    }


    hr {
      margin: auto;
      width: 40%;
    }
  </style>
</head>

<body class="antialiased">
  <div class="bgimg">
    <div class="topleft">
      <p></p>
    </div>
    <div class="middle">
      <h2>JIMSINDIABLOG</h2>
      <h1>COMING SOON</h1>
      <hr>
      <p>Something big is about to come!</p>
      <p id="demo" style="font-size:30px"></p>
      <p>Run and managed by <a href="https://www.webdigger.in/" target="_blank">Webdigger</a></p>
    </div>
    <div class="bottomleft">
      
    </div>
  </div>
  <!-- javascript code -->
  <script>
    // Set the date we're counting down to
    var countDownDate = new Date("Jun 1, 2023 12:00:25").getTime();

    // Update the count down every 1 second
    var countdownfunction = setInterval(function() {

      // Get todays date and time
      var now = new Date().getTime();

      // Find the distance between now an the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Output the result in an element with id="demo"
      document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
        minutes + "m " + seconds + "s ";

      // If the count down is over, write some text 
      if (distance < 0) {
        clearInterval(countdownfunction);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);
  </script>

</body>

</html>