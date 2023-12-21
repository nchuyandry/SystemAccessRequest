<div class="row">
	<div class="col-12">
    	<div class="card">
    	  	<div class="card-header">
            	<div class="row">
                  <div class="col-sm-6 text-left">
	                  <h5 class="card-category">System Access Request Form</h5>
    	              <h2 class="card-title">List Approval</h2>
                  </div>
                </div>
            </div>
            <div class="card-body">
            	<div class="table-responsive">
				<table id="dataTable" class="table table-hover table-sorter" style="width: 100%">
					<thead class="text-primary">
						<tr>
							<th>No.</th>
							<th>Date</th>
							<th>No. Pengajuan</th>
							<th>Nama</th>
							<th>Depo Asal</th>
							<th>Departemen</th>
							<th>Jabatan</th>
							<th>Akses</th>
							<th>Kebutuhan</th>
							<th>Status</th>							
							<th>Tgl. Approved</th>							
						</tr>
					</thead>
					<tbody id="showdata">	
					
					<?php 
					$i = 0;
					foreach($pengajuan as $row){ 
					$i++;
					$tgl = date_create($row->tanggal);
					$id = $row->id;
					$nomor = $row->nomor;
					$nama = $row->nama;
					$lokasi = $row->lokasi;
					$dept = $row->dept;
					$jabatan = $row->jabatan;
					$system = $row->system;
					$reason = $row->reason;
					$tglapprove = $row->tglapprove;
					?>
						<tr>
							<td><?php echo $i?></td>
							<td><?php echo date_format($tgl, "d M Y") ?></td>
							<td><?php echo $nomor ?></td>
							<td><?php echo $nama ?></td>
							<td><?php echo $lokasi ?></td>
							<td><?php echo $dept ?></td>
							<td><?php echo $jabatan ?></td>
							<td><?php echo $system ?></td>
							<td><?php echo $reason ?></td>
							<td>
							<?php if($row->status === 'Open'){?>
								<span class="badge badge-info"><?php echo $row->status ?></span>
							<?php }elseif($row->status === 'Approved'){?>
								<span class="badge badge-success"><?php echo $row->status ?></span>
							<?php }else{ ?>
								<span class="badge badge-danger"><?php echo $row->status ?></span>
							<?php } ?>
							</td>
							<td><?php echo $tglapprove ?></td>
						</tr>
					<?php } ?>				
					</tbody>
				</table>
				</div>  
            </div>
        </div>
  
    </div>
</div>