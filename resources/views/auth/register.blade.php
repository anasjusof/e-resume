<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.1
Version: 3.3.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>E - Resume</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="../../assets/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="../../assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="../../assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>

<!-- Alertrify -->
<script src="../assets/alertrify/js/alertify.min.js"></script>
<!-- include the style -->
<link rel="stylesheet" href="../assets/alertrify/css/alertify.min.css" />
<!-- include a theme -->
<link rel="stylesheet" href="../assets/alertrify/css/themes/default.min.css" />

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">

</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN REGISTRATION FORM -->
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-title text-center">
            <span class="form-title uppercase" 
                style=" font-size: x-large;
                        font-weight: bold;
                        color: #999;">
                Daftar Akaun
            </span>
        </div>
        <p class="hint" style="font-size: medium;">
             Isi maklumat diri anda
        </p>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Nama</label>
            <input class="form-control " type="text" placeholder="Nama Penuh" name="name" value="{{ old('name') }}"/>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Jawatan</label>
            <input class="form-control " type="text" autocomplete="off" placeholder="Jawatan" name="jawatan" value="{{ old('jawatan') }}" />
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Fakulti</label>
            <input class="form-control " type="text" autocomplete="off" placeholder="Fakulti" name="fakulti" value="{{ old('fakulti') }}" />
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Jabatan</label>
            <input class="form-control " type="text" autocomplete="off" placeholder="Jabatan" name="jabatan" value="{{ old('jabatan') }}" />
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">No Telefon</label>
            <input class="form-control " type="text" autocomplete="off" placeholder="No Telefon" name="phone" value="{{ old('phone') }}" />
        </div>

        <p class="hint" style="font-size: medium; padding-top: 50px;">
             Isi maklumat akaun anda
        </p>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">ID Staf</label>
            <input class="form-control " type="text" autocomplete="off" placeholder="ID Staf" name="staff_id" value="{{ old('staff_id') }}" />
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <input class="form-control " type="text" autocomplete="off" placeholder="Email" name="email" value="{{ old('email') }}" />
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Katalaluan</label>
            <input class="form-control " type="password" autocomplete="off" id="register_password" placeholder="Kata Laluan" name="password"/>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Taip Kembali Katalaluan</label>
            <input class="form-control " type="password" autocomplete="off" placeholder="Taip Kembali Kata Laluan" name="password_confirmation"/>
        </div>
        <div class="form-group">
            <input id="image" class="form-control hidden" type="file" autocomplete="off" placeholder="Gambar" name="image"/>
            <label for="image" style="    padding: 5px 10px; background: #dde3ec; border: 1px solid; color: #8290a3;">
            <i class="fa fa-file-image-o"></i>
            Upload Gambar
            </label>
        </div>
        <!--
        <div class="form-group margin-top-20 margin-bottom-20">
            <label class="check">
            <input type="checkbox" name="tnc"/>
            <span class="loginblue-font">I agree to the </span>
            <a href="#" class="loginblue-link">Terms of Service</a>
            <span class="loginblue-font">and</span>
            <a href="#" class="loginblue-link">Privacy Policy </a>
            </label>
            <div id="register_tnc_error">
            </div>
        </div>
        -->
        <div class="form-actions padding-top-50px" style="background: transparent;">
            <a href="{{ url('/login') }}" class="btn btn-warning" style="min-width: 120px"> Kembali </a>
            <button type="submit" id="register-submit-btn" class="btn btn-primary pull-right" style="min-width: 120px">Daftar</button>
        </div>

    </form>
    <!-- END REGISTRATION FORM -->
    
</div>
<div class="copyright">
     
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="../../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="../../assets/admin/pages/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    Login.init();
    Demo.init();
});
</script>

@include('errors.validation-errors')
@include('errors.validation-errors-script')
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>