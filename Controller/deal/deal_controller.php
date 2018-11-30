                                                                                         <?php
include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/Model/deal/deal_model.php");
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
		include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/deal/viewdeal.php");
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
		include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/deal/viewdealdetail.php");
	}
	public function subcategoryfilter_deal($msg)
	{
		$display_deal=$this->deal_model->getsubcategory_filter($msg);
		$gettag = $this->deal_model->getdisplay_tag();
		$getbusiness = $this->deal_model->getdisplay_business();
		$getcategory = $this->deal_model->getdisplay_category();
		$i=0;
		foreach ($display_deal as $key => $data) {
			$i=$i+1;
			$value0=$data[0];
			$value21=$data[21];
			$str   = ''.$data[3].'';
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

    $str   = ''.$data[12].'';
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
    		$value7=$data[7];
    		$value15=$data[15];
		//generaterow($i,$value0,$value21,$html,$value7,$condition,$value15);
    		echo "<tr>
                                <td style=\"text-align:center;\">".$i."</td>
                                <td style=\"text-align:center;\">".$value0."</td>
                                <td style=\"text-align:center;\">".$value21."</td>
                                <td style=\"text-align:center;\">".$html."</td>
                                <td style=\"text-align:center;\">".$value7."</td>
                                <td style=\"text-align:center;\">".$condition."</td>
                                <td style=\"text-align:center;\"><img src='/doora/images/deal/$value15' id=\"DealPicture\"/></td>
                                <td style=\"text-align:center;\">
                                    <div>
                                   <a href=/doora/adminpanel/Controller/deal/viewdealdetail_controller.php?id=$value0 title=\"View all detail\">
                                          <i class=\"fa fa-eye\"></i>
                                        </a>
                                    </div>
                                </td>
                                 </tr>";
		}
		
	}
	public function branchfilter_deal($msg)
	{
		$display_deal=$this->deal_model->getbranch_filter($msg);
		$gettag = $this->deal_model->getdisplay_tag();
		$getbusiness = $this->deal_model->getdisplay_business();
		$getcategory = $this->deal_model->getdisplay_category();
		$i=0;
        foreach ($display_deal as $key => $data) {
            $i=$i+1;
            $value0=$data[0];
            $value21=$data[21];
            $str   = ''.$data[3].'';
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

    $str   = ''.$data[12].'';
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
            $value7=$data[7];
            $value15=$data[15];
        //generaterow($i,$value0,$value21,$html,$value7,$condition,$value15);
            echo "<tr>
                                <td style=\"text-align:center;\">".$i."</td>
                                <td style=\"text-align:center;\">".$value0."</td>
                                <td style=\"text-align:center;\">".$value21."</td>
                                <td style=\"text-align:center;\">".$html."</td>
                                <td style=\"text-align:center;\">".$value7."</td>
                                <td style=\"text-align:center;\">".$condition."</td>
                                <td style=\"text-align:center;\"><img src='/doora/images/deal/$value15' id=\"DealPicture\"/></td>
                                <td style=\"text-align:center;\">
                                    <div>
                                   <a href=/doora/adminpanel/Controller/deal/viewdealdetail_controller.php?id=$value0 title=\"View all detail\">
                                          <i class=\"fa fa-eye\"></i>
                                        </a>
                                    </div>
                                </td>
                                 </tr>";
        }
	}
	public function categoryfilter_deal($msg)
	{
		$display_deal=$this->deal_model->getcategory_filter($msg);
		$gettag = $this->deal_model->getdisplay_tag();
		$getbusiness = $this->deal_model->getdisplay_business();
		$getcategory = $this->deal_model->getdisplay_category();
		$getsubcategory=$this->deal_model->getcategorylist($msg);
		$i=0;
		foreach ($display_deal as $key => $data) {
			$i=$i+1;
			$value0=$data[0];
			$value21=$data[21];
			$str   = ''.$data[3].'';
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

    $str   = ''.$data[12].'';
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
    		$value7=$data[7];
    		$value15=$data[15];
		//generaterow($i,$value0,$value21,$html,$value7,$condition,$value15);
    		echo "<tr>
                                <td style=\"text-align:center;\">".$i."</td>
                                <td style=\"text-align:center;\">".$value0."</td>
                                <td style=\"text-align:center;\">".$value21."</td>
                                <td style=\"text-align:center;\">".$html."</td>
                                <td style=\"text-align:center;\">".$value7."</td>
                                <td style=\"text-align:center;\">".$condition."</td>
                                <td style=\"text-align:center;\"><img src='/doora/images/deal/$value15' id=\"DealPicture\"/></td>
                                <td style=\"text-align:center;\">
                                    <div>
                                   <a href=/doora/adminpanel/Controller/deal/viewdealdetail_controller.php?id=$value0 title=\"View all detail\">
                                          <i class=\"fa fa-eye\"></i>
                                        </a>
                                    </div>
                                </td>
                                 </tr>";
		}
	}
	public function tagfilter_deal($msg)
	{
		$display_deal=$this->deal_model->gettag_filter($msg);
		$gettag = $this->deal_model->getdisplay_tag();
		$getbusiness = $this->deal_model->getdisplay_business();
		$getcategory = $this->deal_model->getdisplay_category();
		$i=0;
		foreach ($display_deal as $key => $data) {
			$i=$i+1;
			$value0=$data[0];
			$value21=$data[21];
			$str   = ''.$data[3].'';
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

    $str   = ''.$data[12].'';
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
    		$value7=$data[7];
    		$value15=$data[15];
		//generaterow($i,$value0,$value21,$html,$value7,$condition,$value15);
    		echo "<tr>
                                <td style=\"text-align:center;\">".$i."</td>
                                <td style=\"text-align:center;\">".$value0."</td>
                                <td style=\"text-align:center;\">".$value21."</td>
                                <td style=\"text-align:center;\">".$html."</td>
                                <td style=\"text-align:center;\">".$value7."</td>
                                <td style=\"text-align:center;\">".$condition."</td>
                                <td style=\"text-align:center;\"><img src='/doora/images/deal/$value15' id=\"DealPicture\"/></td>
                                <td style=\"text-align:center;\">
                                    <div>
                                   <a href=/doora/adminpanel/Controller/deal/viewdealdetail_controller.php?id=$value0 title=\"View all detail\">
                                          <i class=\"fa fa-eye\"></i>
                                        </a>
                                    </div>
                                </td>
                                 </tr>";
		}
		
	}
	public function businessfilter_deal($msg)
	{
		$display_deal=$this->deal_model->getbusiness_filter($msg);
		$gettag = $this->deal_model->getdisplay_tag();
		$getbusiness = $this->deal_model->getdisplay_business();
		$getcategory = $this->deal_model->getdisplay_category();
		$getbranch=$this->deal_model->getbranchlist($msg);
		$i=0;
        foreach ($display_deal as $key => $data) {
            $i=$i+1;
            $value0=$data[0];
            $value21=$data[21];
            $str   = ''.$data[3].'';
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

    $str   = ''.$data[12].'';
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
            $value7=$data[7];
            $value15=$data[15];
        //generaterow($i,$value0,$value21,$html,$value7,$condition,$value15);
            echo "<tr>
                                <td style=\"text-align:center;\">".$i."</td>
                                <td style=\"text-align:center;\">".$value0."</td>
                                <td style=\"text-align:center;\">".$value21."</td>
                                <td style=\"text-align:center;\">".$html."</td>
                                <td style=\"text-align:center;\">".$value7."</td>
                                <td style=\"text-align:center;\">".$condition."</td>
                                <td style=\"text-align:center;\"><img src='/doora/images/deal/$value15' id=\"DealPicture\"/></td>
                                <td style=\"text-align:center;\">
                                    <div>
                                   <a href=/doora/adminpanel/Controller/deal/viewdealdetail_controller.php?id=$value0 title=\"View all detail\">
                                          <i class=\"fa fa-eye\"></i>
                                        </a>
                                    </div>
                                </td>
                                 </tr>";
        }
	}
	public function alldatafilter_deal($msg)
	{
		$display_deal=$this->deal_model->getdisplay_deal();
		$gettag = $this->deal_model->getdisplay_tag();
		$getbusiness = $this->deal_model->getdisplay_business();
		$getcategory = $this->deal_model->getdisplay_category();
		$i=0;
		foreach ($display_deal as $key => $data) {
			$i=$i+1;
			$value0=$data[0];
			$value21=$data[21];
			$str   = ''.$data[3].'';
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

    $str   = ''.$data[12].'';
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
    		$value7=$data[7];
    		$value15=$data[15];
		//generaterow($i,$value0,$value21,$html,$value7,$condition,$value15);
    		echo "<tr>
                                <td style=\"text-align:center;\">".$i."</td>
                                <td style=\"text-align:center;\">".$value0."</td>
                                <td style=\"text-align:center;\">".$value21."</td>
                                <td style=\"text-align:center;\">".$html."</td>
                                <td style=\"text-align:center;\">".$value7."</td>
                                <td style=\"text-align:center;\">".$condition."</td>
                                <td style=\"text-align:center;\"><img src='/doora/images/deal/$value15' id=\"DealPicture\"/></td>
                                <td style=\"text-align:center;\">
                                    <div>
                                   <a href=/doora/adminpanel/Controller/deal/viewdealdetail_controller.php?id=$value0 title=\"View all detail\">
                                          <i class=\"fa fa-eye\"></i>
                                        </a>
                                    </div>
                                </td>
                                 </tr>";
		}
		//include_once($_SERVER['DOCUMENT_ROOT']."/doora/adminpanel/View/deal/viewdeal.php");
	}
	public function activedatafilter_deal($msg)
	{
		$display_deal=$this->deal_model->getdisplay_activedeal($msg);
		$gettag = $this->deal_model->getdisplay_tag();
		$getbusiness = $this->deal_model->getdisplay_business();
		$getcategory = $this->deal_model->getdisplay_category();
		$i=0;
		foreach ($display_deal as $key => $data) {
			$i=$i+1;
			$value0=$data[0];
			$value21=$data[21];
			$str   = ''.$data[3].'';
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

    $str   = ''.$data[12].'';
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
    		$value7=$data[7];
    		$value15=$data[15];
		//generaterow($i,$value0,$value21,$html,$value7,$condition,$value15);
    		echo "<tr>
                                <td style=\"text-align:center;\">".$i."</td>
                                <td style=\"text-align:center;\">".$value0."</td>
                                <td style=\"text-align:center;\">".$value21."</td>
                                <td style=\"text-align:center;\">".$html."</td>
                                <td style=\"text-align:center;\">".$value7."</td>
                                <td style=\"text-align:center;\">".$condition."</td>
                                <td style=\"text-align:center;\"><img src='/doora/images/deal/$value15' id=\"DealPicture\"/></td>
                                <td style=\"text-align:center;\">
                                    <div>
                                   <a href=/doora/adminpanel/Controller/deal/viewdealdetail_controller.php?id=$value0 title=\"View all detail\">
                                          <i class=\"fa fa-eye\"></i>
                                        </a>
                                    </div>
                                </td>
                                 </tr>";
		}
	}
	public function deactivedatafilter_deal($msg)
	{
		$display_deal=$this->deal_model->getdisplay_deactivedeal($msg);
		$gettag = $this->deal_model->getdisplay_tag();
		$getbusiness = $this->deal_model->getdisplay_business();
		$getcategory = $this->deal_model->getdisplay_category();
		$i=0;
		foreach ($display_deal as $key => $data) {
			$i=$i+1;
			$value0=$data[0];
			$value21=$data[21];
			$str   = ''.$data[3].'';
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

    $str   = ''.$data[12].'';
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
    		$value7=$data[7];
    		$value15=$data[15];
		//generaterow($i,$value0,$value21,$html,$value7,$condition,$value15);
    		echo "<tr>
                                <td style=\"text-align:center;\">".$i."</td>
                                <td style=\"text-align:center;\">".$value0."</td>
                                <td style=\"text-align:center;\">".$value21."</td>
                                <td style=\"text-align:center;\">".$html."</td>
                                <td style=\"text-align:center;\">".$value7."</td>
                                <td style=\"text-align:center;\">".$condition."</td>
                                <td style=\"text-align:center;\"><img src='/doora/images/deal/$value15' id=\"DealPicture\"/></td>
                                <td style=\"text-align:center;\">
                                    <div>
                                   <a href=/doora/adminpanel/Controller/deal/viewdealdetail_controller.php?id=$value0 title=\"View all detail\">
                                          <i class=\"fa fa-eye\"></i>
                                        </a>
                                    </div>
                                </td>
                                 </tr>";
		}
	}
	public function expireddatafilter_deal($msg)
	{
		$display_deal=$this->deal_model->getdisplay_expireddeal($msg);
		$gettag = $this->deal_model->getdisplay_tag();
		$getbusiness = $this->deal_model->getdisplay_business();
		$getcategory = $this->deal_model->getdisplay_category();
		$i=0;
		foreach ($display_deal as $key => $data) {
			$i=$i+1;
			$value0=$data[0];
			$value21=$data[21];
			$str   = ''.$data[3].'';
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

    $str   = ''.$data[12].'';
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
    		$value7=$data[7];
    		$value15=$data[15];
		//generaterow($i,$value0,$value21,$html,$value7,$condition,$value15);
    		echo "<tr>
                                <td style=\"text-align:center;\">".$i."</td>
                                <td style=\"text-align:center;\">".$value0."</td>
                                <td style=\"text-align:center;\">".$value21."</td>
                                <td style=\"text-align:center;\">".$html."</td>
                                <td style=\"text-align:center;\">".$value7."</td>
                                <td style=\"text-align:center;\">".$condition."</td>
                                <td style=\"text-align:center;\"><img src='/doora/images/deal/$value15' id=\"DealPicture\"/></td>
                                <td style=\"text-align:center;\">
                                    <div>
                                   <a href=/doora/adminpanel/Controller/deal/viewdealdetail_controller.php?id=$value0 title=\"View all detail\">
                                          <i class=\"fa fa-eye\"></i>
                                        </a>
                                    </div>
                                </td>
                                 </tr>";
		}
	}
	public function purchaseddatafilter_deal($msg)
	{
		$display_deal=$this->deal_model->getdisplay_purchaseddeal($msg);
		$gettag = $this->deal_model->getdisplay_tag();
		$getbusiness = $this->deal_model->getdisplay_business();
		$getcategory = $this->deal_model->getdisplay_category();
		$i=0;
		foreach ($display_deal as $key => $data) {
			$i=$i+1;
			$value0=$data[0];
			$value21=$data[21];
			$str   = ''.$data[3].'';
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

    $str   = ''.$data[12].'';
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
    		$value7=$data[7];
    		$value15=$data[15];
		//generaterow($i,$value0,$value21,$html,$value7,$condition,$value15);
    		echo "<tr>
                                <td style=\"text-align:center;\">".$i."</td>
                                <td style=\"text-align:center;\">".$value0."</td>
                                <td style=\"text-align:center;\">".$value21."</td>
                                <td style=\"text-align:center;\">".$html."</td>
                                <td style=\"text-align:center;\">".$value7."</td>
                                <td style=\"text-align:center;\">".$condition."</td>
                                <td style=\"text-align:center;\"><img src='/doora/images/deal/$value15' id=\"DealPicture\"/></td>
                                <td style=\"text-align:center;\">
                                    <div>
                                   <a href=/doora/adminpanel/Controller/deal/viewdealdetail_controller.php?id=$value0 title=\"View all detail\">
                                          <i class=\"fa fa-eye\"></i>
                                        </a>
                                    </div>
                                </td>
                                 </tr>";
		}
	}
}
?>