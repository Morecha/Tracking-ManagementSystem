<x-app-layout>
	<x-slot name="title">Penumpang</x-slot>
    <x-slot name="head">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </x-slot>

    <x-card>
		<table class="table table-bordered">
			<thead align="center">
				<th>Kode</th>
				<th>Atas_nama</th>
                <th>Kota_Asal</th>
				<th>Kota_tujuan</th>
                <th>Departure</th>
                <th>Option</th>
			</thead>
			<tbody>
                @foreach ($penumpang as $penumpang)
                <tr align="center">
                    <td>{{$penumpang->kode_penumpang}}</td>
                    <td>{{$penumpang->atas_nama}}</td>
                    <td>{{$penumpang->kota_asal}}</td>
                    <td>{{$penumpang->kota_tujuan}}</td>
                    <td>{{$penumpang->nama_hari}}, {{$penumpang->keberangkatan}}</td>
                    <td>
                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
			</tbody>
		</table>
	</x-card>

    <x-slot name="script">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </x-slot>
</x-app-layout>
