<div class="sidebar-menu">

    <div class="sidebar-menu-inner">

        <header class="logo-env">
            <!-- logo -->
            <div class="logo">
                <a href="{{ url('admin') }}">
                    <img src=" {{ URL::asset('assets/images/articlesdiary-logo.png') }}" width="120" alt="" />
                </a>
            </div>

            <!-- logo collapse icon -->
            <div class="sidebar-collapse">
                <a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                    <i class="entypo-menu"></i>
                </a>
            </div>


            <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
            <div class="sidebar-mobile-menu visible-xs">
                <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                    <i class="entypo-menu"></i>
                </a>
            </div>

        </header>


        <ul id="main-menu" class="main-menu">
            <!-- add class "multiple-expanded" to allow multiple submenus to open -->
            <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
            <li>
                <a>
                    <i class="entypo-user"></i>
                    <span class="title">Users</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ url('admin/users/create') }}">
                            <span class="title">Add New User</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/users') }}">
                            <span class="title">Users List</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a>
                    <i class="entypo-book"></i>
                    <span class="title">Posts</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ url('admin/posts/create') }}">
                            <span class="title">Add New Post</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/posts') }}">
                            <span class="title">Posts List</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('admin/comments') }}">
                            <span class="title">All Post Comments & Replies</span>
                        </a>
                    </li>

                </ul>

            </li>

            <li>
                <a>
                    <i class="entypo-list"></i>
                    <span class="title">Categories</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ url('admin/categories') }}">
                            <span class="title">Categories List / Add New Category</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a>
                    <i class="entypo-picture"></i>
                    <span class="title">Media</span>
                </a>
                <ul>
                    <li>
                        <a href=" {{ url('admin/media/create') }} ">
                            <span class="title">Upload Media</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/media') }}">
                            <span class="title">Media List</span>
                        </a>
                    </li>
                </ul>
            </li>


        </ul>

    </div>

</div>

