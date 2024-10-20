<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
  <style>
    body {
      text-align: center;
      padding: 40px 0;
      background: #EBF0F5;
    }
    h1 {
      color: #D9534F; /* Change color to indicate error */
      font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
      font-weight: 900;
      font-size: 40px;
      margin-bottom: 10px;
    }
    p {
      color: #404F5E;
      font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
      font-size: 20px;
      margin: 0;
    }
    i {
      color: #D9534F; /* Change icon color to indicate error */
      font-size: 100px;
      line-height: 200px;
      margin-left: -15px;
    }
    .card {
      background: white;
      padding: 60px;
      border-radius: 4px;
      box-shadow: 0 2px 3px #C8D0D8;
      display: inline-block;
      margin: 0 auto;
    }
  </style>
  <body>
    <div class="card">
      <div style="border-radius: 200px; height: 200px; width: 200px; background: #F8FAF5; margin: 0 auto;">
        <i class="checkmark">✖</i> <!-- Change checkmark to a cross for failure -->
      </div>
      <h1>Payment Failed</h1> <!-- Change heading to indicate failure -->
      <p>Unfortunately, your payment could not be processed.<br/> Please try again or contact support.</p> <!-- Update message -->
      <br>
      <a href="{{route('home')}}"><h3> Goto Home </h3> </a>

    </div>
  </body>
</html>
