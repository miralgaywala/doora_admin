                       <br>
                           <br>
                           <hr>
        				      <table id="example1" class="table table-bordered table-hover">
			                <thead>
			                <tr>
			                  <th style="text-align:center;" width="5%">#</th>
			                  <th style="text-align:center;" width="5%">User Id</th>
			                  <th style="text-align:center;">Name</th>
                        <th style="text-align:center;">Photo</th>
                        <th style="text-align:center;">Email Id</th>
                         <th style="text-align: center; width: 15%;"><input type="checkbox" id="multiple_students">&nbsp;&nbsp;&nbsp;Select All</th>
			                </tr>
							 </thead>
               <tbody>
                <?php
                $spec = "";
                $i=0;
                 $stu_array = array();
                foreach ($display_businessuser as $key => $data) 
                {       
                 array_push($stu_array,$data['user_id']); 
                if($data['photo'] == NULL)
                 {
                  $data['photo']= "default.png";
                 }
                else if(file_exists("../../../images/profile/".$data['photo'])) {
                  $data['photo'] = $data['photo'];
                 }
                 else
                 {
                  $data['photo']= "default.png";
                 } 
                 if($data['is_business'] == 1)
                 {
                  $spec = "sb";
                    $name1 = addslashes($data['business_name']);
                           $name = stripslashes($name1);    
                 }
                 else
                 {
                  $spec = "sc";
                  $name = $data['name'];
                 }
                        

                            $time = date("H:i:s");

                           ?> 
                            <tr>
                                <td style="text-align:center;"><?php echo $i=$i+1;?></td>
                                <td style="text-align:center;"><?php echo $data['user_id']; ?></td>
                                <td style="text-align:center;"><?php echo $name; ?></td>
                                <td style="text-align:center;"><img <?php echo "src=../../../images/profile/".$data['photo']."?time=$time";?> id="profilePicture" style="object-fit: contain;"/></td>
                                <td style="text-align:center;"><?php echo $data['email'];?></td>
                                <td style="text-align: center;"><input type="checkbox" value="<?php echo $data['user_id']; ?>" name="students"></td>
                                 </tr>
                               <?php }?>
                            </tbody>    
                           
                  </table>
                  <br>
                  <div class="box-footer  notranslate">
                                <input type="button" name="btn-submit" value="Submit" id="btn-submit" class="btn btn-primary pull-right" />
                            </div>
                  <?php $usergroup_value = implode(",",$stu_array); ?>
                  <script type = "text/javascript" >
var is_all_check = 0;
var usergroup_value = [];
var users = '<?php echo $usergroup_value; ?>';
$("#multiple_students").change(function() { //"select all" change 
    $("input[name=students]").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
    if ($(this).is(":checked")) {
        is_all_check = 1;
        usergroup_value = users.split(',');
        is_aclchexk();

    } else {
        is_all_check = 0;
        is_aclchexk();
        usergroup_value = [];
    }
});
$(document).ready(function() {

    $('input[name=students]').change(function() {
        if ($(this).is(":checked")) {
            usergroup_value.push(this.value);

        } else if (!$(this).is(":checked")) {
            usergroup_value = usergroup_value.filter(item => item !== this.value)
        }
        usergroup_value = uniq(usergroup_value);
    });

    $('#example1').on('draw.dt', function() {
        is_aclchexk();
        $("input[name=students]").change(function() {

            if ($(this).is(":checked")) {
                usergroup_value.push(this.value);

            } else if (!$(this).is(":checked")) {
                usergroup_value = usergroup_value.filter(item => item !== this.value)
            }
            usergroup_value = uniq(usergroup_value);
        });
    });
});

function uniq(a) {
    var seen = {};
    return a.filter(function(item) {
        return seen.hasOwnProperty(item) ? false : (seen[item] = true);
    });
}


function is_aclchexk() {
    if (is_all_check == 1) {

        $('#example1').on('draw.dt', function() {
            $('input[name=students]').each(function() {
                $(this).prop('checked', true);
            });
        });
    } else {
        $('#example1').on('draw.dt', function() {
            $('input[name=students]').each(function() {
                $(this).prop('checked', false);

            });
        });

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
                                                                   var count_id = "<?php echo $spec; ?>";
                                                                      var notification_user = document.getElementById('notification_user_select').value;
                                                                      var notification_title = "";
                                                                      var notification_msg = document.getElementById('notification_msg').value;
                                                                                  $.ajax({
                                                                                  method: "POST",
                                                                                  url: "../../Controller/send_noti/sendnoti_controller.php",
                                                                                  data:{notification_user:notification_user,notification_title:notification_title,notification_body:notification_msg,usergroup_value:usergroup_value,count_id:count_id},
                                                                                    success:function(data){
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
