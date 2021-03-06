<?php
include "../../Model/deal/deal_model.php";
if(isset($_POST['count_id']))
{
    if($_POST['count_id'] == 'request')
    {
        $id=$_POST['id'];
        $data=$_POST['value'];
        $deal_controller=new deal_controller();
        if($data == 0)
        {
            $result=$deal_controller->active_deal($id,$data);
            if($result==1)
            {
                echo "#deactive";
            }
            else
            {
                echo "#active";
            }
        }
        else
        {
             $result=$deal_controller->deactive_deal($id,$data);
             if($result==1)
            {
                echo "#active";
            }
            else
            {
                echo "#deactive";
            }
        }
        

    }
    if($_POST['count_id'] == "delete")
    {
        $id=$_POST['id'];
        $deal_controller=new deal_controller();
            $result=$deal_controller->delete_deal($id);
            if($result == 1)
            {
                echo "#delete";
            }
            else
            {
                echo "#not";
            }
    }
    if($_POST['count_id'] == "request_rdm_deal")
    {
         $id=$_POST['id'];
            $deal_controller=new deal_controller();
            $result=$deal_controller->get_rdm_deal($id);
            echo $result;
    }
    
}
class deal_controller
{
	public function __construct()
	{
		$this->deal_model=new deal_model();
	}
	public function view_deal()
	{
		$display_deal=$this->deal_model->getdisplay_deal();
		$gettag = $this->deal_model->getdisplay_tag();
		$getbusiness = $this->deal_model->getdisplay_business();
		$getcategory = $this->deal_model->getdisplay_category();
        include "../../View/deal/viewdeal.php";
	
	}
	public function viewdetail_deal($id)
	{
		$display_dealdetail=$this->deal_model->getdisplaydetail_deal($id);
		$deal_tag=$this->deal_model->getdealtag($id);
		$deal_cat=$this->deal_model->getdealcat($id);
		$deal_category=$this->deal_model->getdealcategory($id);
		$deal_rdm=$this->deal_model->getdealreedeam($id);
		$deal_purchased=$this->deal_model->getdealpurchased($id);
		$instore_rdm = $this->deal_model->gettotalrdminstore($id);
		$instore_pur= $this->deal_model->gettotalpurinstore($id);
		$isonline_pur= $this->deal_model->gettotalonlinepur($id);
        include "../../View/deal/viewdealdetail.php";
		
	}
    public function get_rdm_deal($id)
    {
        $deal_rdm=$this->deal_model->getdealreedeamalert($id);
       if($deal_rdm == 0){
                      echo "0";
                  } else {
                    foreach ($deal_rdm as $rdm) {               
                    echo $rdm['total_count'];
            }
         }
    }
    public function subcategory_deal($id)
    {
        $sub_category=$this->deal_model->getsubcategorylist($id);
        //print_r($sub_category);
        $retval="<option value='0'>All Sub-category</option>";
       
        foreach ($sub_category as $key => $data) {
        $retval=$retval."<option value='".$data['sub_category_id']."'>".$data['sub_category_name']."</option>";
        }
        echo $retval;
    }
    public function branch_deal($id)
    {
        $branch=$this->deal_model->getbranchlist($id);
        //print_r($branch);
        $retval="<option value='0'>All Business Branch</option>";
       
        foreach ($branch as $key => $data) {
        $retval=$retval."<option value='".$data['franchise_id']."'>".$data['franchise_address']."</option>";
        }
        echo $retval;
    }
    public function active_deal($id,$data)
    {
        $result=$this->deal_model->active_deal($id,$data);
        return $result;
    }
    public function deactive_deal($id,$data)
    {
        $result=$this->deal_model->deactive_deal($id,$data);
        return $result;
    }
    public function delete_deal($id)
    {
        $result=$this->deal_model->delete_deal($id);
        return $result;
    }
	public function alldatafilter_deal($msg)
	{
		$display_deal=$this->deal_model->getdisplay_deal();
		
		$i=0;
		foreach ($display_deal as $key => $data) {
			$i=$i+1;
			$value0=$data['business_deal_id'];
			$value21=$data['franchise_address'];
			$str   = ''.$data['deal_title'].'';
    $regex = '/\\\u([dD][89abAB][\da-fA-F]{2})\\\u([dD][c-fC-F][\da-fA-F]{2})
          |\\\u([\da-fA-F]{4})/sx';
    $html= preg_replace_callback($regex, function($matches) {

        if (isset($matches[3])) {
            $cp = hexdec($matches[3]);
        } else {
            $lead  = hexdec($matches[1]);
            $trail = hexdec($matches[2]);

            // http://unicode.org/faq/utf_bom.html#utf16-4uii$lead = hexdec(matches[3]);$trail = hexdec($matches[1]);$cp = hexdec($matches[2])
            //$display_deal = '<div id='result'></div>'; echo $json
            $cp = ($lead << 10) + $trail + 0x10000 - (0xD800 << 10) - 0xDC00;
        }
        // https://tools.ietf.org/html/rfc3629#section-3
        // Characters between U+D800 and U+DFFF are not allowed in UTF-8  
        if ($cp > 0xD7FF && 0xE000 > $cp) {
            $cp = 0xFFFD;
        }

        // https://github.com/php/php-src/blob/php-5.6.4/ext/standard/html.c#L471
        // php_utf32_utf8(unsigned char *buf, unsigned unsigned k)

        if ($cp < 0x80) {
            return chr($cp);
        } else if ($cp < 0xA0) {
            return chr(0xC0 | $cp >> 6) . chr(0x80 | $cp & 0x3F);
        }

        return html_entity_decode('&#' . $cp . ';');
    }, $str);

    $str   = ''.$data['terms_and_condition'].'';
    $regex = '/\\\u([dD][89abAB][\da-fA-F]{2})\\\u([dD][c-fC-F][\da-fA-F]{2})
          |\\\u([\da-fA-F]{4})/sx';
    $condition= preg_replace_callback($regex, function($matches) {

        if (isset($matches[3])) {
            $cp = hexdec($matches[3]);
        } else {
            $lead  = hexdec($matches[1]);
            $trail = hexdec($matches[2]);

            // http://unicode.org/faq/utf_bom.html#utf16-4
            $cp = ($lead << 10) + $trail + 0x10000 - (0xD800 << 10) - 0xDC00;
        }
        // https://tools.ietf.org/html/rfc3629#section-3
        // Characters between U+D800 and U+DFFF are not allowed in UTF-8
        if ($cp > 0xD7FF && 0xE000 > $cp) {
            $cp = 0xFFFD;
        }

        // https://github.com/php/php-src/blob/php-5.6.4/ext/standard/html.c#L471
        // php_utf32_utf8(unsigned char *buf, unsigned k)

        if ($cp < 0x80) {
            return chr($cp);
        } else if ($cp < 0xA0) {
            return chr(0xC0 | $cp >> 6) . chr(0x80 | $cp & 0x3F);
        }

        return html_entity_decode('&#' . $cp . ';');
    }, $str);
    		$value7=$data['promocode'];
    		$value15=$data['deal_photo'];
            
            if($data['deal_photo'] == NULL)
                 {
                  $value15 = "default.png";
                 }
                else if(file_exists("../../../images/deal/".$data['deal_photo'])) {
                  $value15 = $data['deal_photo'];
                 }
                 else
                 {
                  $value15= "default.png";
                 }  
                 $html = nl2br($html);
                         $condition = nl2br($condition);      
                         if($data['is_active'] == 1)
                         {
                            $active_value = "<br/>
                                                <a onclick=deactivatedeal(".$data['business_deal_id'].",".$data['is_active'].") title=\"Active/Deactive\" style=\"cursor:pointer;\">
                                                  Deactive
                                                </a>";
                         }
                         else
                         {
                                $active_value = "<br/>
                                                <a onclick=activatedeal(".$data['business_deal_id'].",".$data['is_active'].") title=\"Active/Deactive\" style=\"cursor:pointer;\">
                                                  Active
                                                </a>";
                         }
		//generaterow($i,$value0,$value21,$html,$value7,$condition,$value15);
    		echo "<tr>
                                        <td style=\"text-align:center;\">".$i."</td>
                                        <td style=\"text-align:center;\">".$value0."</td>
                                        <td style=\"text-align:center;\">".$value21."</td>
                                        <td style=\"text-align:center;\">".$html."</td>
                                        <td style=\"text-align:center;\">".$value7."</td>
                                        <td style=\"text-align:center;\">".$condition."</td>
                                        <td style=\"text-align:center;\"><img src='../../../images/deal/$value15' id=\"DealPicture\" style=\"object-fit:contain;\"/></td>
                                        <td style=\"text-align:center;\">
                                            <div>
                                           <a onclick=viewdeal(".$data['business_deal_id'].") title=\"View all detail\" style=\"cursor:pointer;\">
                                                  <i class=\"fa fa-eye\"></i>
                                                </a>
                                                <a onclick=deletedeal(".$data['business_deal_id'].") title=\"View all detail\" style=\"cursor:pointer;\">
                                                  <i class=\"fa fa-trash-o fa-fw\"></i>
                                                </a>
                                                ".$active_value."
                                                
                                            </div>
                                        </td>
                                         </tr>";
		}
		//include_once($_SERVER['DOCUMENT_ROOT']."/sprookr/adminpanel/View/deal/viewdeal.php");
	}
            public function loadfilter_deal($business_id,$branch,$tag,$sub_category,$category,$radio)
            {
                $display_deal=$this->deal_model->loadfilter_deal($business_id,$branch,$tag,$sub_category,$category,$radio);

                $i=0;
                foreach ($display_deal as $key => $data) {
                    $i=$i+1;
                    $value0=$data['business_deal_id'];
                    $value21=$data['franchise_address'];
                    $str   = ''.$data['deal_title'].'';
            $regex = '/\\\u([dD][89abAB][\da-fA-F]{2})\\\u([dD][c-fC-F][\da-fA-F]{2})
                  |\\\u([\da-fA-F]{4})/sx';
            $html= preg_replace_callback($regex, function($matches) {

                if (isset($matches[3])) {
                    $cp = hexdec($matches[3]);
                } else {
                    $lead  = hexdec($matches[1]);
                    $trail = hexdec($matches[2]);

                    // http://unicode.org/faq/utf_bom.html#utf16-4uii$lead = hexdec(matches[3]);$trail = hexdec($matches[1]);$cp = hexdec($matches[2])
                    //$display_deal = '<div id='result'></div>'; echo $json
                    $cp = ($lead << 10) + $trail + 0x10000 - (0xD800 << 10) - 0xDC00;
                }
                // https://tools.ietf.org/html/rfc3629#section-3
                // Characters between U+D800 and U+DFFF are not allowed in UTF-8  
                if ($cp > 0xD7FF && 0xE000 > $cp) {
                    $cp = 0xFFFD;
                }

                // https://github.com/php/php-src/blob/php-5.6.4/ext/standard/html.c#L471
                // php_utf32_utf8(unsigned char *buf, unsigned unsigned k)

                if ($cp < 0x80) {
                    return chr($cp);
                } else if ($cp < 0xA0) {
                    return chr(0xC0 | $cp >> 6) . chr(0x80 | $cp & 0x3F);
                }

                return html_entity_decode('&#' . $cp . ';');
            }, $str);

            $str   = ''.$data['terms_and_condition'].'';
            $regex = '/\\\u([dD][89abAB][\da-fA-F]{2})\\\u([dD][c-fC-F][\da-fA-F]{2})
                  |\\\u([\da-fA-F]{4})/sx';
            $condition= preg_replace_callback($regex, function($matches) {

                if (isset($matches[3])) {
                    $cp = hexdec($matches[3]);
                } else {
                    $lead  = hexdec($matches[1]);
                    $trail = hexdec($matches[2]);

                    // http://unicode.org/faq/utf_bom.html#utf16-4
                    $cp = ($lead << 10) + $trail + 0x10000 - (0xD800 << 10) - 0xDC00;
                }
                // https://tools.ietf.org/html/rfc3629#section-3
                // Characters between U+D800 and U+DFFF are not allowed in UTF-8
                if ($cp > 0xD7FF && 0xE000 > $cp) {
                    $cp = 0xFFFD;
                }

                // https://github.com/php/php-src/blob/php-5.6.4/ext/standard/html.c#L471
                // php_utf32_utf8(unsigned char *buf, unsigned k)

                if ($cp < 0x80) {
                    return chr($cp);
                } else if ($cp < 0xA0) {
                    return chr(0xC0 | $cp >> 6) . chr(0x80 | $cp & 0x3F);
                }

                return html_entity_decode('&#' . $cp . ';');
            }, $str);
                    $value7=$data['promocode'];
                    $value15=$data['deal_photo'];
                    if($data['deal_photo'] == NULL)
                         {
                          $value15 = "default.png";
                         }
                        else if(file_exists("../../../images/deal/".$data['deal_photo'])) {
                          $value15 = $data['deal_photo'];
                         }
                         else
                         {
                          $value15= "default.png";
                         }    
                         $html = nl2br($html);
                         $condition = nl2br($condition);
                         if($data['is_active'] == 1)
                         {
                            $active_value = "<br/>
                                                <a onclick=deactivatedeal(".$data['business_deal_id'].",".$data['is_active'].") title=\"Active/Deactive\" style=\"cursor:pointer;\">
                                                  Deactive
                                                </a>";
                         }
                         else
                         {
                                $active_value = "<br/>
                                                <a onclick=activatedeal(".$data['business_deal_id'].",".$data['is_active'].") title=\"Active/Deactive\" style=\"cursor:pointer;\">
                                                  Active
                                                </a>";
                         }
                //generaterow($i,$value0,$value21,$html,$value7,$condition,$value15);
                    echo "<tr>
                                        <td style=\"text-align:center;\">".$i."</td>
                                        <td style=\"text-align:center;\">".$value0."</td>
                                        <td style=\"text-align:center;\">".$value21."</td>
                                        <td style=\"text-align:center;word-wrap:break-word;\">".$html."</td>
                                        <td style=\"text-align:center;\">".$value7."</td>
                                        <td style=\"text-align:center;word-wrap:break-word;\">".$condition."</td>
                                        <td style=\"text-align:center;\"><img src='../../../images/deal/$value15' id=\"DealPicture\" style=\"object-fit:contain;\"/></td>
                                        <td style=\"text-align:center;\">
                                            <div>
                                           <a onclick=viewdeal(".$data['business_deal_id'].") title=\"View all detail\" style=\"cursor:pointer;\">
                                                  <i class=\"fa fa-eye\"></i>
                                                </a>
                                                <a onclick=deletedeal(".$data['business_deal_id'].") title=\"View all detail\" style=\"cursor:pointer;\">
                                                  <i class=\"fa fa-trash-o fa-fw\"></i>
                                                </a>
                                                 ".$active_value."
                                                 
                                            </div>
                                        </td>
                                         </tr>";
                }
            }
}
?>