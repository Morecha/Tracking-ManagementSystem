<x-app-layout>
	<x-slot name="title">Edit Kendaraan</x-slot>

	{{-- show alert if there is errors --}}
	<x-alert-error/>

	@if(session()->has('success'))
	<x-alert type="success" message="{{ session()->get('success') }}" />
	@endif

	<x-card>
		<form action="{{ route('admin.kendaraan.update',$kendaraan->id) }}" method="post">
			@csrf
			<div class="row">
				<div class="col-md-6">
					<x-input text="No Kendaraan" name="no_kendaraan" type="text" value="{{$kendaraan->no_kendaraan}}"/>
				</div>
				<div class="col-md-6">
					<x-input text="Plat Nomor" name="no_plat" type="text" value="{{$kendaraan->no_plat}}"/>
				</div>
			</div>

            <div class="row">
				<div class="col-md-6">
					<x-input text="Jenis Kendaraan" name="jenis_kendaraan" type="text" value="{{$kendaraan->jenis_kendaraan}}"/>
				</div>
				<div class="col-md-6">
					<x-input text="Maximum Penumpang" name="jumlah_penumpang" type="text" value="{{$kendaraan->jumlah_penumpang}}"/>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="kendaraan">Jalur</label>
                            <select name="id_jalur" id="kendaraan" class="form-control">
                                @if (is_null($jalur))
                                <option value="">Masukkan Jalur</option>
                                @else
                                <option value="{{$kendaraan->id_jalur}}"> {{$jalur->kota_asal}} -----> {{$jalur->kota_tujuan}} </option>
                                @endif
                                @foreach ($alljalur as $alljalur)
                                <option value="{{$alljalur->id}}"> {{$alljalur->kota_asal}} -----> {{$alljalur->kota_tujuan}}</option>
                                @endforeach
                            </select>
					</div>
				</div>
			</div>

			<x-button type="primary" text="Submit" for="submit" />
		</form>
	</x-card>
</x-app-layout>
