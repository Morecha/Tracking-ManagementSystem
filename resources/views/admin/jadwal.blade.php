<x-app-layout>
	<x-slot name="title">Jadwal</x-slot>

	<x-card>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-success me-md-2">
                <a href="{{ route('admin.jadwal.create')}}" style="color:white">Tambah Jadwal</a>
            </button>
        </div><br>
		<table class="table table-bordered">
			<thead>
				<th>Kota Asal</th>
				<th>Kota Tujuan</th>
				<th>Keberangkatan</th>
				<th>Harga</th>
                <th>Option</th>
			</thead>
			<tbody>
            @foreach ($jalur as $jalur)
                <tr>
                    <td>{{$jalur->kota_asal}}</td>
                    <td>{{$jalur->kota_tujuan}}</td>
                    <td>{{$jalur->nama_hari}}, {{$jalur->keberangkatan}}</td>
                    <td>{{$jalur->harga}}</td>
                    <td>
                        <a href="{{route('admin.tiket.create', $jalur->id)}}" class="btn btn-success mr-1"><i class="fas fa-shopping-cart"></i></a>
                        <a href="{{route('admin.jadwal.edit', $jalur->id)}}" class="btn btn-primary mr-1"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
			</tbody>
		</table>
	</x-card>
</x-app-layout>
