

<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{asset('public/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('public/css/style.css')}}">
        <!-- Website Font style -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
        <title>Admin</title>
    </head>
    <body>
        <div class="container">
            <div class="row main">
                <div class="panel-heading">
                    <div class="panel-title text-center">
                        <h1 class="title">User registration</h1>
                        <hr />
                    </div>
                </div> 
                <div class="main-login main-center">
                    @yield("content")
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{asset("public/js/bootstrap.min.js")}}"></script>
    </body>
</html>