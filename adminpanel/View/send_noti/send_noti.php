<section class="content">
   
    	<div class="row">
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Notification</h2></div>
    		<div class="col-md-2">
                <br/>   
    		</div>
    	</div>
      <div class="alert alert-info alert-dismissible" style="display: none;" id="notiFication">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Notification has been send successfully
                </div>
        <div class="row">
        	<div class="col-xs-12">
        	
        		<div class="box">
        				<div class="box-body">
                  <form class="form-horizontal" id="addnationalityform" role="form" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                  <!--  <div class="form-group notranslate">
                                <label for="notification_title" class="col-sm-3 control-label">Notification Title<span class="show_required">*</span></label>
                                  <div class="col-sm-8" style="padding-top: 6px">
                                    <input name="notification_title" type="text" id="notification_title" class="form-control"/>
                                    <span id="notification_title_error" name="notification_title_error" class="show_required" style = "display:none">Enter Notification Title</span>
                                </div>                                   
                             </div>    -->
                             <style type="text/css">
                                 textarea {
                                      resize: none;
                                    }
                             </style>   
                            <div class="form-group notranslate">
                                <label for="notification_msg" class="col-sm-3 control-label">Notification Message<span class="show_required">*</span></label>
                                  <div class="col-sm-8" style="padding-top: 6px">
                                   <textarea rows="5" charswidth="23" name="notification_msg" id="notification_msg" style="height: 100px !important;width: 100%;"></textarea>

                                    <span id="notification_msg_error" name="notification_msg_error" class="show_required" style = "display:none">Notification Message</span>
                                </div>                                   
                             </div> 
                             <div class="form-group notranslate">
                                <label for="notification_user_select" class="col-sm-3 control-label">Select Notification User<span class="show_required">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control select2" style="width: 100%;" id="notification_user_select" name="notification_user_select">
                                                    <option value="0">Select Notification group</option>
                                                    <option value="A1">All</option>
                                                    <option value="A2">All Business</option>
                                                    <option value="A3">All Customer</option>
                                                    <option value="A4">Specific Business</option>
                                                    <option value="A5">Specific Customer</option>
                                                       </select>
                                                       <span id="notification_usererror" name="notification_usererror" class="show_required" style = "display:none">Select Notification Group</span><br>  
                                   </div>
                             </div> 
                           </form>
                          
                           <div id="displayuser">
        			             </div>
                           <div id="all_data">
                  <div class="box-footer  notranslate">
                                <input type="button" name="btn-submit" value="Submit" id="btn-submit" class="btn btn-primary pull-right" />
                            </div>
                          </div>
        		</div>
        	</div>	
       </div>
    </section>
</div>
<script type="text/javascript">
   $(document).ready(function(){
      $('#notification_user_select').change(function(){
        loadbusiness($(this).find(':selected').val())

      })
    })
        function loadbusiness(UserId){
       if(UserId == "A4")
       {
         $.ajax({
                 url:"../../Controller/send_noti/sendnoti_controller.php",
                 method:"POST",
                 data : {count_id:UserId},
                 success:function(data)
                 {
                  $("#displayuser").html(data);
                  $("#all_data").hide();
                      $(document).ready(function() {
                       $('#example1').DataTable();
                    } );

                 }
              })
       }
       else if(UserId == "A5")
       {
        $.ajax({
                 url:"../../Controller/send_noti/sendnoti_controller.php",
                 method:"POST",
                 data : {count_id:UserId},
                 success:function(data)
                 {
                  $("#displayuser").html(data);
                  $("#all_data").hide();
                      $(document).ready(function() {
                       $('#example1').DataTable();
                    } );

                 }
              })
       }
       else
       {
         $("#displayuser").html("");
         $("#all_data").show();
       }
}
$('#btn-submit').on('click', function(e) {
            var count = 0;
            var notification_user = document.getElementById('notification_user_select');
            var notification_usererror = document.getElementById('notification_usererror');
            if (notification_user.value == "0") {
                //arr_alerts_c_name[i].style.display = 'block';
                $("#notification_usererror").show();
                 count++;
            } else {
                $("#notification_usererror").hide();
            }
        // var notification_title = document.getElementById('notification_title');
        // var notification_title_error = document.getElementById('notification_title_error');
       
        //     if (notification_title == null || notification_title.value.trim() == "") {
        //         //arr_alerts_c_name[i].style.display = 'block';
        //         $("#notification_title_error").show();
        //          count++;
        //     } else {
        //         $("#notification_title_error").hide();
        //     }
        var notification_msg = document.getElementById('notification_msg');
        var notification_msg_error = document.getElementById('notification_msg_error');
       
            if (notification_msg == null || notification_msg.value.trim() == "") {
                //arr_alerts_c_name[i].style.display = 'block';
                $("#notification_msg_error").show();
                 count++;
            } else {
                $("#notification_msg_error").hide();
            }
        
            if(count>0)
            {
                
            }
            else
            {
               jconfirm({

                                               title:'Confirm',

                                               content: 'Are you sure you want to send Notification?',

                                               buttons: {

                                                 Yes: {

                                                       btnClass: 'btn-red any-other-class',

                                                       action: function(){
                                                            var notification_user = document.getElementById('notification_user_select').value;
                                                            var notification_title = "";
                                                            var notification_msg = document.getElementById('notification_msg').value;
                                                                        $.ajax({
                                                                        method: "POST",
                                                                        url: "../../Controller/send_noti/sendnoti_controller.php",
                                                                        data:{count_id:notification_user,notification_title:notification_title,notification_body:notification_msg},
                                                                        success:function(data){
                                                                          console.log(data);
                                                                          if(data == 1)
                                                                          {

                                                                           $.ajax({
                                                                             url:"../../View/send_noti/send_noti.php",
                                                                             method:"POST",
                                                                             success:function(data)
                                                                             {
                                                                                  $('.content-wrapper').html(data);
                                                                                   $('#notiFication').show();
                                                                             }
                                                                         
                                                                          })
                                                                         }
                                                                        }
                                                                      }); 
                                                              }
                                                  },

                                     No: {

                                           btnClass: 'btn-blue'        
                                       }

                                   }

                                });  
          }

});

</script>