<x-app-layout>
	<x-slot name="title">New Driver</x-slot>

	{{-- show alert if there is errors --}}
	<x-alert-error/>

	@if(session()->has('success'))
	<x-alert type="success" message="{{ session()->get('success') }}" />
	@endif

	<x-card>
		<form action="{{ route('admin.jadwal.update',$jalur->id) }}" method="post">
			@csrf

			<div class="row">
				<div class="col-md-6">
					<x-input text="Kota Asal" name="kota_asal" type="text" value="{{$jalur->kota_asal}}"/>
				</div>
				<div class="col-md-6">
					<x-input text="Kota Tujuan" name="kota_tujuan" type="text" value="{{$jalur->kota_tujuan}}"/>
				</div>
			</div>

            <div class="row">
				<div class="col-md-6">
					<x-input text="Harga" name="harga" type="text" value="{{$jalur->harga}}"/>
				</div>
				<div class="col-md-6">
					<x-input text="keberangkatan" name="keberangkatan" type="text" value="{{$jalur->keberangkatan}}"/>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="days">Hari</label>
                            <select name="hari" id="days" class="form-control">
                                <option value="{{$jalur->hari}}"> {{$hari->nama_hari}} </option>
                                @foreach ($allhari as $allhari)
                                    <option value="{{$allhari->id}}">{{$allhari->nama_hari}}</option>
                                @endforeach
                            </select>
					</div>
				</div>
			</div>

			<x-button type="primary" text="Submit" for="submit" />
		</form>
	</x-card>
</x-app-layout>
