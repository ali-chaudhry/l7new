<div class="sidebar">
  <nav id="sidebar" style="min-height:100vh; height:100%">
    <ul class="list-unstyled components">
      <li class="active">
        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"><i class="fas fa-chalkboard-teacher"></i> &nbsp; اخبار <i class="fas fa-angle-down float-left"></i></a>
        <ul class="collapse list-unstyled" id="homeSubmenu">
       @can('edit content')
          <li><a href="{{route('header.edit')}}"><i class="fas fa-portrait"></i> &nbsp; Header</a></li>
        @endcan

        @can('edit content')
          <li><a href="{{route('footer.edit')}}"><i class="fas fa-portrait"></i> &nbsp; Footer</a></li>
        @endcan
        
        @can('create articles')
          <li><a href="/admin/category"><i class="fas fa-link"></i></i> &nbsp; زمره <span class="eng-font float-left">Categories</span></a></li>
          @endcan
          @can('create articles')
          <li><a href="/admin/tag"><i class="fas fa-tags"></i> &nbsp;ٹیگ <span class="eng-font float-left">Tag</span></a></li>
          @endcan

        </ul>
      </li>

      @can('create articles')
        <li><a href="/news"><i class="fas fa-newspaper"></i> &nbsp; سرخیاں
      <span class="float-left eng-font">News</span> </a></li>
      @endcan


      @can('create articles')
              <li><a href="{{route('album.index')}}"><i class="far fa-images"></i> &nbsp;  تصاویر
      <span class="float-left eng-font"> Gallary </span> </a></li>
      @endcan

  <li><a href="/admin/column/news"><i class="fas fa-columns"></i> &nbsp; کالم
  <span class="float-left eng-font"> Columns </span> </a></li>

  <li><a href="/admin/writers"><i class="fas fa-pen"></i> &nbsp; مصنف
  <span class="float-left eng-font"> Writers </span> </a></li>

  <li><a href="/admin/feature/news"><i class="fas fa-columns"></i> &nbsp; فیچر اور تجزیے
  <span class="float-left eng-font"> Features </span> </a></li>

  <li><a href="/admin/artist/news"><i class="fas fa-columns"></i> &nbsp; فن فنکار
  <span class="float-left eng-font"> Artist </span> </a></li>

  <li><a href="/admin/science/news"><i class="fas fa-columns"></i> &nbsp; سائنس
  <span class="float-left eng-font"> Science </span> </a></li>

  <li><a href="/admin/punjabi/news"><i class="fas fa-columns"></i> &nbsp; پنجابی نیوز
  <span class="float-left eng-font"> Punjabi News </span> </a></li>


  <li><a href="/admin/punjabi/videos"><i class="fas fa-columns"></i> &nbsp; پنجابی ویڈیو
  <span class="float-left eng-font"> Punjabi Video</span> </a></li>

  <li class="active">
        <a href="#homeUser" data-toggle="collapse" aria-expanded="false"><i class="fas fa-users"></i> &nbsp; صارفین  <i class="fas fa-angle-down float-left"></i> 
        </a>
        <ul class="collapse list-unstyled" id="homeUser">
          @can('users.view', Auth::user())
          <li><a href="/blog/user/user"><i class="fas fa-users"></i> &nbsp; تمام صارفین</a></li>
          @endcan
          @can('posts.view', Auth::user())
          <li><a href="{{route('apost.index')}}"><i class="fas fa-clipboard-list"></i> &nbsp; All Posts</a></li>
          @endcan
          @can('users.create', Auth::user())
          <li><a href="/blog/user/user/create"><i class="fas fa-user-plus"></i> &nbsp; Add User</a></li>
          @endcan
        </ul>
      </li>

      <li class="active">
        <a href="#homeAdmin" data-toggle="collapse" aria-expanded="false"><i class="fas fa-lock"></i> &nbsp; Access Control <i class="fas fa-angle-down float-left"></i></a>
        <ul class="collapse list-unstyled" id="homeAdmin">
          @can('admins.view', Auth::user())
          <li><a href="/admin/user/admin"><i class="fas fa-users"></i> &nbsp; All Users</a></li>
          @endcan
          @can('admins.create', Auth::user())
          <li><a href="/admin/user/admin/create"><i class="fas fa-user-plus"></i> &nbsp; Add User</a></li>
          @endcan
          @can('roles.view', Auth::user())
          <li><a href="{{route('role.index')}}"><i class="fas fa-user-check"></i> &nbsp; Role</a></li>
          @endcan
          @can('permissions.view', Auth::user())
          <li><a href="/admin/permission"><i class="fas fa-user-tag"></i> &nbsp; Permissions</a></li>
          @endcan
        </ul>
      </li>

    </ul>

    <ul class="list-unstyled CTAs">

        <li>
            <a href="/" class="btn btn-default">Back to Web</a>
        </li>
    </ul>
  </nav>
</div>


<!-- Page Content Holder -->
<div id="content " class="w-100">

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">

          <button type="button" id="sidebarCollapse" class="btn btn-default">
            <i class="fas fa-align-justify"></i>
          </button>

          <div>
            <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                  <!-- Authentication Links -->

                      <li class="nav-item">

                          <div class="nav-item" >
                              <a class="btn-white p-2 eng-font" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                          </div>
                      </li>

              </ul>


          </div>
      </div>
  </nav>
