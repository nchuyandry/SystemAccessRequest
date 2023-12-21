function dataapproval(){
        $.ajax({
            type  : 'ajax',
            url   : "<?php echo base_url('getdata')?>",
            dataType : 'json',
            success : function(data){
                var output = '';
                var i=0;
                var x=1; 
                while(i<data.length){
                  output += '<tr>'+
                              '<td>'+x+'</td>'+
                              '<td>'+data[i].tanggal+'</td>'+
                              '<td>'+data[i].nik+'</td>'+
                              '<td>'+data[i].nama+'</td>'+
                              '<td>'+data[i].lokasi+'</td>'+
                              '<td>'+data[i].dept+'</td>'+
                              '<td>'+data[i].jabatan+'</td>'+
                              '<td>'+data[i].system+'</td>'+
                              '<td>'+data[i].reason+'</td>';
                             // if(+data[i].status+ === "Open"){
                              if(data[i].status === "Open"){
                              	output += '<td><span class="badge badge-info">'+data[i].status+'</span></td>';
                              }else if(data[i].status === "Approved"){
                              	output += '<td><span class="badge badge-success">'+data[i].status+'</span></td>';
                              }else{
                              	output += '<td><span class="badge badge-danger">'+data[i].status+'</span></td>';
                              }
                             // }
                              output += '<td>\
                              	<a id="editdata" data-toggle="modal" data-target=".bd-example-modal-xl" data="'+data[i].id+'"><span class="badge badge-info"><i class="fa fa-edit"></i></span></a>\
                              </td>'+
                            '</tr>';
                  i++;
                  x++;
                }
                $('#showdata').html(output);
            }
        });
    }
