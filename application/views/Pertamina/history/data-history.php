<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="col-md-7">
					<h3 class="box-title">Data History</h3>
				</div>
			</div>
<?php  
/**
 * Start Form Pencarian
 *
 * @return string
 **/
echo form_open(current_url(), array('method' => 'get'));
?>
			<div class="box-body">
				<div class="col-md-4">
					Tampilkan 
					<select name="per_page" class="form-control input-sm" style="width:60px; display: inline-block;" onchange="window.location = '<?php echo site_url('pegawai?per_page='); ?>' + this.value + '&query=<?php echo $this->input->get('query'); ?>&village=<?php echo $this->input->get('village'); ?>';">
					<?php  
					/**
					 * Loop 10 to 100
					 * Guna untuk limit data yang ditampilkan
					 * 
					 * @var 10
					 **/
					$start = 20; 
					while($start <= 100) :
						$selected = ($start == $this->input->get('per_page')) ? 'selected' : '';
						echo "<option value='{$start}' " . $selected . ">{$start}</option>";

						$start += 10;
					endwhile;
					?>
					</select>
					per halaman
				</div>
			</div>

			<div class="box-body">
				<div class="col-md-2">
				    <div class="form-group">
				        <label>Level :</label>
				        <select name="level" class="form-control input-sm">
				        	<option value="">-- PILIH --</option>
				        	<!-- <option value="Admin" <?php if($this->input->get('level')=='Admin') echo 'selected'; ?>>Admin</option>
				        	<option value="Username" <?php if($this->input->get('level')=='Username') echo 'selected'; ?>>Username</option> -->
				        </select>	
				    </div>
				</div>

				<div class="col-md-3">
				    <div class="form-group">
				        <label>Kata Kunci :</label>
				        <input type="text" name="query" class="form-control input-sm" value="<?php echo $this->input->get('query') ?>" placeholder="Username / Nama Lengkap / Email . . . ">
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="form-group">
                    <button type="submit" class="btn btn-warning hvr-shadow top"><i class="fa fa-filter"></i> Filter</button>
                    <a href="<?php echo site_url('history') ?>" class="btn btn-warning hvr-shadow top" style="margin-left: 10px;"><i class="fa fa-times"></i> Reset</a>
				    </div>
				</div>
			</div>
<?php  
// End form pencarian
echo form_close();
?>
			<div class="box-body">
				<table class="table table-hover table-bordered" >
					<thead class="bg-silver">
						<tr>
							<th class="text-center" style="width: 50px;">No</th>
							<th class="text-center">Nama Pengawas</th>
							<th class="text-center">Tanggal</th>
							<th class="text-center">Nama Kontraktor</th>
							<th class="text-center">Plan Target</th>
							<th class="text-center">Actual Target</th>
							<th class="text-center">Progress</th>
							<th class="text-center">Jam Mulai</th>
							<th class="text-center">Jam Selesai</th>
							<th class="text-center">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($this->mhistory->data() as $key => $value): ?>
						<tr>
							
							<td class="text-center"><?php echo ++$key ?></td>
							<td class="text-center"><?php echo ucwords($this->mhistory->get_pengawas($value->pengawas)->nama_pegawai) ?></td>
							<td class="text-center"><?php echo date_id($value->tanggal) ?></td>
							<td class="text-center"><?php echo ucwords($this->mhistory->data_kontraktor($value->id_kontraktor)->nama) ?></td>
							<td class="text-center"><?php echo $value->plan_target ?></td>
							<td class="text-center"><?php echo $value->actual_target ?></td>
							<td class="text-center"><?php echo $value->plan_target + $value->actual_target; ?></td>
							<td class="text-center"><?php echo $value->jam_mulai ?></td>
							<td class="text-center"><?php echo $value->jam_selesai ?></td>
							<td class="text-center"><?php echo $value->status ?></td>
							
						</tr>
						<?php endforeach ?>
						
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>