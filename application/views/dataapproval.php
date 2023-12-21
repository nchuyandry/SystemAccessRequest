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
							<th>Tanggal Approved</th>
							<th>Action</th>
							
						</tr>
					</thead>
					<tbody id="showdata">	
					
					<?php 
					$i = 0;
					foreach($dapproval as $row){ 
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
							<td>
							<?php if($row->status === 'Open'){?>
								<a id="editdata" data-toggle="modal" data-target=".bd-example-modal-xl" data="<?php echo $id?>"><span class="badge badge-info"><i class="fa fa-edit"></i></span></a>
							<?php } ?>
							</td>
						</tr>
					<?php } ?>				
					</tbody>
				</table>
				</div>  
            </div>
        </div>
  
    </div>
</div>
<div class="modal fade bd-example-modal-xl" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
	<div class="modal-dialog modal-xl ">
		<div class="modal-content">
    		<form class="form-horizontal" method="post" action="">
      		<div class="modal-header">
        		<h3 class="modal-title" id="exampleModalLabel">Action</h3>
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          			<i class="tim-icons icon-simple-remove"></i>
        		</button>
      		</div>
      		<div class="modal-body">
        		<div class="container-fluid">
        			<div class="row">
        				<div class="col-sm-2">
		        			<div class="form-group">
				        		<label for="selectsystem">Nomor</label>
				        		<input type="text" class="form-control" id="nomor" name="nomor" readonly />
			        		</div>
			        	</div>
		        		<div class="col-sm-3">
		        			<div class="form-group">
				        		<label for="selectsystem">Nama</label>
				        		<input type="text" class="form-control" id="nama" name="nama" readonly />
				        		<input type="hidden" class="form-control" id="id" name="id" readonly />
				        		<input type="hidden" class="form-control" id="nik" name="nik" readonly />
			        		</div>
			        	</div>
			        	<div class="col-md-2">
				      		<div class="form-group">
				        		<label for="selectsystem">Dept</label>
				        		<input type="text" class="form-control" id="dept" name="dept" readonly />
				      		</div>
		        		</div>
		        		<div class="col-md-2">
				      		<div class="form-group">
				        		<label for="selectsystem">Jabatan</label>
				        		<input type="text" class="form-control" id="jabatan" name="jabatan" readonly />
				      		</div>
		        		</div>
		        		<div class="col-md-3">
				      		<div class="form-group">
				        		<label for="selectsystem">Depo Asal</label>
				        		<input type="text" class="form-control" id="lokasi" name="lokasi" readonly />
				      		</div>
		        		</div>
		        		<div class="col-md-3">
				      		<div class="form-group">
				        		<label for="selectsystem">Akses</label>
				        		<input type="text" class="form-control" id="system" name="system" readonly />
				        		<input type="hidden" class="form-control" id="email" name="email" readonly />
				      		</div>
		        		</div>
		        		<div class="col-md-6">
				      		<div class="form-group">
				        		<label for="selectsystem">Kebutuhan</label>
				        		<textarea  class="form-control" placeholder="Here can be your description" id="reason" name="reason" readonly></textarea>
				      		</div>
		        		</div>
		        		<div class="col-md-3">
				      		<div class="form-group">
				        		<label for="selectsystem">Select Action</label>
				        		<select class="form-control" name="status" id="system">
				        			<option value="Reject">Reject</option>
				          			<option value="Approved">Approve</option>          			
				          		</select>
			      			</div>
		        		</div>
		        		<div class="col-12">
	        				<div class="form-group">
				            	<label>Feedback </label>
				               	<textarea class="form-control" placeholder="Here can be your description" name="approval" required autofocus ></textarea>
	            			</div>
	            		</div>
	            		<div class="col-12 text-right">
	            			<button type="button" class="btn btn-danger text-right" data-dismiss="modal">Cancel</button>
		      				<button type="submit" id="updatedata" class="btn btn-fill btn-success">Submit</button>
	            		</div>
        			</div>
        		</div>
    		</div>
    		<div class="modal-footer">
		      	
		    </div>
	      	</form>
      	</div>
	</div>
</div> 