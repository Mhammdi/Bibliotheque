<!DOCTYPE html>
<html lang="en">

<head>
    <title>Authentification etudiant</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ url('css/util.css') }}">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
                <form class="login100-form validate-form">
                    <span class="login100-form-title p-b-55">
                        Authentification
                    </span>

                    <div class="wrap-input100 validate-input m-b-16" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <span class="lnr lnr-envelope"></span>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <span class="lnr lnr-lock"></span>
                        </span>
                    </div>

                    <div class="contact100-form-checkbox m-l-4">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            Se souvenir de moi
                        </label>
                    </div>

                    <div class="container-login100-form-btn p-t-25">
                        <button class="login100-form-btn">
                            Authentifier
                        </button>
                    </div>




                    <div class="text-center w-full p-t-115">
                        <span class="txt1">
                            pas un membre?
                        </span>

                        <a class="txt1 bo1 hov1" href="#" style="text-decoration:none">
                            Enregistrer Maintenant
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>


</body>

</html>