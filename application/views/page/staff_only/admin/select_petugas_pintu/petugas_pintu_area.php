<select name="namaPetugas[]" class="form-control field_nama_petugas select-petugas-pintu">
	<option value="" disabled selected>Pilih petugas pintu area ini</option>
	<?php foreach($staff_nganggur as $staff_data){ ?>
		<option value="<?= $staff_data->staff_id ?>"><?= $staff_data->nama ?></option>
	<?php } ?>
</select>
