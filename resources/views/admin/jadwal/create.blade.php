<x-app-layout>
	<x-slot name="title">New User</x-slot>

	{{-- show alert if there is errors --}}
	<x-alert-error/>

	@if(session()->has('success'))
	<x-alert type="success" message="{{ session()->get('success') }}" />
	@endif
	<x-card>
		<form action="{{ route('admin.jadwal.store') }}" method="post">
			@csrf
			<div class="row">
				<div class="col-md-6">
					<x-input text="Kota Asal" name="kota_asal" type="text" />
				</div>
				<div class="col-md-6">
					<x-input text="Kota Tujuan" name="kota_tujuan" type="text" />
				</div>
			</div>


			<div class="row">
				<div class="col-md-6">
			        <label for="basic-url" class="form-label">Biaya</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Rp</span>
                        <input type="text" class="form-control" id="basic-url" name="harga">
                    </div>
				</div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="hari">Rute</label>
                            <select name="hari" id="hari" class="form-control">
                                <option> -- Pilih Hari -- </option>
                                @foreach ($hari as $hari)
                                    <option value="{{$hari->id}}">{{$hari->nama_hari}}</option>
                                @endforeach
                            </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Waktu</label>
                    <input class="form-control" type="text" placeholder="Jam : Menit : Detik" name="keberangkatan">
                </div>
			</div>

			<x-button type="primary" text="Submit" for="submit" />
		</form>
	</x-card>

</x-app-layout>

<script type="text/javascript">$('.clockpicker').clockpicker();</script>
