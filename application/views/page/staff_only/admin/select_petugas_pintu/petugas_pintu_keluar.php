<label class="bmd-label-floating text-gray-800" for="field_nama_petugas_pintuKeluar">Petugas pintu keluar event</label> <span class="text-danger">*</span>
<select name="nama_petugas_pintuKeluar" class="form-control select-petugas-pintu" id="field_nama_petugas_pintuKeluar">
	<option value="" disabled selected>Pilih petugas pintu keluar event</option>
	<?php foreach($staff_nganggur as $staff_data){ ?>
		<option value="<?= $staff_data->staff_id ?>"><?= $staff_data->nama ?></option>
	<?php } ?>
</select>

<small id="error_nama_petugas_pintuKeluar" class="invalid-feedback"></small>
