<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
    body {
      background-image: url('./image/dish_2.jpg');
      justify-content: center;
      align-items: center;
    }

    .jumbotron {
      margin: 30px;
      background: rgba(0, 0, 0, 0.3);
      text-align: center;
    }

    .container div:first-child {
      margin-top: 100px;
      background-color: rgba(0, 0, 0, 0.5)
    }
  </style>
  <script src="https://www.gstatic.com/firebasejs/5.11.0/firebase.js"></script>
  <script>
    var config = {
      apiKey: "AIzaSyBHJ9vrRyAd034N9gZk1bBalIqd67ZEA84",
      authDomain: "localpieshop.firebaseapp.com",
      databaseURL: "https://localpieshop.firebaseio.com",
      projectId: "localpieshop",
      storageBucket: "localpieshop.appspot.com",
      messagingSenderId: "460778532674"
    };
    firebase.initializeApp(config);
  </script>
  <meta charset="UTF-8">
  <title>Pie Shop</title>
  <script src="https://cdn.firebase.com/libs/firebaseui/3.6.0/firebaseui.js"></script>
  <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/3.6.0/firebaseui.css" />

  <script type="text/javascript">
    var uiConfig = {
      signInSuccessUrl: 'dashboard.php',
      signInOptions: [
        firebase.auth.GoogleAuthProvider.PROVIDER_ID,
        firebase.auth.EmailAuthProvider.PROVIDER_ID,
      ],
      tosUrl: '<your-tos-url>',
      privacyPolicyUrl: () => {
        window.location.assign('<your-privacy-policy-url>');
      }
    };

    var ui = new firebaseui.auth.AuthUI(firebase.auth());
    ui.start('#firebaseui-auth-container', uiConfig);
  </script>
</head>

<body>

  <div class="jumbotron text-light">
    <h1>WELCOME TO PIE SHOP</h1><br><br>
    <div id="firebaseui-auth-container"> </div>
    <br><br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">
      Sign Up
    </button>
  </div>

  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modlabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sign Up for our Pie Shop</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="firebaseSignupForm" method="post">
            <div class="form-group">
              <label for="femail">Email address</label>
              <input type="email" class="form-control" id="femail" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <p id="errmsg" class="text-danger"></p>
            <button type="submit" class="btn btn-primary float-right" data-dismiss="alert" id="submitbtn">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="alert alert-success alert-dismissible fade show" role="alert" style="display:none;position:absolute;top:0;">
    <strong>Success!</strong> Sign Up Suceessful
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</body>
<script>
  let sbtn = document.getElementById('submitbtn')

  sbtn.onclick = e => {
    e.preventDefault()
    firebase.auth().createUserWithEmailAndPassword(e.path[1][0].value, e.path[1][1].value)
      .then(v => {
        $(".alert").css('display', 'block').alert()
        $('#modal').modal('toggle')
      })
      .catch(error => {
        $('#errmsg').text(error.message)
      });
  }
</script>

</html>