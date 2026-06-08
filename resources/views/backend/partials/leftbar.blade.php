<!-- Start Leftbar -->
        <div class="leftbar">
            <!-- Start Sidebar -->
            <div class="sidebar">
                <!-- Start Logobar -->
                <div class="logobar">
                    <a href="index.html" class="logo logo-large"><img src="{{ asset('backend/assets/images/logo.svg')}}" class="img-fluid" alt="logo"></a>
                    <a href="index.html" class="logo logo-small"><img src="{{ asset('backend/assets/images/small_logo.svg" class="img-fluid" alt="logo')}}"></a>
                </div>
                <!-- End Logobar -->
                <!-- Start Navigationbar -->
                <div class="navigationbar">
                    <ul class="vertical-menu">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="ri-user-6-fill"></i><span>Admin Dashboard</span>
                            </a>
                        </li>
                        <li>
                            @can('category.index')
                            <a href="{{ route('admin.categories.index') }}">
                                <i class="ri-store-2-fill"></i><span>Category</span>
                            </a>
                            @endcan
                        </li>
                        <li>
                            @can('product.index')
                            <a href="{{ route('admin.products.index') }}">
                                <i class="ri-store-2-fill"></i><span>Product</span>
                            </a>
                            @endcan
                        </li>    
                        <li>
                            @can('role.index')
                            <a href="{{ route('admin.roles.index') }}">
                                <i class="ri-store-2-fill"></i><span>Role</span>
                            </a>
                            @endcan
                        </li>  
                        <li>
                            <a href="{{ route('admin.reviews.index') }}">
                                <i class="fa fa-envelope"></i><span>Review</span>
                            </a>
                        </li>                                    
                    </ul>
                </div>
                <!-- End Navigationbar -->
            </div>
            <!-- End Sidebar -->
        </div>
        <!-- End Leftbar -->