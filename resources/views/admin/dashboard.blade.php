<x-app-layout>
    <x-slot name="title">
        Dahsboard
    </x-slot>
    <x-slot name="head">
        {{-- <link rel="stylesheet" href="{{ URL::asset('dist/vendor/leaflet/leaflet.css') }}"> --}}
        {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script> --}}
        {!! @$map->styles() !!}
    </x-slot>

    <section class="row">
        <x-card-sum
            text="Total Driver"
            value="{{$driver}}"
            icon="users"
            color="warning"
        />
        <x-card-sum
            text="Total Konsumen"
            value="{{$transaksi}}"
            icon="chart-line"
            color="primary"
        />
        <x-card-sum
            text="Total Jalur"
            value="{{$jalur}}"
            icon="box"
            color="danger"
        />
        <x-card-sum
            text="Total Transportasi"
            value="{{$transportasi}}"
            icon="car"
            color="danger"
        />

    </section>

    <section class="row">
        {{-- log activity section --}}
        <div class="col-md-3">
            <x-card>
                <x-slot name="title">
                    Log Activity
                </x-slot>
                <x-slot name="option">
                    <a href="{{ route('admin.logs') }}" class="btn btn-primary btn-sm">More</a>
                </x-slot>
                <table class="table">
                    <tbody>
                        @forelse($logs as $log)
                        <tr>
                            <td>{{ $log->description }}</td>
                            <td><small>{{ $log->created_at->diffForHumans() }}</small></td>
                        </tr>
                        @empty
                        <td colspan="2" class="text-center">No Data</td>
                        @endforelse
                    </tbody>
                </table>
            </x-card>
        </div>

        {{-- chart section --}}
        <div class="col-md-9" style="height: 10%">
            <!-- Area Charts -->
            <x-card>
                <x-slot name="title">
                    Maps
                </x-slot>
                    {{-- <a class="link" href="{{URL::to('http://www.google.com')}}">GOOGLE</a> --}}
                    {{-- <div id="map" style="height:450px"></div> --}}
                        {!! @$map->render() !!}
            </x-card>
        </div>
    </section>

    <x-slot name="script">
        {!! @$map->scripts() !!}
        {{-- <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script> --}}
        {{-- <script src="{{ URL::asset('dist/vendor/leaflet/leaflet.js') }}"></script> --}}
        <script src="{{ asset('dist/js/demo/chart-area-demo.js') }}"></script>

        {{-- <script>
            var map = L.map('map').setView([0.787787, 120.416271], 4);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);
        </script> --}}
    </x-slot>
</x-app-layout>
