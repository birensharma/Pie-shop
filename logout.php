<script src="https://www.gstatic.com/firebasejs/5.11.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.11.1/firebase-auth.js"></script>	

<!-- <?php
session_unset(); 
session_destroy(); 
?> -->

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
  
  console.log("signing out")
  firebase.auth().signOut().then(() => {
    console.log("Signed out")
    location.href = "index.php"
  }).catch(function(error) {
    console.log(error)
  });
</script>