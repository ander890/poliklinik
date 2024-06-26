@php
$links = [
    [
        "href" => route('dashboardAdmin'),
        "text" => "Dasboard",
        "icon" => "fas fa-home",
        "is_multi" => false
    ],
    [
        "href" => url('/admin/dokter'),
        "text" => "Dokter",
        "icon" => "fas fa-user-md",
        "is_multi" => false
    ],
    [
        "href" => url('/admin/pasien'),
        "text" => "Pasien",
        "icon" => "fas fa-user",
        "is_multi" => false
    ],
    [
        "href" => url('/admin/poli'),
        "text" => "Poli",
        "icon" => "fas fa-hospital",
        "is_multi" => false
    ],
    [
        "href" => url('/admin/obat'),
        "text" => "Obat",
        "icon" => "fas fa-medkit",
        "is_multi" => false
    ]
];
$navigation_links = json_decode(json_encode($links));
@endphp
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('img/udinus.png') }}" alt="Udinus Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Poliklinik</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        @foreach ($navigation_links as $link)

            @if (!$link->is_multi)
            <li class="nav-item">
            <a href="{{ (url()->current() == $link->href) ? '#' : $link->href }}" class="nav-link {{ (url()->current() == $link->href) ? 'active' : '' }}">
              <i class="nav-icon {{ $link->icon }}"></i>
              <p>
                {{ $link->text }}
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
            </li>
            @else
            @php
                foreach($link->href as $section){
                    if (url()->current() == $section->section_href) {
                        $open = 'menu-open';
                        $status = 'active';
                        break; // Put this here
                    } else {
                        $open ='';
                        $status = '';
                    }
                }
            @endphp
            <li class="nav-item {{$open}}">
            <a href="#" class="nav-link {{$status}}">
                <i class="nav-icon {{ $link->icon }}"></i>
                <p>
                  {{ $link->text }}
                  <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @foreach ($link->href as $section)
                <li class="nav-item">
                  <a href="{{ (url()->current() == $section->section_href) ? '#' : $section->section_href }}" class="nav-link {{ (url()->current() == $section->section_href) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ $section->section_text }}</p>
                  </a>
                </li>
                @endforeach
              </ul>
            </li>
            @endif

        @endforeach
        </ul>
    </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
