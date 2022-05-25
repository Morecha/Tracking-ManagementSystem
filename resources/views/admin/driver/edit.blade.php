<x-app-layout>
	<x-slot name="title">New Driver</x-slot>

	{{-- show alert if there is errors --}}
	<x-alert-error/>

	@if(session()->has('success'))
	<x-alert type="success" message="{{ session()->get('success') }}" />
	@endif

	<x-card>
		<form action="{{ route('admin.driver.update',$driver->id) }}" method="post">
			@csrf

			<div class="row">
				<div class="col-md-6">
					<x-input text="Name" name="nama" type="text" value="{{$driver->nama}}"/>
				</div>
				<div class="col-md-6">
					<x-input text="NIP" name="NIP" type="text" value="{{$driver->NIP}}"/>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
			        <x-input text="Kontak" name="contac_person" type="text" value="{{$driver->contac_person}}"/>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="kendaraan">Mobil</label>
                            <select name="id_kendaraan" id="kendaraan" class="form-control">
                                <option value="{{$driver->id_kendaraan}}"> {{$mobil->no_plat}}</option>
                                @foreach ($allmobil as $allmobil)
                                <option value="{{$allmobil->id}}">{{$allmobil->no_plat}}</option>
                                @endforeach
                            </select>
					</div>
				</div>
			</div>
			<x-button type="primary" text="Submit" for="submit" />
		</form>
	</x-card>
</x-app-layout>
