<x-app-layout>
	<x-slot name="title">Penumpang</x-slot>

	<x-card>
		<table class="table table-bordered">
			<thead>
				<th>Kode</th>
				<th>Atas_nama</th>
                <th>Kota_Asal</th>
				<th>Kota_tujuan</th>
                <th>Option</th>
			</thead>
			<tbody>
                @foreach ($penumpang as $penumpang)
                <tr>
                    <td>{{$penumpang->kode_penumpang}}</td>
                    <td>{{$penumpang->atas_nama}}</td>
                    <td>{{$penumpang->kota_asal}}</td>
                    <td>{{$penumpang->kota_tujuan}}</td>
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
