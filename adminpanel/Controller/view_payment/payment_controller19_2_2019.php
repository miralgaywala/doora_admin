<?php
include "../../Model/view_payment/payment_model.php";
class payment_controller
{
	public function __construct()
	{
		$this->payment_model=new payment_model();
	}
	public function display_payment($msg)
	{
		$business_name=$this->payment_model->getbusiness_name();
		$year = $this->payment_model->getyear();
		$display_payment=$this->payment_model->getdisplay_payment();
		include "../../View/view_payment/displaypayment.php";
		return $display_payment;
	}
	public function viewinvoice_detail($invoice_id)
	{
		$view_invoice_detail=$this->payment_model->getinvoicedetail($invoice_id);
		$view_deal_invoice_detail=$this->payment_model->getdealinvoicedetail($invoice_id);
		include "../../View/view_payment/viewpaymentinvoicedetail.php";
	}
	public function loadfilter_payment($year,$month,$business_invoice)
    {
        $display_payment=$this->payment_model->loadfilter_payment($year,$month,$business_invoice);
        $i=0;
                foreach ($display_payment as $key => $data) 
                {      
                $i=$i+1;   
                $invoice_year=$data['year'];
                $invoice_month=$data['month'];
                $invoice_month=date('M', mktime(0, 0, 0, $invoice_month, 1, 2000));
                $start_date= $data['month_start_date'];
                $start_date=date('jS M, Y', strtotime($start_date));    
                $end_date = $data['month_end_date'];
                $end_date=date('jS M, Y', strtotime($end_date));
                if($data['bill_pending'] == 0)
                {
                  $status = "Paid";
                  $style="style=\"text-align:center;\"";
                }
                else
                {
                  $status = "Due";
                  $style="style=\"color:red;text-align:center;\"";
                }
                  			echo "<tr>
                                <td style=\"text-align:center;\">".$i."</td>
                                <td style=\"text-align:center;\">".$data['business_invoice_id']."</td>
                                <td style=\"text-align:center;\">".$data['business_name']."</td>
                                <td style=\"text-align:center;\">".$invoice_month.",".$invoice_year."</td>
                                <td style=\"text-align:center;\">".$start_date."</td>
                                <td style=\"text-align:center;\">".$end_date."</td>
                                <td style=\"text-align:center;\">$ ".$data['total_amount']."</td>
                                <td ".$style.">".$status."</td>
                                <td style=\"text-align:center;\">
                                    <div>
                                        </a>
                                        <a onclick=viewpaymentdetail(".$data['business_invoice_id'].")  title=\"View all detail\" style=\"cursor: pointer;\">
                                          <i class=\"fa fa-eye\"></i>
                                        </a>
                                    </div>
                                </td>
                                 </tr>";
                         } 
		
    }
  }
?>
