<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img src="{{ asset((setting('logo')) ? '/storage/'.setting('logo') : 'dist/img/logo/logo2.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3">Flare Travel</div>
    </a>
    <hr class="sidebar-divider my-0">

    <x-nav-link
        text="Dashboard"
        icon="tachometer-alt"
        url="{{ route('admin.dashboard') }}"
        active="{{ request()->routeIs('admin.dashboard') ? ' active' : '' }}"
    />
    <hr class="sidebar-divider mb-0">

    @can('pegawai')
    <x-nav-link
        text="Jadwal Keberangkatan"
        icon="users"
        url="{{ route('admin.jadwal') }}"
        active="{{ request()->routeIs('admin.jadwal') ? ' active' : '' }}"
    />
    @endcan

    @can('pegawai')
    <x-nav-link
        text="Tiket"
        icon="users"
        url="{{ route('admin.tiket') }}"
        active="{{ request()->routeIs('admin.tiket') ? ' active' : '' }}"
    />
    @endcan

    @can('pegawai')
    <x-nav-link
        text="Transportation"
        icon="users"
        url="{{ route('admin.kendaraan') }}"
        active="{{ request()->routeIs('admin.kendaraan') ? ' active' : '' }}"
    />
    @endcan

    @can('pegawai')
    <x-nav-link
        text="Drivers"
        icon="users"
        url="{{ route('admin.driver') }}"
        active="{{ request()->routeIs('admin.driver') ? ' active' : '' }}"
    />
    @endcan

    <hr class="sidebar-divider mb-0">

    @can('member-list')
    <x-nav-link
        text="Member"
        icon="users"
        url="{{ route('admin.member') }}"
        active="{{ request()->routeIs('admin.member') ? ' active' : '' }}"
    />
    @endcan

    @can('role-list')
    <x-nav-link
        text="Roles"
        icon="th-list"
        url="{{ route('admin.roles') }}"
        active="{{ request()->routeIs('admin.roles') ? ' active' : '' }}"
    />
    @endcan

    <hr class="sidebar-divider mb-0">

    @can('setting-list')
    <x-nav-link
        text="Settings"
        icon="cogs"
        url="{{ route('admin.settings') }}"
        active="{{ request()->routeIs('admin.settings') ? ' active' : '' }}"
    />
    @endcan
</ul>
