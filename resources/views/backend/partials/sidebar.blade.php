<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
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
                <a href="{{ route('admin.profile.edit') }}" class="d-block">{{ Auth::user()->name }}</a>
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

        @php
            $user = Auth::user();
        @endphp

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if ($user->can('department.view') ||
                    $user->can('department.create') ||
                    $user->can('department.edit') ||
                    $user->can('department_gallery.view') ||
                    $user->can('department_gallery.create') ||
                    $user->can('department_gallery.edit') ||
                    $user->can('department_slider.view') ||
                    $user->can('department_slider.create') ||
                    $user->can('department_slider.edit'))
                    <li
                        class="nav-item {{ Route::is('admin.academics.department.index') || Route::is('admin.academics.department.create') || Route::is('admin.academics.department.edit') || Route::is('admin.academics.slider.index') || Route::is('admin.academics.slider.create') || Route::is('admin.academics.slider.edit') || Route::is('admin.academics.gallery.index') || Route::is('admin.academics.gallery.create') || Route::is('admin.academics.gallery.edit') || Route::is('admin.academics.institute.index') || Route::is('admin.academics.institute.create') || Route::is('admin.academics.institute.edit') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Route::is('admin.academics.department.index') || Route::is('admin.academics.department.create') || Route::is('admin.academics.department.edit') || Route::is('admin.academics.slider.index') || Route::is('admin.academics.slider.create') || Route::is('admin.academics.slider.edit') || Route::is('admin.academics.gallery.index') || Route::is('admin.academics.gallery.create') || Route::is('admin.academics.gallery.edit') || Route::is('admin.academics.institute.index') || Route::is('admin.academics.institute.create') || Route::is('admin.academics.institute.edit') ? 'active' : '' }}">
                            <i class="fas fa-school"></i>
                            <p>
                                Academics Manage
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li
                                class="nav-item {{ Route::is('admin.academics.institute.index') || Route::is('admin.academics.institute.create') || Route::is('admin.academics.institute.edit') ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ Route::is('admin.academics.institute.index') || Route::is('admin.academics.institute.create') || Route::is('admin.academics.institute.edit') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Institue of School
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.academics.institute.create') }}"
                                            class="nav-link {{ Route::is('admin.academics.institute.create') ? 'active' : '' }}">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Add Institue</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.academics.institute.index') }}"
                                            class="nav-link {{ Route::is('admin.academics.institute.index') || Route::is('admin.academics.institute.edit') ? 'active' : '' }}">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Institue List</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @if ($user->can('department.view') || $user->can('department.create') || $user->can('department.edit'))
                                <li
                                    class="nav-item {{ Route::is('admin.academics.department.index') || Route::is('admin.academics.department.create') || Route::is('admin.academics.department.edit') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="#"
                                        class="nav-link {{ Route::is('admin.academics.department.index') || Route::is('admin.academics.department.create') || Route::is('admin.academics.department.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Department
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @if ($user->can('department.create'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.academics.department.create') }}"
                                                    class="nav-link {{ Route::is('admin.academics.department.create') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Add Department</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('department.view'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.academics.department.index') }}"
                                                    class="nav-link {{ Route::is('admin.academics.department.index') || Route::is('admin.academics.department.edit') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Department List</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if ($user->can('department_slider.view') ||
                                $user->can('department_slider.create') ||
                                $user->can('department_slider.edit'))
                                <li
                                    class="nav-item {{ Route::is('admin.academics.slider.index') || Route::is('admin.academics.slider.create') || Route::is('admin.academics.slider.edit') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="#"
                                        class="nav-link {{ Route::is('admin.academics.slider.index') || Route::is('admin.academics.slider.create') || Route::is('admin.academics.slider.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Slider
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @if ($user->can('department_slider.create'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.academics.slider.create') }}"
                                                    class="nav-link {{ Route::is('admin.academics.slider.create') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Add Slider</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('department_slider.view'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.academics.slider.index') }}"
                                                    class="nav-link {{ Route::is('admin.academics.slider.index') || Route::is('admin.academics.slider.edit') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Slider List</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if ($user->can('department_gallery.view') ||
                                $user->can('department_gallery.create') ||
                                $user->can('department_gallery.edit'))
                                <li
                                    class="nav-item {{ Route::is('admin.academics.gallery.index') || Route::is('admin.academics.gallery.create') || Route::is('admin.academics.gallery.edit') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="#"
                                        class="nav-link {{ Route::is('admin.academics.gallery.index') || Route::is('admin.academics.gallery.create') || Route::is('admin.academics.gallery.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Gallery
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @if ($user->can('department_gallery.create'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.academics.gallery.create') }}"
                                                    class="nav-link {{ Route::is('admin.academics.gallery.create') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Add Image</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('department_gallery.view'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.academics.gallery.index') }}"
                                                    class="nav-link {{ Route::is('admin.academics.gallery.index') || Route::is('admin.academics.gallery.edit') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Gallery List</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if ($user->can('program_category.view') ||
                    $user->can('program_category.create') ||
                    $user->can('program_category.edit') ||
                    $user->can('program_list.view') ||
                    $user->can('program_list.create') ||
                    $user->can('program_list.edit') ||
                    $user->can('curriculum.view') ||
                    $user->can('curriculum.create') ||
                    $user->can('curriculum.edit') ||
                    $user->can('schedule.view') ||
                    $user->can('schedule.create') ||
                    $user->can('schedule.edit') ||
                    $user->can('credit_hour.view') ||
                    $user->can('credit_hour.create') ||
                    $user->can('credit_hour.edit') ||
                    $user->can('subject_details.view') ||
                    $user->can('subject_details.create') ||
                    $user->can('subject_details.edit') ||
                    $user->can('tuition_fee.view') ||
                    $user->can('tuition_fee.create') ||
                    $user->can('tuition_fee.edit'))
                    <li
                        class="nav-item {{ Route::is('admin.program.category.index') || Route::is('admin.program.category.create') || Route::is('admin.program.category.edit') || Route::is('admin.program.list.index') || Route::is('admin.program.list.create') || Route::is('admin.program.list.edit') || Route::is('admin.program.curriculum.index') || Route::is('admin.program.curriculum.create') || Route::is('admin.program.curriculum.edit') || Route::is('admin.program.schedule.index') || Route::is('admin.program.schedule.create') || Route::is('admin.program.schedule.edit') || Route::is('admin.program.course.index') || Route::is('admin.program.course.create') || Route::is('admin.program.course.edit') || Route::is('admin.program.subject.index') || Route::is('admin.program.subject.create') || Route::is('admin.program.subject.edit') || Route::is('admin.program.tuition.index') || Route::is('admin.program.tuition.create') || Route::is('admin.program.tuition.edit') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Route::is('admin.program.category.index') || Route::is('admin.program.category.create') || Route::is('admin.program.category.edit') || Route::is('admin.program.list.index') || Route::is('admin.program.list.create') || Route::is('admin.program.list.edit') || Route::is('admin.program.curriculum.index') || Route::is('admin.program.curriculum.create') || Route::is('admin.program.curriculum.edit') || Route::is('admin.program.schedule.index') || Route::is('admin.program.schedule.create') || Route::is('admin.program.schedule.edit') || Route::is('admin.program.course.index') || Route::is('admin.program.course.create') || Route::is('admin.program.course.edit') || Route::is('admin.program.subject.index') || Route::is('admin.program.subject.create') || Route::is('admin.program.subject.edit') || Route::is('admin.program.tuition.index') || Route::is('admin.program.tuition.create') || Route::is('admin.program.tuition.edit') ? 'active' : '' }}">
                            <i class="fas fa-university"></i>
                            <p>
                                Program Manage
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if ($user->can('program_category.view') ||
                                $user->can('program_category.create') ||
                                $user->can('program_category.edit'))
                                <li
                                    class="nav-item {{ Route::is('admin.program.category.index') || Route::is('admin.program.category.create') || Route::is('admin.program.category.edit') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="#"
                                        class="nav-link {{ Route::is('admin.program.category.index') || Route::is('admin.program.category.create') || Route::is('admin.program.category.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Category
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @if ($user->can('program_category.create'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.program.category.create') }}"
                                                    class="nav-link {{ Route::is('admin.program.category.create') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Add Category</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('program_category.view'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.program.category.index') }}"
                                                    class="nav-link {{ Route::is('admin.program.category.index') || Route::is('admin.program.category.edit') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Category List</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if ($user->can('program_list.view') || $user->can('program_list.create') || $user->can('program_list.edit'))
                                <li
                                    class="nav-item {{ Route::is('admin.program.list.index') || Route::is('admin.program.list.create') || Route::is('admin.program.list.edit') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="#"
                                        class="nav-link {{ Route::is('admin.program.list.index') || Route::is('admin.program.list.create') || Route::is('admin.program.list.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Program
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @if ($user->can('program_list.create'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.program.list.create') }}"
                                                    class="nav-link {{ Route::is('admin.program.list.create') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Add Program</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('program_list.view'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.program.list.index') }}"
                                                    class="nav-link {{ Route::is('admin.program.list.index') || Route::is('admin.program.list.edit') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Program List</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if ($user->can('curriculum.view') || $user->can('curriculum.create') || $user->can('curriculum.edit'))
                                <li
                                    class="nav-item {{ Route::is('admin.program.curriculum.index') || Route::is('admin.program.curriculum.create') || Route::is('admin.program.curriculum.edit') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="#"
                                        class="nav-link {{ Route::is('admin.program.curriculum.index') || Route::is('admin.program.curriculum.create') || Route::is('admin.program.curriculum.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Curriculum
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @if ($user->can('curriculum.create'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.program.curriculum.create') }}"
                                                    class="nav-link {{ Route::is('admin.program.curriculum.create') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Add Curriculum</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('curriculum.view'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.program.curriculum.index') }}"
                                                    class="nav-link {{ Route::is('admin.program.curriculum.index') || Route::is('admin.program.curriculum.edit') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Curriculum List</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if ($user->can('schedule.view') || $user->can('schedule.create') || $user->can('schedule.edit'))
                                <li
                                    class="nav-item {{ Route::is('admin.program.schedule.index') || Route::is('admin.program.schedule.create') || Route::is('admin.program.schedule.edit') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="#"
                                        class="nav-link {{ Route::is('admin.program.schedule.index') || Route::is('admin.program.schedule.create') || Route::is('admin.program.schedule.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Schedule
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @if ($user->can('schedule.create'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.program.schedule.create') }}"
                                                    class="nav-link {{ Route::is('admin.program.schedule.create') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Add Schedule</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('schedule.view'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.program.schedule.index') }}"
                                                    class="nav-link {{ Route::is('admin.program.schedule.index') || Route::is('admin.program.schedule.edit') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Schedule List</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if ($user->can('credit_hour.view') || $user->can('credit_hour.create') || $user->can('credit_hour.edit'))
                                <li
                                    class="nav-item {{ Route::is('admin.program.course.index') || Route::is('admin.program.course.create') || Route::is('admin.program.course.edit') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="#"
                                        class="nav-link {{ Route::is('admin.program.course.index') || Route::is('admin.program.course.create') || Route::is('admin.program.course.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Credit & Hours
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @if ($user->can('credit_hour.create'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.program.course.create') }}"
                                                    class="nav-link {{ Route::is('admin.program.course.create') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Add Credit & Hours</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('credit_hour.view'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.program.course.index') }}"
                                                    class="nav-link {{ Route::is('admin.program.course.index') || Route::is('admin.program.course.edit') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Credit & Hours List</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if ($user->can('subject_details.view') ||
                                $user->can('subject_details.create') ||
                                $user->can('subject_details.edit'))
                                <li
                                    class="nav-item {{ Route::is('admin.program.subject.index') || Route::is('admin.program.subject.create') || Route::is('admin.program.subject.edit') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="#"
                                        class="nav-link {{ Route::is('admin.program.subject.index') || Route::is('admin.program.subject.create') || Route::is('admin.program.subject.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Subject Details
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @if ($user->can('subject_details.create'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.program.subject.create') }}"
                                                    class="nav-link {{ Route::is('admin.program.subject.create') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Add Subject</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('subject_details.view'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.program.subject.index') }}"
                                                    class="nav-link {{ Route::is('admin.program.subject.index') || Route::is('admin.program.subject.edit') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Subject List</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if ($user->can('tuition_fee.view') || $user->can('curriculum.create') || $user->can('tuition_fee.edit'))
                                <li
                                    class="nav-item {{ Route::is('admin.program.tuition.index') || Route::is('admin.program.tuition.create') || Route::is('admin.program.tuition.edit') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="#"
                                        class="nav-link {{ Route::is('admin.program.tuition.index') || Route::is('admin.program.tuition.create') || Route::is('admin.program.tuition.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Tuition & Fees
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @if ($user->can('curriculum.create'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.program.tuition.create') }}"
                                                    class="nav-link {{ Route::is('admin.program.tuition.create') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Add Fee</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('tuition_fee.view'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.program.tuition.index') }}"
                                                    class="nav-link {{ Route::is('admin.program.tuition.index') || Route::is('admin.program.tuition.edit') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Fees List</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if ($user->can('rnd.head') ||
                    $user->can('rnd.view') ||
                    $user->can('rnd.create') ||
                    $user->can('rnd.edit') ||
                    $user->can('rnd_gallery.view') ||
                    $user->can('rnd_gallery.create') ||
                    $user->can('rnd_gallery.edit'))
                    <li
                        class="nav-item {{ Route::is('admin.rnd.head.edit') || Route::is('admin.rnd.post.index') || Route::is('admin.rnd.post.create') || Route::is('admin.rnd.post.edit') || Route::is('admin.rnd.head.edit') || Route::is('admin.rnd.post.index') || Route::is('admin.rnd.post.create') || Route::is('admin.rnd.gallery.index') || Route::is('admin.rnd.gallery.create') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Route::is('admin.rnd.head.edit') || Route::is('admin.rnd.post.index') || Route::is('admin.rnd.post.create') || Route::is('admin.rnd.post.edit') || Route::is('admin.rnd.head.edit') || Route::is('admin.rnd.gallery.index') || Route::is('admin.rnd.gallery.create') ? 'active' : '' }}">
                            <i class="fab fa-searchengin"></i>
                            <p>
                                Research & Development
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if ($user->can('rnd.head'))
                                <li
                                    class="nav-item {{ Route::is('admin.rnd.head.edit') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="{{ route('admin.rnd.head.edit') }}"
                                        class="nav-link {{ Route::is('admin.rnd.head.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            R & D Head
                                        </p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('rnd.view') || $user->can('rnd.create') || $user->can('rnd.edit'))
                                <li
                                    class="nav-item {{ Route::is('admin.rnd.post.index') || Route::is('admin.rnd.post.create') || Route::is('admin.rnd.post.edit') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="#"
                                        class="nav-link {{ Route::is('admin.rnd.post.index') || Route::is('admin.rnd.post.create') || Route::is('admin.rnd.post.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            R & D Post
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @if ($user->can('rnd.create'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.rnd.post.create') }}"
                                                    class="nav-link {{ Route::is('admin.rnd.post.create') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Add Post</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('rnd.view'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.rnd.post.index') }}"
                                                    class="nav-link {{ Route::is('admin.rnd.post.index') || Route::is('admin.rnd.post.edit') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Post List</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if ($user->can('rnd_gallery.view') || $user->can('rnd_gallery.create') || $user->can('rnd_gallery.edit'))
                                <li
                                    class="nav-item {{ Route::is('admin.rnd.gallery.index') || Route::is('admin.rnd.gallery.create') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="#"
                                        class="nav-link {{ Route::is('admin.rnd.gallery.index') || Route::is('admin.rnd.gallery.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            R & D Gallery
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @if ($user->can('rnd_gallery.create'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.rnd.gallery.create') }}"
                                                    class="nav-link {{ Route::is('admin.rnd.gallery.create') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Add Gallery</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('rnd_gallery.view'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.rnd.gallery.index') }}"
                                                    class="nav-link {{ Route::is('admin.rnd.gallery.index') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Gallery List</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if ($user->can('faculty.view') || $user->can('faculty.create') || $user->can('faculty.edit'))
                    <li
                        class="nav-item {{ Route::is('admin.faculty.index') || Route::is('admin.faculty.create') || Route::is('admin.faculty.edit') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Route::is('admin.faculty.index') || Route::is('admin.faculty.create') || Route::is('admin.faculty.edit') ? 'active' : '' }}">
                            <i class="fas fa-users"></i>
                            <p>
                                Faculty Team
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if ($user->can('faculty.create'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.faculty.create') }}"
                                        class="nav-link {{ Route::is('admin.faculty.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Add Faculty
                                        </p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('faculty.view'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.faculty.index') }}"
                                        class="nav-link {{ Route::is('admin.faculty.index') || Route::is('admin.faculty.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Faculty List
                                        </p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if ($user->can('admission_page.edit') ||
                    $user->can('admission_thumbnail.edit') ||
                    $user->can('foreign.head') ||
                    $user->can('foreign.view') ||
                    $user->can('foreign.create') ||
                    $user->can('foreign.edit') ||
                    $user->can('waiver.head') ||
                    $user->can('waiver.view') ||
                    $user->can('waiver_feedback.view') ||
                    $user->can('waiver.create') ||
                    $user->can('waiver.edit') ||
                    $user->can('accommodation.edit') ||
                    $user->can('calender.view') ||
                    $user->can('calender.create') ||
                    $user->can('calender.edit'))
                    <li
                        class="nav-item {{ Route::is('admin.admission.thumbnail') || Route::is('admin.admission.foreign.head') || Route::is('admin.admission.foreign.fee.index') || Route::is('admin.admission.foreign.fee.create') || Route::is('admin.admission.foreign.fee.edit') || Route::is('admin.admission.waiver.head') || Route::is('admin.admission.waiver.index') || Route::is('admin.admission.waiver.create') || Route::is('admin.admission.waiver.edit') || Route::is('admin.admission.waiver.view') || Route::is('admin.admission.waiver.feedback') || Route::is('admin.admission.page.edit') || Route::is('admin.admission.calender.index') || Route::is('admin.admission.calender.create') || Route::is('admin.admission.accommodation.edit') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Route::is('admin.admission.thumbnail') || Route::is('admin.admission.foreign.head') || Route::is('admin.admission.foreign.fee.index') || Route::is('admin.admission.foreign.fee.create') || Route::is('admin.admission.foreign.fee.edit') || Route::is('admin.admission.waiver.head') || Route::is('admin.admission.waiver.index') || Route::is('admin.admission.waiver.create') || Route::is('admin.admission.waiver.edit') || Route::is('admin.admission.waiver.view') || Route::is('admin.admission.waiver.feedback') || Route::is('admin.admission.page.edit') || Route::is('admin.admission.calender.index') || Route::is('admin.admission.calender.create') || Route::is('admin.admission.calender.edit') || Route::is('admin.admission.accommodation.edit') ? 'active' : '' }}">
                            <i class="fas fa-hand-point-right"></i>
                            <p>
                                Admission Manage
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if ($user->can('admission_thumbnail.edit'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.admission.thumbnail') }}"
                                        class="nav-link {{ Route::is('admin.admission.thumbnail') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            All Thumbnail
                                        </p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('admission_page.edit'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.admission.page.edit') }}"
                                        class="nav-link {{ Route::is('admin.admission.page.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Admission Page
                                        </p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('foreign.head') ||
                                $user->can('foreign.view') ||
                                $user->can('foreign.create') ||
                                $user->can('foreign.edit'))
                                <li
                                    class="nav-item {{ Route::is('admin.admission.foreign.head') || Route::is('admin.admission.foreign.fee.index') || Route::is('admin.admission.foreign.fee.create') || Route::is('admin.admission.foreign.fee.edit') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="#"
                                        class="nav-link {{ Route::is('admin.admission.foreign.head') || Route::is('admin.admission.foreign.fee.index') || Route::is('admin.admission.foreign.fee.create') || Route::is('admin.admission.foreign.fee.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Foreign Student Page
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @if ($user->can('foreign.head'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.admission.foreign.head') }}"
                                                    class="nav-link {{ Route::is('admin.admission.foreign.head') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Page Heading</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('foreign.create'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.admission.foreign.fee.create') }}"
                                                    class="nav-link {{ Route::is('admin.admission.foreign.fee.create') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Add Fee</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('foreign.view'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.admission.foreign.fee.index') }}"
                                                    class="nav-link {{ Route::is('admin.admission.foreign.fee.index') || Route::is('admin.admission.foreign.fee.edit') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Fee List</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if ($user->can('waiver.head') ||
                                $user->can('waiver.view') ||
                                $user->can('waiver.create') ||
                                $user->can('waiver.edit') ||
                                $user->can('waiver_feedback.view'))
                                <li
                                    class="nav-item {{ Route::is('admin.admission.waiver.head') || Route::is('admin.admission.waiver.index') || Route::is('admin.admission.waiver.create') || Route::is('admin.admission.waiver.edit') || Route::is('admin.admission.waiver.view') || Route::is('admin.admission.waiver.feedback') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="#"
                                        class="nav-link {{ Route::is('admin.admission.waiver.head') || Route::is('admin.admission.waiver.index') || Route::is('admin.admission.waiver.create') || Route::is('admin.admission.waiver.edit') || Route::is('admin.admission.waiver.view') || Route::is('admin.admission.waiver.feedback') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Schoolarship & Waiver
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @if ($user->can('waiver.head'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.admission.waiver.head') }}"
                                                    class="nav-link {{ Route::is('admin.admission.waiver.head') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Page Heading</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('waiver.create'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.admission.waiver.create') }}"
                                                    class="nav-link {{ Route::is('admin.admission.waiver.create') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Add Section</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('waiver.view'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.admission.waiver.index') }}"
                                                    class="nav-link {{ Route::is('admin.admission.waiver.index') || Route::is('admin.admission.waiver.edit') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Section List</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('waiver_feedback.view'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.admission.waiver.feedback') }}"
                                                    class="nav-link {{ Route::is('admin.admission.waiver.feedback') || Route::is('admin.admission.waiver.view') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Waiver Feedback</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if ($user->can('accommodation.edit'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.admission.accommodation.edit') }}"
                                        class="nav-link {{ Route::is('admin.admission.accommodation.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Accommodation
                                        </p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('calender.view') || $user->can('calender.create') || $user->can('calender.edit'))
                                <li
                                    class="nav-item {{ Route::is('admin.admission.calender.index') || Route::is('admin.admission.calender.create') || Route::is('admin.admission.calender.edit') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="#"
                                        class="nav-link {{ Route::is('admin.admission.calender.index') || Route::is('admin.admission.calender.create') || Route::is('admin.admission.calender.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Calender
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @if ($user->can('calender.create'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.admission.calender.create') }}"
                                                    class="nav-link {{ Route::is('admin.admission.calender.create') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Add Year</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('calender.view'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.admission.calender.index') }}"
                                                    class="nav-link {{ Route::is('admin.admission.calender.index') || Route::is('admin.admission.calender.edit') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Calender List</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if ($user->can('management_thumbnail.edit') ||
                    $user->can('board_member.view') ||
                    $user->can('board_member.create') ||
                    $user->can('board_member.edit') ||
                    $user->can('syndicate.head') ||
                    $user->can('syndicate.view') ||
                    $user->can('syndicate.create') ||
                    $user->can('syndicate.edit') ||
                    $user->can('academic_council.head') ||
                    $user->can('academic_council.view') ||
                    $user->can('academic_council.create') ||
                    $user->can('academic_council.edit') ||
                    $user->can('vice.edit') ||
                    $user->can('pro_vice.edit') ||
                    $user->can('administration.view') ||
                    $user->can('administration.create') ||
                    $user->can('administration.edit'))
                    <li
                        class="nav-item {{ Route::is('admin.management.member.index') || Route::is('admin.management.member.create') || Route::is('admin.management.member.edit') || Route::is('admin.management.edit') || Route::is('admin.management.syndicate.index') || Route::is('admin.management.syndicate.create') || Route::is('admin.management.syndicate.edit') || Route::is('admin.management.syndicate.head') || Route::is('admin.management.council.index') || Route::is('admin.management.council.create') || Route::is('admin.management.council.edit') || Route::is('admin.management.council.head') || Route::is('admin.management.chancellor.vice.edit') || Route::is('admin.management.chancellor.pro.edit') || Route::is('admin.management.administration.index') || Route::is('admin.management.administration.create') || Route::is('admin.management.administration.edit') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Route::is('admin.management.member.index') || Route::is('admin.management.member.create') || Route::is('admin.management.member.edit') || Route::is('admin.management.edit') || Route::is('admin.management.syndicate.index') || Route::is('admin.management.syndicate.create') || Route::is('admin.management.syndicate.edit') || Route::is('admin.management.syndicate.head') || Route::is('admin.management.council.index') || Route::is('admin.management.council.create') || Route::is('admin.management.council.edit') || Route::is('admin.management.council.head') || Route::is('admin.management.chancellor.vice.edit') || Route::is('admin.management.chancellor.pro.edit') || Route::is('admin.management.administration.index') || Route::is('admin.management.administration.create') || Route::is('admin.management.administration.edit') ? 'active' : '' }}">
                            <i class="fas fa-toolbox"></i>
                            <p>
                                Management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if ($user->can('management_thumbnail.edit'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.management.edit') }}"
                                        class="nav-link {{ Route::is('admin.management.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            All Thumbnail
                                        </p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('board_member.view') || $user->can('board_member.create') || $user->can('board_member.edit'))
                                <li
                                    class="nav-item {{ Route::is('admin.management.member.index') || Route::is('admin.management.member.create') || Route::is('admin.management.member.edit') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="#"
                                        class="nav-link {{ Route::is('admin.management.member.index') || Route::is('admin.management.member.create') || Route::is('admin.management.member.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Board of Trustees
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @if ($user->can('board_member.create'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.management.member.create') }}"
                                                    class="nav-link {{ Route::is('admin.management.member.create') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Add Member</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('board_member.view'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.management.member.index') }}"
                                                    class="nav-link {{ Route::is('admin.management.member.index') || Route::is('admin.management.member.edit') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Member List</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if ($user->can('syndicate.head') ||
                                $user->can('syndicate.view') ||
                                $user->can('syndicate.create') ||
                                $user->can('syndicate.edit'))
                                <li
                                    class="nav-item {{ Route::is('admin.management.syndicate.index') || Route::is('admin.management.syndicate.create') || Route::is('admin.management.syndicate.edit') || Route::is('admin.management.syndicate.head') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="#"
                                        class="nav-link {{ Route::is('admin.management.syndicate.index') || Route::is('admin.management.syndicate.create') || Route::is('admin.management.syndicate.edit') || Route::is('admin.management.syndicate.head') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Syndicate
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @if ($user->can('syndicate.head'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.management.syndicate.head') }}"
                                                    class="nav-link {{ Route::is('admin.management.syndicate.head') ? 'active' : '' }}">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>
                                                        Page Head
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('syndicate.create'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.management.syndicate.create') }}"
                                                    class="nav-link {{ Route::is('admin.management.syndicate.create') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Add Member</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('syndicate.view'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.management.syndicate.index') }}"
                                                    class="nav-link {{ Route::is('admin.management.syndicate.index') || Route::is('admin.management.syndicate.edit') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Member List</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if ($user->can('academic_council.head') ||
                                $user->can('academic_council.view') ||
                                $user->can('academic_council.create') ||
                                $user->can('academic_council.edit'))
                                <li
                                    class="nav-item {{ Route::is('admin.management.council.index') || Route::is('admin.management.council.create') || Route::is('admin.management.council.edit') || Route::is('admin.management.council.head') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="#"
                                        class="nav-link {{ Route::is('admin.management.council.index') || Route::is('admin.management.council.create') || Route::is('admin.management.council.edit') || Route::is('admin.management.council.head') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Academic Council
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @if ($user->can('academic_council.head'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.management.council.head') }}"
                                                    class="nav-link {{ Route::is('admin.management.council.head') ? 'active' : '' }}">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>
                                                        Page Head
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('academic_council.create'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.management.council.create') }}"
                                                    class="nav-link {{ Route::is('admin.management.council.create') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Add Member</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('academic_council.view'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.management.council.index') }}"
                                                    class="nav-link {{ Route::is('admin.management.council.index') || Route::is('admin.management.council.edit') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Member List</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if ($user->can('vice.edit'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.management.chancellor.vice.edit') }}"
                                        class="nav-link {{ Route::is('admin.management.chancellor.vice.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Vice Chancellor
                                        </p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('pro_vice.edit'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.management.chancellor.pro.edit') }}"
                                        class="nav-link {{ Route::is('admin.management.chancellor.pro.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Pro Vice Chancellor
                                        </p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('administration.view') ||
                                $user->can('administration.create') ||
                                $user->can('administration.edit'))
                                <li
                                    class="nav-item {{ Route::is('admin.management.administration.index') || Route::is('admin.management.administration.create') || Route::is('admin.management.administration.edit') || Route::is('admin.management.administration.head') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="#"
                                        class="nav-link {{ Route::is('admin.management.administration.index') || Route::is('admin.management.administration.create') || Route::is('admin.management.administration.edit') || Route::is('admin.management.administration.head') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Administration
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @if ($user->can('administration.create'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.management.administration.create') }}"
                                                    class="nav-link {{ Route::is('admin.management.administration.create') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Add Administration </p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('administration.view'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.management.administration.index') }}"
                                                    class="nav-link {{ Route::is('admin.management.administration.index') || Route::is('admin.management.administration.edit') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Administration List</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if ($user->can('alumni.view') || $user->can('alumni.create') || $user->can('alulmni.edit'))
                    <li
                        class="nav-item {{ Route::is('admin.alumni.index') || Route::is('admin.alumni.create') || Route::is('admin.alumni.edit') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Route::is('admin.alumni.index') || Route::is('admin.alumni.create') || Route::is('admin.alumni.edit') ? 'active' : '' }}">
                            <i class="fas fa-user-graduate"></i>
                            <p>
                                Alumni Student
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if ($user->can('alumni.create'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.alumni.create') }}"
                                        class="nav-link {{ Route::is('admin.alumni.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Add Student
                                        </p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('alumni.view'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.alumni.index') }}"
                                        class="nav-link {{ Route::is('admin.alumni.index') || Route::is('admin.alumni.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Student List
                                        </p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if ($user->can('notice.view') || $user->can('notice.create') || $user->can('notice.edit'))
                    <li
                        class="nav-item {{ Route::is('admin.notice.index') || Route::is('admin.notice.create') || Route::is('admin.notice.edit') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Route::is('admin.notice.index') || Route::is('admin.notice.create') || Route::is('admin.notice.edit') ? 'active' : '' }}">
                            <i class="fas fa-clipboard-list"></i>
                            <p>
                                Notice Manage
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if ($user->can('notice.create'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.notice.create') }}"
                                        class="nav-link {{ Route::is('admin.notice.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Add Notice
                                        </p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('notice.view'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.notice.index') }}"
                                        class="nav-link {{ Route::is('admin.notice.index') || Route::is('admin.notice.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Notice List
                                        </p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if ($user->can('news_event.view') || $user->can('news_event.create') || $user->can('news_event.edit'))
                    <li
                        class="nav-item {{ Route::is('admin.event.index') || Route::is('admin.event.create') || Route::is('admin.event.edit') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Route::is('admin.event.index') || Route::is('admin.event.create') || Route::is('admin.event.edit') ? 'active' : '' }}">
                            <i class="fas fa-newspaper"></i>
                            <p>
                                News & Event
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if ($user->can('news_event.create'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.event.create') }}"
                                        class="nav-link {{ Route::is('admin.event.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Add Post
                                        </p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('news_event.view'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.event.index') }}"
                                        class="nav-link {{ Route::is('admin.event.index') || Route::is('admin.event.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Post List
                                        </p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if ($user->can('seminar.view') || $user->can('seminar.create') || $user->can('seminar.edit'))
                    <li
                        class="nav-item {{ Route::is('admin.seminar.index') || Route::is('admin.seminar.create') || Route::is('admin.seminar.edit') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Route::is('admin.seminar.index') || Route::is('admin.seminar.create') || Route::is('admin.seminar.edit') ? 'active' : '' }}">
                            <i class="fas fa-layer-group"></i>
                            <p>
                                Seminar
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if ($user->can('seminar.create'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.seminar.create') }}"
                                        class="nav-link {{ Route::is('admin.seminar.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Post</p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('seminar.view'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.seminar.index') }}"
                                        class="nav-link {{ Route::is('admin.seminar.index') || Route::is('admin.seminar.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Post List</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if ($user->can('club.view') || $user->can('club.create') || $user->can('club.edit'))
                    <li
                        class="nav-item {{ Route::is('admin.club.index') || Route::is('admin.club.create') || Route::is('admin.club.edit') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Route::is('admin.club.index') || Route::is('admin.club.create') || Route::is('admin.club.edit') ? 'active' : '' }}">
                            <i class="fas fa-certificate"></i>
                            <p>
                                Clubs
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if ($user->can('club.create'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.club.create') }}"
                                        class="nav-link {{ Route::is('admin.club.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Post</p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('club.view'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.club.index') }}"
                                        class="nav-link {{ Route::is('admin.club.index') || Route::is('admin.club.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Post List</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if ($user->can('partner.view') || $user->can('partner.create') || $user->can('partner.edit'))
                    <li
                        class="nav-item {{ Route::is('admin.partner.index') || Route::is('admin.partner.create') || Route::is('admin.partner.edit') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Route::is('admin.partner.index') || Route::is('admin.partner.create') || Route::is('admin.partner.edit') ? 'active' : '' }}">
                            <i class="fas fa-handshake"></i>
                            <p>
                                Recruiter & Partners
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if ($user->can('partner.create'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.partner.create') }}"
                                        class="nav-link {{ Route::is('admin.partner.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Partner</p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('partner.view'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.partner.index') }}"
                                        class="nav-link {{ Route::is('admin.partner.index') || Route::is('admin.partner.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Partner List</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if ($user->can('internationl.view') || $user->can('internationl.create') || $user->can('internationl.edit'))
                    <li
                        class="nav-item {{ Route::is('admin.affairs.index') || Route::is('admin.affairs.create') || Route::is('admin.affairs.edit') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Route::is('admin.affairs.index') || Route::is('admin.affairs.create') || Route::is('admin.affairs.edit') ? 'active' : '' }}">
                            <i class="fas fa-user-tie"></i>
                            <p>
                                International Affairs
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if ($user->can('internationl.create'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.affairs.create') }}"
                                        class="nav-link {{ Route::is('admin.affairs.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Person</p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('internationl.view'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.affairs.index') }}"
                                        class="nav-link {{ Route::is('admin.affairs.index') || Route::is('admin.affairs.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Person List</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if ($user->can('career.form') ||
                    $user->can('career.view') ||
                    $user->can('career.create') ||
                    $user->can('career.edit'))
                    @php
                        $total = \App\Models\CareerForm::where('status', 0)->count();
                    @endphp
                    <li
                        class="nav-item {{ Route::is('admin.career.index') || Route::is('admin.career.create') || Route::is('admin.career.edit') || Route::is('admin.career.list') || Route::is('admin.career.view') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Route::is('admin.career.index') || Route::is('admin.affairs.create') || Route::is('admin.career.edit') || Route::is('admin.career.list') || Route::is('admin.career.view') ? 'active' : '' }}">
                            <i class="fas fa-th-list"></i>
                            <p>
                                Career
                                <i class="fas fa-angle-left right"></i>
                                @if ($total > 0)
                                    <span class="badge badge-info right">{{ $total }}</span>
                                @endif
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if ($user->can('career.form'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.career.list') }}"
                                        class="nav-link {{ Route::is('admin.career.list') || Route::is('admin.career.view') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Candidate Form</p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('career.create'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.career.create') }}"
                                        class="nav-link {{ Route::is('admin.career.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Post</p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('career.view'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.career.index') }}"
                                        class="nav-link {{ Route::is('admin.career.index') || Route::is('admin.career.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Post List</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if ($user->can('counter.edit'))
                    <li class="nav-item">
                        <a href="{{ route('admin.counter.edit') }}"
                            class="nav-link {{ Route::is('admin.counter.edit') ? 'active' : '' }}">
                            <i class="fas fa-globe"></i>
                            <p>
                                Counter Manage
                            </p>
                        </a>
                    </li>
                @endif
                    <li class="nav-item">
                        <a href="{{ route('admin.iqac.edit') }}"
                            class="nav-link {{ Route::is('admin.iqac.edit') ? 'active' : '' }}">
                            <i class="fas fa-hand-point-right"></i>
                            <p>
                                IQAC
                            </p>
                        </a>
                    </li>
                @if ($user->can('subscriber.view'))
                    <li class="nav-item">
                        <a href="{{ route('admin.subscriber.index') }}"
                            class="nav-link {{ Route::is('admin.subscriber.index') ? 'active' : '' }}">
                            <i class="fas fa-users-cog"></i>
                            <p>
                                Subscriber
                            </p>
                        </a>
                    </li>
                @endif
                @if ($user->can('about.head') ||
                    $user->can('about.view') ||
                    $user->can('about.create') ||
                    $user->can('about.edit'))
                    <li
                        class="nav-item {{ Route::is('admin.about.head') || Route::is('admin.about.index') || Route::is('admin.about.create') || Route::is('admin.about.edit') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Route::is('admin.about.head') || Route::is('admin.about.index') || Route::is('admin.about.create') || Route::is('admin.about.edit') ? 'active' : '' }}">
                            <i class="fas fa-address-card"></i>
                            <p>
                                About Page
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if ($user->can('about.head'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.about.head') }}"
                                        class="nav-link {{ Route::is('admin.about.head') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            About Head
                                        </p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('about.view') || $user->can('about.create') || $user->can('about.edit'))
                                <li
                                    class="nav-item {{ Route::is('admin.about.index') || Route::is('admin.about.create') || Route::is('admin.about.edit') ? 'menu-is-opening menu-open' : '' }}">
                                    <a href="#"
                                        class="nav-link {{ Route::is('admin.about.index') || Route::is('admin.about.create') || Route::is('admin.about.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            About Section
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @if ($user->can('about.create'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.about.create') }}"
                                                    class="nav-link {{ Route::is('admin.about.create') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Add Section</p>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($user->can('about.view'))
                                            <li class="nav-item">
                                                <a href="{{ route('admin.about.index') }}"
                                                    class="nav-link {{ Route::is('admin.about.index') || Route::is('admin.about.edit') ? 'active' : '' }}">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Section List</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if ($user->can('message.view'))
                    <li class="nav-item">
                        <a href="{{ route('admin.message.inbox') }}"
                            class="nav-link {{ Route::is('admin.message.inbox') || Route::is('admin.message.read') ? 'active' : '' }}">
                            <i class="fas fa-envelope"></i>
                            <p>
                                Contact Message
                                <span
                                    class="badge badge-info right">{{ \App\Models\Message::where('seen', '0')->count() }}</span>
                            </p>
                        </a>
                    </li>
                @endif
                @if ($user->can('logo.edit') ||
                    $user->can('slider.view') ||
                    $user->can('slider.create') ||
                    $user->can('slider.edit') ||
                    $user->can('gallery.view') ||
                    $user->can('gallery.create') ||
                    $user->can('marquee.edit') ||
                    $user->can('content.edit') ||
                    $user->can('seo.edit') ||
                    $user->can('custom.edit') ||
                    $user->can('contact.edit') ||
                    $user->can('social_link.view') ||
                    $user->can('social_link.create') ||
                    $user->can('social_link.edit') ||
                    $user->can('other.view') ||
                    $user->can('other.create') ||
                    $user->can('other.edit') ||
                    $user->can('menu.edit') ||
                    $user->can('home_customize.edit') ||
                    $user->can('email_config.edit'))
                    <li
                        class="nav-item {{ Route::is('admin.logo.edit') ||
                        Route::is('admin.slider.index') ||
                        Route::is('admin.slider.edit') ||
                        Route::is('admin.slider.create') ||
                        Route::is('admin.gallery.index') ||
                        Route::is('admin.gallery.create') ||
                        Route::is('admin.marquee.edit') ||
                        Route::is('admin.content.edit') ||
                        Route::is('admin.seo.edit') ||
                        Route::is('admin.custom.edit') ||
                        Route::is('admin.contact.edit') ||
                        Route::is('admin.social.index') ||
                        Route::is('admin.social.edit') ||
                        Route::is('admin.social.create') ||
                        Route::is('admin.page.index') ||
                        Route::is('admin.page.edit') ||
                        Route::is('admin.menu.edit') ||
                        Route::is('admin.mail.edit') ||
                        Route::is('admin.page.create') ||
                        Route::is('admin.customize.edit')
                            ? 'menu-is-opening menu-open'
                            : '' }}">
                        <a href="#"
                            class="nav-link {{ Route::is('admin.logo.edit') ||
                            Route::is('admin.slider.index') ||
                            Route::is('admin.slider.edit') ||
                            Route::is('admin.slider.create') ||
                            Route::is('admin.gallery.index') ||
                            Route::is('admin.gallery.create') ||
                            Route::is('admin.marquee.edit') ||
                            Route::is('admin.content.edit') ||
                            Route::is('admin.seo.edit') ||
                            Route::is('admin.custom.edit') ||
                            Route::is('admin.contact.edit') ||
                            Route::is('admin.social.index') ||
                            Route::is('admin.social.edit') ||
                            Route::is('admin.social.create') ||
                            Route::is('admin.page.index') ||
                            Route::is('admin.page.edit') ||
                            Route::is('admin.menu.edit') ||
                            Route::is('admin.mail.edit') ||
                            Route::is('admin.page.create') ||
                            Route::is('admin.customize.edit')
                                ? 'active'
                                : '' }}">
                            <i class="fas fa-cogs"></i>
                            <p>
                                Website Setting
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if ($user->can('logo.edit'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.logo.edit') }}"
                                        class="nav-link {{ Route::is('admin.logo.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Logo & Favicon</p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('slider.view'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.slider.index') }}"
                                        class="nav-link {{ Route::is('admin.slider.index') || Route::is('admin.slider.edit') || Route::is('admin.slider.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Home Slider</p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('gallery.view'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.gallery.index') }}"
                                        class="nav-link {{ Route::is('admin.gallery.index') || Route::is('admin.gallery.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Home Gallery</p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('marquee.edit'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.marquee.edit') }}"
                                        class="nav-link {{ Route::is('admin.marquee.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Marquee (News)</p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('content.edit'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.content.edit') }}"
                                        class="nav-link {{ Route::is('admin.content.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Website Content</p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('seo.edit'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.seo.edit') }}"
                                        class="nav-link {{ Route::is('admin.seo.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>SEO Tools</p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('custom.edit'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.custom.edit') }}"
                                        class="nav-link {{ Route::is('admin.custom.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Custom CSS & JS</p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('contact.edit'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.contact.edit') }}"
                                        class="nav-link {{ Route::is('admin.contact.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Contact & Address</p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('social_link.view'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.social.index') }}"
                                        class="nav-link {{ Route::is('admin.social.index') || Route::is('admin.social.edit') || Route::is('admin.social.create')
                                            ? 'active'
                                            : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Social Media Link</p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('other.view'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.page.index') }}"
                                        class="nav-link {{ Route::is('admin.page.index') || Route::is('admin.page.edit') || Route::is('admin.page.create')
                                            ? 'active'
                                            : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Other Page</p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('menu.edit'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.menu.edit') }}"
                                        class="nav-link {{ Route::is('admin.menu.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Menu Customize</p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('home_customize.edit'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.customize.edit') }}"
                                        class="nav-link {{ Route::is('admin.customize.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Home Page Customize</p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('email_config.edit'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.mail.edit') }}"
                                        class="nav-link {{ Route::is('admin.mail.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Email Configuration</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if ($user->can('user.view') || $user->can('user.create') || $user->can('user.edit'))
                    <li
                        class="nav-item {{ Route::is('admin.user.index') || Route::is('admin.user.edit') || Route::is('admin.user.create') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Route::is('admin.user.index') || Route::is('admin.user.edit') || Route::is('admin.user.create') ? 'active' : '' }}">
                            <i class="fas fa-users"></i>
                            <p>
                                User Manage
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if ($user->can('user.create'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.user.create') }}"
                                        class="nav-link {{ Route::is('admin.user.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add User</p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('user.view'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.user.index') }}"
                                        class="nav-link {{ Route::is('admin.user.index') || Route::is('admin.user.edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User List</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if ($user->can('role.view') ||
                    $user->can('role.create') ||
                    $user->can('role.edit') ||
                    $user->can('permission.view') ||
                    $user->can('permission.create') ||
                    $user->can('permission.edit'))
                    <li
                        class="nav-item {{ Route::is('admin.permission.index') || Route::is('admin.permission.edit') || Route::is('admin.permission.create') || Route::is('admin.role.index') || Route::is('admin.role.edit') || Route::is('admin.role.create') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Route::is('admin.permission.index') || Route::is('admin.permission.edit') || Route::is('admin.permission.create') || Route::is('admin.role.index') || Route::is('admin.role.edit') || Route::is('admin.role.create') ? 'active' : '' }}">
                            <i class="fas fa-user-lock"></i>
                            <p>
                                Role Permission
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if ($user->can('role.view'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.role.index') }}"
                                        class="nav-link {{ Route::is('admin.role.index') || Route::is('admin.role.edit') || Route::is('admin.role.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Roles</p>
                                    </a>
                                </li>
                            @endif
                            @if ($user->can('permission.view'))
                                <li class="nav-item">
                                    <a href="{{ route('admin.permission.index') }}"
                                        class="nav-link {{ Route::is('admin.permission.index') || Route::is('admin.permission.edit') || Route::is('admin.permission.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Permission</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('admin.cache') }}" class="nav-link">
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
