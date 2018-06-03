
<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="col-md-7">
					<h3 class="box-title">Data Pekerjaan Final</h3>
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
				<div class="pull-right">
				
					<a href="<?php echo site_url('pekerjaan_final/create') ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-plus"></i> Tambah Baru</a>
				
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
                    <a href="<?php echo site_url('konteraktor') ?>" class="btn btn-warning hvr-shadow top" style="margin-left: 10px;"><i class="fa fa-times"></i> Reset</a>
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
							<th class="text-center">Nama Pekerjaan</th>
							<th class="text-center">Nama Pegawai</th>
							<th class="text-center">Nama Pengawas</th>
							<th class="text-center">Tanggal</th>
							<th class="text-center">Nama Kontraktor</th>
							<th class="text-center">Plan Target</th>
							<th class="text-center">Actual Target</th>
							<th class="text-center">Jam Mulai</th>
							<th class="text-center">Jam Selesai</th>
							<th class="text-center">Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($get as $key => $value): ?>
						<tr>
							<td><?php echo ++$key ?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
							<a href="<?php echo site_url("pekerjaan_final/update/{$value->id}") ?>" class="icon-button text-blue" data-toggle="tooltip" data-placement="top" title="Sunting"><i class="fa fa-pencil"></i></a>
						
							<a href="javascript:void(0)" id="delete-pekerjaan_final" data-id="<?php echo $value->id ?>" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
                      		<i class="fa fa-trash-o"></i>
                      		</a>
							</td>
						</tr>
						<?php endforeach ?>
						
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<!-- HAK AKSES -->
<div class="modal fade in modal-danger" id="modal-delete" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-warning"></i> Perhatian!</h4>
                <span>Hapus data ini dari sistem?</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                <a id="delete-yes" class="btn btn-outline"> Ya </a>
            </div>
        </div>
    </div>
</div>