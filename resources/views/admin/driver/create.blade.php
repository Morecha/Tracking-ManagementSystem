<x-app-layout>
	<x-slot name="title">New Driver</x-slot>

	{{-- show alert if there is errors --}}
	<x-alert-error/>

	@if(session()->has('success'))
	<x-alert type="success" message="{{ session()->get('success') }}" />
	@endif

	<x-card>
		<form action="{{ route('admin.driver.store') }}" method="post">
			@csrf

			<div class="row">
				<div class="col-md-6">
					<x-input text="Name" name="nama" type="text" />
				</div>
				<div class="col-md-6">
					<x-input text="NIP" name="NIP" type="text" />
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
			        <x-input text="Kontak" name="contac_person" type="text" />
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="kendaraan">Mobil</label>
                            <select name="id_kendaraan" id="kendaraan" class="form-control">
                                <option> -- Pilih Kendaraan -- </option>
                                @foreach ($kendaraan as $kendaraan)
                                <option value="{{$kendaraan->id}}">{{$kendaraan->no_plat}}</option>
                                @endforeach
                            </select>
					</div>
				</div>
			</div>

			<x-button type="primary" text="Submit" for="submit" />
		</form>
	</x-card>
</x-app-layout>
