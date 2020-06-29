<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE-edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>MiniStore/Login</title>
        <link rel="stylesheet" href="../css/all.min.css" />
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/media.css" />
        <link rel="stylesheet" href="../css/style_buttons.css" />
        <link rel="stylesheet" href="../css/style_checkbox_radio.css" />
        <link rel="stylesheet" href="../css/style_authentication.css" />
        <link rel="stylesheet" href="../css/style_alerts.css" />
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
        <link rel="icon" href="../images/H.jpg" />
    </head>
    <body>

        <section class="auth">
            @include('layout.Messages')
            <form method="post" action="{{ url('/') }}">
                @csrf
                <h2>HaBsawy</h2>
                <h3>تسجيل دخول</h3>
                <div class="form-group">
                    <div class="left-icon">
                        <input type="text" name="name" class="form-control" placeholder="إسم المستخدم">
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="left-icon">
                        <input type="password" name="password" class="form-control" placeholder="كلمة المرور">
                        <div class="icon">
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-checkbox danger">
                        <input name="remember" type="checkbox">
                        <label>تذكرنى</label>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger btn-block">تسجيل الدخول</button>
                </div>
            </form>
        </section>

        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/plugin_ulElements.js"></script>
    </body>
</html>
