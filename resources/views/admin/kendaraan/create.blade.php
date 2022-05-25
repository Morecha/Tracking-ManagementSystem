<x-app-layout>
	<x-slot name="title">New Kendaraan</x-slot>

	{{-- show alert if there is errors --}}
	<x-alert-error/>

	@if(session()->has('success'))
	<x-alert type="success" message="{{ session()->get('success') }}" />
	@endif
	<x-card>
		<form action="{{ route('admin.kendaraan.store') }}" method="post">
			@csrf

			<div class="row">
				<div class="col-md-6">
					<x-input text="Plat Nomor" name="no_plat" type="text" />
				</div>
				<div class="col-md-6">
					<x-input text="Nomor Mesin" name="no_kendaraan" type="text" />
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
			        <x-input text="Jenis Kendaraan" name="jenis_kendaraan" type="text" />
				</div>
				<div class="col-md-6">
					<x-input text="Maximum Penumpang" name="jumlah_penumpang" type="text" />
				</div>
			</div>

            <div class="row">
				<div class="col-md-6">
			        <div class="form-group">
						<label for="jalur">Rute</label>
                            <select name="id_jalur" id="jalur" class="form-control">
                                <option> -- Pilih Rute -- </option>
                                @foreach ($jalur as $jalur)
                                    <option value="{{$jalur->id}}">{{$jalur->kota_asal}} ---> {{$jalur->kota_tujuan}}</option>
                                @endforeach
                            </select>
					</div>
				</div>
			</div>

			<x-button type="primary" text="Submit" for="submit" />

		</form>
	</x-card>
</x-app-layout>
