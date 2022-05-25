<x-app-layout>
	<x-slot name="title">Transportations</x-slot>

	<x-card>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-success me-md-2">
                <a href="{{route('admin.kendaraan.create')}}" style="color:white">Tambah Kendaraan</a>
            </button>
        </div><br>
		<table class="table table-bordered">
			<thead>
				<th>Plat nomor</th>
                <th>Kota Asal</th>
                <th>Kota Tujuan</th>
				<th>Jenis Kendaraan</th>
				<th>Kursi</th>
                <th>option</th>
			</thead>
			<tbody>
                @foreach ($kendaraan as $kendaraan)
                <tr>
                    <td>{{$kendaraan->no_plat}}</td>
                    <td>{{$kendaraan->kota_asal}}</td>
                    <td>{{$kendaraan->kota_tujuan}}</td>
                    <td>{{$kendaraan->jenis_kendaraan}}</td>
                    <td>{{$kendaraan->jumlah_penumpang}}</td>
                    <td>
                        <a href="{{route('admin.kendaraan.edit',$kendaraan->id)}}" class="btn btn-primary mr-1"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
		</table>
	</x-card>
</x-app-layout>
