$(document).ready(function() {

get_data();

//$('dataTables-example').dataTable();

function get_data(){
	//var AmbilData;
	$.ajax({
				type 	: 'ajax',
				url 	: 'http://localhost/latihan-CI/admin/showUser',
				async	: false,
				dataType : 'json',
				success : function(data){
						var html = '';
						var i;
						for (i=0; i<data.length; i++) {
                            var no = i+1;
							html += '<tr class="gradeA">'+
                                            '<td>'+no+'</td>'+
                                            '<td>'+data[i].nama_user+'</td>'+
                                            '<td>'+data[i].jk_user+'</td>'+
                                            '<td>'+data[i].alamat_user+'</td>'+
                                            '<td>'+data[i].user_status+'</td>'+
                                            '<td>'+data[i].log_user+'</td>'+
                                            '<td>'+
                                                '<?php $cek=md5('+sha1data[i].id_user+').sha1('+data[i].id_user+'); ?>'+ 
                                                '<?php echo anchor(admin/editUser/'+$cek,+'<button class="btn btn-primary">Edit</button>); ?>'+
                                                '<button class="btn btn-danger" data-toggle="modal" data-target='+<?php echo "#myModal".$row->id_user; ?>+'>Delete</button>'+
                                            '</td>'+
                                    '<tr>';
                                       
						}
                        $('#status').hide();
						$('#show_data').html(html);
				},
                error: function(jqXHR, exception) {
                    $('#status').show();
                }
		});	
}
	

});