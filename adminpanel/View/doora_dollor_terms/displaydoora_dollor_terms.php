<?php 
// include "../../View/header/header.php";
//  include "../../View/header/sidemenu.php";
?> 
<script type="text/javascript">
  $(document).ready(function() {
   $('#example1').DataTable( {
    "columnDefs": [ {
            "targets": [3],
            "orderable": false
            } ]
    });
} );
      // function addtag()
      // {
      //       $.ajax({
      //            url:"../../View/tag/addtag.php",
      //            method:"POST",
      //            success:function(data)
      //            {
      //                 $('.content-wrapper').html(data);
      //                  // pageurl = "../../View/tag/addtag.php";
      //                  // window.history.pushState({path:pageurl},'',pageurl);  
      //            }
      //         })
      // }
      function adddoora_dollor_terms(id)
      {
            $.ajax({
                 url:"../../Controller/doora_dollor_terms/adddoora_dollor_terms.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
      function listdoora_dollor_terms(id)
      {
            hash_id = id;
            $.ajax({
                 url:"../../Controller/doora_dollor_terms/displaydoora_dollor_terms.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      $(hash_id).show();
                 }
              })
      }
      function viewtag(id)
      {
            $.ajax({
                 url:"../../Controller/tag/viewtag_controller.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                        
                 }
              })
      }
      function editdoora_dollor_terms(id)
      {
            $.ajax({
                 url:"../../Controller/doora_dollor_terms/editdoora_dollor_terms.php?id="+id,
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      
                 }
              })
      }
      function listtag(data)
      {
            hash_id = data;
            $.ajax({
                 url:"../../Controller/tag/displaytagcontroller.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      $(hash_id).show();
                 }
              })
      }
      function existstag(data)
      {
         hash_id = data;
            $.ajax({
                 url:"../../View/tag/addtag.php",
                 method:"POST",
                 success:function(data)
                 {
                      $('.content-wrapper').html(data);
                      $(hash_id).show();
                      
                 }
              })
      }
      
</script>
<section class="content">
   
    	<div class="row">
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Doora Dollor Value List</h2></div>
    		<div class="col-md-2">
                <br/>   
    		<button type="button" style="float: right;" class="btn btn-primary" onclick="adddoora_dollor_terms()">+ Add</button>
    		</div>
    	</div> 
                <div class="alert alert-info alert-dismissible" id="delete" style="display: none;">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Doora dollor value has been deleted successfully
                 </div>
                <div class="alert alert-info alert-dismissible" id="add" style="display: none">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Doora dollor value has been Added successfully
                </div>
                <div class="alert alert-info alert-dismissible" id="edit" style="display: none">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     Doora dollor value has been Edit successfully
                </div>
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box">
        				<div class="box-body">
        				<table id="example1" class="table table-bordered table-hover">
			                <thead>
			                <tr>
			                  <th style="text-align:center;" width="5%">#</th>
			                  <!-- <th style="text-align:center;" width="8%">Id</th> -->
			                  <th style="text-align:center;">Title</th>
                        <th style="text-align:center;">Terms</th>
			                  <th style="text-align:center;" width="10%">Action</th>
			                </tr>
							 </thead>
                <?php
                $i=0;
                foreach ($display_tag as $key => $data) 
                {      
                  ?> <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <!-- <td style="text-align:center;"><?php echo $data['id']; ?></td> -->
                                <td style="text-align:center;"><?php echo $data['title']; ?></td>
                                <td><?php echo $data['doora_dollar_tearms_desc']; ?></td>
                                <td style="text-align:center;">
                                    <div>
                                        <a onclick="editdoora_dollor_terms(<?php echo $data['id']; ?>)" <?php //echo "href=../../Controller/tag/edittag_controller.php?id=".$data['tag_id']; ?> title="Edit" style="cursor: pointer;" >
                                          <i class="fa fa-pencil-square-o fa-fw"></i>
                                        </a>
                                        <a onclick="JSconfirm(<?php echo $data['id']; ?>)" title="Delete" style="cursor: pointer;" >
                                          <i class="fa fa-trash-o fa-fw"></i>
                                        </a>
                                  </div>

                                </td>
                                 </tr>
                           <?php  } ?>
                  </table>
        			</div>
        		</div>
        	</div>	
       </div>
    </section>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script type="text/javascript">

function JSconfirm(id){
  var bla = id;
  $.confirm({
    title:'Delete',
    content: 'Are you sure you want to delete this ?',
    buttons: {
      Yes: {
            btnClass: 'btn-red any-other-class', 
          action: function(){
             var count_id = "delete";
            $.ajax({
                 url:"../../Controller/doora_dollor_terms/doora_dollor_terms_controller.php",
                 method:"POST",
                 data : {count_id:count_id,id:bla},
                 success:function(data)
                 {
                      listdoora_dollor_terms(bla);
                 }
              })
          }
        },
        No: {
            btnClass: 'btn-blue'
        }
    }
});
}
</script>
 <?php 
  //include "../../View/header/footer.php";?>  