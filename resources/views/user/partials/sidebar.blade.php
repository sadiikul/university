<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('user.dashboard') }}" class="brand-link">
        <img src="{{ asset('assets/backend/img/logo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">STATE UNIVERSITY</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="@if (Auth::user()->img == null) {{ Avatar::create(Auth::user()->name)->toBase64() }}@else{{ asset(Auth::user()->img) }} @endif"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('user.profile.edit') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('user.dashboard') }}"
                        class="nav-link {{ Route::is('user.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li
                    class="nav-item {{ Route::is('user.academics.department.index') || Route::is('user.academics.department.create') || Route::is('user.academics.department.edit') || Route::is('user.academics.slider.index') || Route::is('user.academics.slider.create') || Route::is('user.academics.slider.edit') || Route::is('user.academics.gallery.index') || Route::is('user.academics.gallery.create') || Route::is('user.academics.gallery.edit') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Route::is('user.academics.department.index') || Route::is('user.academics.department.create') || Route::is('user.academics.department.edit') || Route::is('user.academics.slider.index') || Route::is('user.academics.slider.create') || Route::is('user.academics.slider.edit') || Route::is('user.academics.gallery.index') || Route::is('user.academics.gallery.create') || Route::is('user.academics.gallery.edit') ? 'active' : '' }}">
                        <i class="fas fa-school"></i>
                        <p>
                            Academics Manage
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li
                            class="nav-item {{ Route::is('user.academics.slider.index') || Route::is('user.academics.slider.create') || Route::is('user.academics.slider.edit') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Route::is('user.academics.slider.index') || Route::is('user.academics.slider.create') || Route::is('user.academics.slider.edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Slider
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('user.academics.slider.create') }}"
                                        class="nav-link {{ Route::is('user.academics.slider.create') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Add Slider</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('user.academics.slider.index') }}"
                                        class="nav-link {{ Route::is('user.academics.slider.index') || Route::is('user.academics.slider.edit') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Slider List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item {{ Route::is('user.academics.gallery.index') || Route::is('user.academics.gallery.create') || Route::is('user.academics.gallery.edit') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Route::is('user.academics.gallery.index') || Route::is('user.academics.gallery.create') || Route::is('user.academics.gallery.edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Gallery
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('user.academics.gallery.create') }}"
                                        class="nav-link {{ Route::is('user.academics.gallery.create') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Add Image</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('user.academics.gallery.index') }}"
                                        class="nav-link {{ Route::is('user.academics.gallery.index') || Route::is('user.academics.gallery.edit') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Gallery List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ Route::is('user.program.list.index') || Route::is('user.program.list.create') || Route::is('user.program.list.edit') || Route::is('user.program.curriculum.index') || Route::is('user.program.curriculum.create') || Route::is('user.program.curriculum.edit') || Route::is('user.program.schedule.index') || Route::is('user.program.schedule.create') || Route::is('user.program.schedule.edit') || Route::is('user.program.course.index') || Route::is('user.program.course.create') || Route::is('user.program.course.edit') || Route::is('user.program.subject.index') || Route::is('user.program.subject.create') || Route::is('user.program.subject.edit') || Route::is('user.program.tuition.index') || Route::is('user.program.tuition.create') || Route::is('user.program.tuition.edit') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Route::is('user.program.list.index') || Route::is('user.program.list.create') || Route::is('user.program.list.edit') || Route::is('user.program.curriculum.index') || Route::is('user.program.curriculum.create') || Route::is('user.program.curriculum.edit') || Route::is('user.program.schedule.index') || Route::is('user.program.schedule.create') || Route::is('user.program.schedule.edit') || Route::is('user.program.course.index') || Route::is('user.program.course.create') || Route::is('user.program.course.edit') || Route::is('user.program.subject.index') || Route::is('user.program.subject.create') || Route::is('user.program.subject.edit') || Route::is('user.program.tuition.index') || Route::is('user.program.tuition.create') || Route::is('user.program.tuition.edit') ? 'active' : '' }}">
                        <i class="fas fa-university"></i>
                        <p>
                            Program Manage
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li
                            class="nav-item {{ Route::is('user.program.list.index') || Route::is('user.program.list.create') || Route::is('user.program.list.edit') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Route::is('user.program.list.index') || Route::is('user.program.list.create') || Route::is('user.program.list.edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Program
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('user.program.list.create') }}"
                                        class="nav-link {{ Route::is('user.program.list.create') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Add Program</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('user.program.list.index') }}"
                                        class="nav-link {{ Route::is('user.program.list.index') || Route::is('user.program.list.edit') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Program List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item {{ Route::is('user.program.curriculum.index') || Route::is('user.program.curriculum.create') || Route::is('user.program.curriculum.edit') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Route::is('user.program.curriculum.index') || Route::is('user.program.curriculum.create') || Route::is('user.program.curriculum.edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Curriculum
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('user.program.curriculum.create') }}"
                                        class="nav-link {{ Route::is('user.program.curriculum.create') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Add Curriculum</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('user.program.curriculum.index') }}"
                                        class="nav-link {{ Route::is('user.program.curriculum.index') || Route::is('user.program.curriculum.edit') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Curriculum List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item {{ Route::is('user.program.schedule.index') || Route::is('user.program.schedule.create') || Route::is('user.program.schedule.edit') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Route::is('user.program.schedule.index') || Route::is('user.program.schedule.create') || Route::is('user.program.schedule.edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Schedule
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('user.program.schedule.create') }}"
                                        class="nav-link {{ Route::is('user.program.schedule.create') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Add Schedule</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('user.program.schedule.index') }}"
                                        class="nav-link {{ Route::is('user.program.schedule.index') || Route::is('user.program.schedule.edit') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Schedule List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item {{ Route::is('user.program.course.index') || Route::is('user.program.course.create') || Route::is('user.program.course.edit') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Route::is('user.program.course.index') || Route::is('user.program.course.create') || Route::is('user.program.course.edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Credit & Hours
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('user.program.course.create') }}"
                                        class="nav-link {{ Route::is('user.program.course.create') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Add Credit & Hours</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('user.program.course.index') }}"
                                        class="nav-link {{ Route::is('user.program.course.index') || Route::is('user.program.course.edit') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Credit & Hours List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item {{ Route::is('user.program.subject.index') || Route::is('user.program.subject.create') || Route::is('user.program.subject.edit') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Route::is('user.program.subject.index') || Route::is('user.program.subject.create') || Route::is('user.program.subject.edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Subject Details
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('user.program.subject.create') }}"
                                        class="nav-link {{ Route::is('user.program.subject.create') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Add Subject</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('user.program.subject.index') }}"
                                        class="nav-link {{ Route::is('user.program.subject.index') || Route::is('user.program.subject.edit') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Subject List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item {{ Route::is('user.program.tuition.index') || Route::is('user.program.tuition.create') || Route::is('user.program.tuition.edit') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Route::is('user.program.tuition.index') || Route::is('user.program.tuition.create') || Route::is('user.program.tuition.edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Tuition & Fees
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('user.program.tuition.create') }}"
                                        class="nav-link {{ Route::is('user.program.tuition.create') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Add Fee</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('user.program.tuition.index') }}"
                                        class="nav-link {{ Route::is('user.program.tuition.index') || Route::is('user.program.tuition.edit') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Fees List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ Route::is('user.rnd.post.index') || Route::is('user.rnd.post.create') || Route::is('user.rnd.post.edit') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Route::is('user.rnd.post.index') || Route::is('user.rnd.post.create') || Route::is('user.rnd.post.edit') ? 'active' : '' }}">
                        <i class="fab fa-searchengin"></i>
                        <p>
                            Research & Development
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.rnd.post.create') }}"
                                class="nav-link {{ Route::is('user.rnd.post.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Post</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.rnd.post.index') }}"
                                class="nav-link {{ Route::is('user.rnd.post.index') || Route::is('user.rnd.post.edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Post List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ Route::is('user.faculty.index') || Route::is('user.faculty.create') || Route::is('user.faculty.edit') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Route::is('user.faculty.index') || Route::is('user.faculty.create') || Route::is('user.faculty.edit') ? 'active' : '' }}">
                        <i class="fas fa-users"></i>
                        <p>
                            Faculty Team
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.faculty.create') }}"
                                class="nav-link {{ Route::is('user.faculty.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Add Faculty
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.faculty.index') }}"
                                class="nav-link {{ Route::is('user.faculty.index') || Route::is('user.faculty.edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Faculty List
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ Route::is('user.alumni.index') || Route::is('user.alumni.create') || Route::is('user.alumni.edit') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Route::is('user.alumni.index') || Route::is('user.alumni.create') || Route::is('user.alumni.edit') ? 'active' : '' }}">
                        <i class="fas fa-user-graduate"></i>
                        <p>
                            Alumni Student
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.alumni.create') }}"
                                class="nav-link {{ Route::is('user.alumni.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Add Student
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.alumni.index') }}"
                                class="nav-link {{ Route::is('user.alumni.index') || Route::is('user.alumni.edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Student List
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ Route::is('user.notice.index') || Route::is('user.notice.create') || Route::is('user.notice.edit') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Route::is('user.notice.index') || Route::is('user.notice.create') || Route::is('user.notice.edit') ? 'active' : '' }}">
                        <i class="fas fa-clipboard-list"></i>
                        <p>
                            Notice Manage
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.notice.create') }}"
                                class="nav-link {{ Route::is('user.notice.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Add Notice
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.notice.index') }}"
                                class="nav-link {{ Route::is('user.notice.index') || Route::is('user.notice.edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Notice List
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.cache') }}" class="nav-link">
                        <i class="fas fa-sync"></i>
                        <p>
                            Cache Clear
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
