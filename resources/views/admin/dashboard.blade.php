<x-app-layout>
    <x-slot name="title">
        Dahsboard
    </x-slot>

    <section class="row">
        <x-card-sum
            text="Total Driver"
            value="1"
            icon="users"
            color="warning"
        />
        <x-card-sum
            text="Total Transaksi"
            value="1450"
            icon="chart-line"
            color="primary"
        />
        <x-card-sum
            text="Total Jalur"
            value="42"
            icon="box"
            color="danger"
        />
    </section>

    <section class="row">
        {{-- log activity section --}}
        <div class="col-md-5">
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
        <div class="col-md-7">
            <!-- Area Charts -->
              <x-card>
                <x-slot name="title">
                    up Comming
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
    </section>

    <x-slot name="script">
        <script src="{{ asset('dist/js/demo/chart-area-demo.js') }}"></script>
    </x-slot>
</x-app-layout>
