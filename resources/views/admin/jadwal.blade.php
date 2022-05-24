<x-app-layout>
	<x-slot name="title">Jadwal</x-slot>

	<x-card>
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
                    <td>{{$jalur->keberangkatan}}</td>
                    <td>{{$jalur->harga}}</td>
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
