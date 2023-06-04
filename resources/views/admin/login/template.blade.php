<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gerenciador</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />

      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="Codedthemes" />
      <!-- Favicon icon -->

      <link rel="icon" href="{{asset('geral/imgs/favicon.ico')}}"type="image/x-icon">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap/css/bootstrap.min.css')}}">
      <!-- waves.css -->
      <link rel="stylesheet" href="{{asset('admin/pages/waves/css/waves.min.css')}}" type="text/css" media="all">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="{{asset('admin/icon/themify-icons/themify-icons.css')}}">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="{{asset('admin/icon/icofont/css/icofont.css')}}">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="{{asset('admin/icon/font-awesome/css/font-awesome.min.css')}}">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="{{asset('admin/css/style.css')}}">
  </head>

  <body themebg-pattern="theme1">
  <!-- Pre-loader start -->
  <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>

              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>

              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Pre-loader end -->

    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="md-float-material form-material">
                        <div class="text-center">
                            <img src="{{asset('geral/imgs/logo.png')}}" height="100" alt="cwg">
                        </div>
                        <div class="auth-box card">
                            @yield('conteudo_principal')
                        </div>
                    </div>
                    <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <!-- Warning Section Starts -->
        <!-- Older IE warning message -->
        <!--[if lt IE 10]>
        <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
        <div class="iew-container">
        <ul class="iew-download">
        <li>
        <a href="http://www.google.com/chrome/">
            <img src="{{asset('admin/images/browser/chrome.png')}}" alt="Chrome">
            <div>Chrome</div>
        </a>
        </li>
        <li>
        <a href="https://www.mozilla.org/en-US/firefox/new/">
            <img src="{{asset('admin/images/browser/firefox.png')}}" alt="Firefox">
            <div>Firefox</div>
        </a>
        </li>
        <li>
        <a href="http://www.opera.com">
            <img src="{{asset('admin/images/browser/opera.png')}}" alt="Opera">
            <div>Opera</div>
        </a>
        </li>
        <li>
        <a href="https://www.apple.com/safari/">
            <img src="{{asset('admin/images/browser/safari.png')}}" alt="Safari">
            <div>Safari</div>
        </a>
        </li>
        <li>
        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
            <img src="{{asset('admin/images/browser/ie.png')}}" alt="">
            <div>IE (9 & above)</div>
        </a>
        </li>
        </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
        </div>
        <![endif]-->
        <!-- Warning Section Ends -->
        <!-- Required Jquery -->
        <script type="text/javascript" src="{{asset('admin/js/jquery/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('admin/js/jquery-ui/jquery-ui.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('admin/js/popper.js/popper.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('admin/js/bootstrap/js/bootstrap.min.js')}}"></script>
        <!-- waves js -->
        <script src="{{asset('admin/pages/waves/js/waves.min.js')}}"></script>
        <!-- jquery slimscroll js -->
        <script type="text/javascript" src="{{asset('admin/js/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
        <script type="text/javascript" src="{{asset('admin/js/common-pages.js')}}"></script>
</body>

</html>




