<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" title="Website Visit" target="_blank" href="{{ route('home') }}">
                <i class="fas fa-globe"></i>
            </a>
        </li>

        @php
            $message = \App\Models\Message::orderBy('id','desc')->limit(5)->get();
        @endphp

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">{{ \App\Models\Message::where('seen','0')->count() }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                @foreach ($message as $item)
                    <a href="{{ route('admin.message.read',$item->id) }}" class="dropdown-item @if($item->seen == '0') active @endif">
                        <!-- Message Start -->
                        <div class="media">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    {{ $item->name }}
                                </h3>
                                <p class="text-sm">{{ $item->subject }}</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ $item->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                @endforeach
                <a href="{{ route('admin.message.inbox') }}" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
