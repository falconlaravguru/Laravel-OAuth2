<html>
<head>
    <title>GoogleSignIn</title>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://apis.google.com/js/api:client.js"></script>
    <meta name="google-signin-client_id" content="14473722966-gdnbfrr17vg2lobfgedqmab6cfs6c5mn.apps.googleusercontent.com" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <!--GoogleSignIn Button -->
    <div class="g-signin2" data-onsuccess="onSignIn"></div>
    <!--GoogleSignIn Test Button-->
    <!--<button id="SignInBtn" class="btn btn-primary">TestGoogleBtn</button>-->
    <!--GoogleSignOut Button-->
    <a href="#" onclick="onSignout();">Sign Out</a>
    <!--Javascript Partial-->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function onSignIn(googleUser) {
            var profile = googleUser.getBasicProfile();
            var token_id = googleUser.getAuthResponse().id_token;

            $.ajax({
                url: "verifyToken",
                data: {
                    'id_token': token_id
                },
                type: 'POST',
                dattype: 'json',
                success: function(data) {
                    alert(data);
                }
            });
        }
        
        function onSignout() {
            var auth2 = gapi.auth2.getAuthInstance();

            auth2.signOut().then(function() {
                console.log('User already signed out');
            });
        }
    </script>
</body>
</html>