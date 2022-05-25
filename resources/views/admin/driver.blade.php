<x-app-layout>
	<x-slot name="title">Drivers</x-slot>

	<x-card>
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
                        <a href="" class="btn btn-primary mr-1"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
			</tbody>
		</table>
	</x-card>
</x-app-layout>
