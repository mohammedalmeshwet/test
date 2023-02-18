<div class="iq-sidebar">
    <div class="iq-navbar-logo d-flex justify-content-between">
       <a href="index.html" class="header-logo">
       <img src="images/logo.png" class="img-fluid rounded" alt="">
       <span>FinDash</span>
       </a>
       <div class="iq-menu-bt align-self-center">
          <div class="wrapper-menu">
             <div class="main-circle"><i class="ri-menu-line"></i></div>
             <div class="hover-circle"><i class="ri-close-fill"></i></div>
          </div>
       </div>
    </div>
    <div id="sidebar-scrollbar">
       <nav class="iq-sidebar-menu">
          <ul id="iq-sidebar-toggle" class="iq-menu">

            <li>
                <a href="#prfileinfo" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span class="ripple rippleEffect"></span><i class="las la-user-tie iq-arrow-left"></i><span>Profile</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="prfileinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" style="">
                   <li><a href="{{ route('profile.show') }}" ><i class="las la-id-card-alt"></i>Personal Information</a></li>
                   <li><a href="{{ route('changePassword.show') }}"><i class="las la-th-list"></i>Change Password</a></li>
                   <li><a href="{{ route('user.edit',['id' => Auth::user()->id]) }}"><i class="las la-edit"></i>Edit Profile</a></li>
                </ul>
             </li>
    @if( Auth::user()->role == "admin")
            <li>
                <a href="#userinfo" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span class="ripple rippleEffect"></span><i class="las la-user-tie iq-arrow-left"></i><span>Users</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" style="">
                    <li><a href="{{ route('users.all') }}" ><i class="las la-id-card-alt"></i>User List</a></li>
                     <li><a href="{{ route('user.create') }}"><i class="las la-plus-circle"></i>User Add</a></li>


                </ul>
            </li>
    @endif
             <li>
                <a href="#productinfo" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span class="ripple rippleEffect"></span><i class="las la-user-tie iq-arrow-left"></i><span>Product</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="productinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" style="">
                    @if( Auth::user()->role == "admin")
                    <li><a href="{{ route('products.index') }}" ><i class="las la-id-card-alt"></i>Product List</a></li>
                    <li><a href="{{ route('product.create') }}" ><i class="las la-id-card-alt"></i>Add Product</a></li>
                    @elseif( Auth::user()->role == "user")
                    <li><a href="{{ route('user.products') }}" ><i class="las la-id-card-alt"></i>My Product</a></li>
                    @endif
                </ul>
             </li>

          </ul>
       </nav>
       <div class="p-3"></div>
    </div>
 </div>
