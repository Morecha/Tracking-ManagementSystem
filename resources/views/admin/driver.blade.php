<x-app-layout>
	<x-slot name="title">Drivers</x-slot>

	<x-card>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-success me-md-2">
                <a href="{{route('admin.driver.create')}}" style="color:white">Tambah Driver</a>
            </button>
        </div><br>
		<table class="table table-bordered">
			<thead>
				<th>Name</th>
				<th>NIP</th>
                <th>Kontak</th>
				<th>Kendaraan</th>
                <th>Plat Nomor</th>
                <th>Option</th>
			</thead>
			<tbody>
                @foreach ($driver as $driver)
                <tr>
                    <td>{{$driver->nama}}</td>
                    <td>{{$driver->NIP}}</td>
                    <td>{{$driver->contac_person}}</td>
                    <td>{{$driver->jenis_kendaraan}}</td>
                    <td>{{$driver->no_plat}}</td>
                    <td>
                        <a href="{{route('admin.driver.edit',$driver->id)}}" class="btn btn-primary mr-1"><i class="fas fa-edit"></i></a>
                        <form action="{{route('admin.driver.delete',$driver->id)}}" method="post" style="display: inline-block;">
                            @csrf
                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
			</tbody>
		</table>
	</x-card>
</x-app-layout>
