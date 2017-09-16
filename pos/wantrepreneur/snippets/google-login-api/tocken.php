
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    


    
    <meta name="google-signin-client_id" content="762314707749-fpgm9cgcutqdr6pehug9khqal9diajaq.apps.googleusercontent.com">

    <script src="https://apis.google.com/js/platform.js" async defer></script>
    
  </head>

  <body>










  <div class="g-signin2" data-onsuccess="onSignIn"></div>


  <a href="#" onclick="signOut();">Sign out</a>
<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
</script>


<script>



function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  var id_token = googleUser.getAuthResponse().id_token;
  
  alert('ID Token: ' + id_token);
  /*console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail());*/
}


</script>


</div>

    
    
  </body>
</html>
