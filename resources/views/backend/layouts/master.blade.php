<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Minaati is a bootstrap minimal & clean admin template">
    <meta name="keywords" content="admin, admin panel, admin template, admin dashboard, admin theme, bootstrap 4, responsive, sass support, ui kits, crm, ecommerce">
    <meta name="author" content="Themesbox17">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Minaati - Bootstrap Minimal & Clean Admin Template</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    @include('backend.partials.css')
</head>
<body class="vertical-layout">    
    <!-- Start Containerbar -->
    <div id="containerbar">
        @include('backend.partials.leftbar')
        <!-- Start Rightbar -->
        <div class="rightbar">
            @include('backend.partials.topbarmobile')
            @include('backend.partials.topbar')
            <!-- Start Breadcrumbbar -->                    
            <div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="media">
                            <span class="breadcrumb-icon"><i class="ri-user-6-fill"></i></span>
                            <div class="media-body">
                                <h4 class="page-title">Admin</h4>
                                <div class="breadcrumb-list">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Admin</li>
                                    </ol>
                                </div>
                            </div>                      
                        </div>                       
                    </div>
                </div>          
            </div>
            <!-- End Breadcrumbbar -->
            <div class="contentbar"> <div class="row">
            <div class="col-lg-12">
                @yield('content') </div>
                </div>
            </div>
            @include('backend.partials.footerbar')
        </div>
        <!-- End Rightbar -->
    </div>
    <!-- End Containerbar -->
    @include('backend.partials.js')
</body>
</html>
