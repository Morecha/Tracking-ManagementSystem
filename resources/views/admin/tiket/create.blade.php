<x-app-layout>
	<x-slot name="title">New User</x-slot>

	{{-- show alert if there is errors --}}
	<x-alert-error/>

	@if(session()->has('success'))
	<x-alert type="success" message="{{ session()->get('success') }}" />
	@endif
	<x-card>
		<form action="{{ route('admin.tiket.store') }}" method="post">
			@csrf

			<div class="row">
				<div class="col-md-6">
					<x-input text="Nama" name="atas_nama" type="text" />
				</div>
				<div class="col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Kode Penumpang</label>
					<input class="form-control" type="text" readonly name="kode_penumpang" value="{{$ini}}">
				</div>
			</div>

            <div class="row">
				<div class="col-md-3">
					<label for="exampleFormControlInput1" class="form-label">Kode Tujuan</label>
					<input class="form-control" type="text" readonly name="id_jalur" value="{{$tujuan->id}}">
				</div>
                <div class="col-md-3">
                    <label for="exampleFormControlInput1" class="form-label">Kota Tujuan</label>
                    <span class="input-group-text" id="basic-addon2">{{$tujuan->kota_asal}} ----> {{$tujuan->kota_tujuan}}</span>
                </div>
                <div class="col-md-6">
					<label for="exampleFormControlInput1" class="form-label">Harga</label>
                    <span class="input-group-text" id="basic-addon2">{{$tujuan->harga}}</span>
				</div>
			</div>

            <div class="row">
				<div class="col-md-6">
                    <br>
                    <label for="exampleFormControlInput1" class="form-label">Hari</label>
					<span class="input-group-text" id="basic-addon2">{{$hari->nama_hari}}</span>
				</div>
				<div class="col-md-6">
                    <br>
                    <label for="exampleFormControlInput1" class="form-label">Waktu</label>
					<span class="input-group-text" id="basic-addon2">{{$tujuan->keberangkatan}}</span>
				</div>
			</div>

			<x-button type="primary" text="Submit" for="submit" />

		</form>
	</x-card>
</x-app-layout>
