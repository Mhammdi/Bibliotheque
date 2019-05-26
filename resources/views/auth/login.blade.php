<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script type="text/javascript" src="JS/jquery.js"></script>

    <script type="text/javascript">









    </script>
</head>

<body>


    <div id="back">
        <div class="backRight"></div>
        <div class="backLeft"></div>
    </div>

    <div id="slideBox">
        <div class="topLayer">

            <div class="right">
                <div class="content">
                    <h2>Login</h2>
                    <form method="post" action="{{ url('/login') }}">
                        {!! csrf_field() !!}
                        <table>
                            <tr>
                                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <td><label for="email" class="form-label" required>Login</label></td>
                                    <td><input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </td>
                                </div>
                            </tr>
                            <tr>
                                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <td><label for="password" class="form-label" required>Password</label></td>
                                    <td><input type="password" class="form-control" name="password">
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </td>
                                </div>
                            </tr>
                            <tr>
                                <td colspan='2'>
                                    <div class="row">
                                        <div class="col-xs-8">
                                            <div class="checkbox icheck">
                                                <label>
                                                    <input type="checkbox" name="remember"> Remember Me
                                                </label>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-xs-4">
                                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                                        </div>

                                        <!-- /.col -->
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <button id="goRight" class="off">Retourner au menu</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>