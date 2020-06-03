<?php
/*
Author:VISHVESH BHAVSAR
ROLL NO:19BCE504
Class:4BCEA
*/?>
<?php
require_once 'tcpdf/tcpdf.php';
$customer_id=$_POST['customerid'];
$transaction_id=$_POST['transactionid'];
include "config.php";
$query=mysqli_query($con,"select * from customer_master where customerid=$customer_id;");
$result=mysqli_fetch_assoc($query);
$billing_address=$result['address'];
$address_line2=explode(',',$billing_address);
$query=mysqli_query($con,"select * from transaction where transaction_id=$transaction_id;");
$result=mysqli_fetch_assoc($query);
$shipping_address=$result['address'];
$datetime=$result['order_date'];
$table='<table border="1">
<tbody>
<tr style="height: 23px;">
<td style="height: 23px;" colspan="8" align="center"><img src="images/icons/icon.jpeg" width="50" height="30">Opticonnect </td>
</tr>
<tr style="height: 23px;">
<td style="height: 23px;">Order Number</td>
<td style="height: 23px;" colspan="7" align="right">#'.$transaction_id.'</td>
</tr>
<tr style="height: 63px;">
<td style="height: 63px;" >
<p>Order Date:</p>
</td>
<td colspan="7" align="right"><p>'.$datetime.'</p></td>
</tr>
<tr style="height: 23px;">
<td style="height: 23px;" colspan="8">
<p>Billing Address:</p>
<p>'.$address_line2[0].'</p>
<p>'.$address_line2[1].'</p>
</td>
</tr>
<tr style="height: 23px;">
<td style="height: 23px;" colspan="8">
<p>Shipping Address:&nbsp;</p>
<p>'.$shipping_address.'</p>
</td>
</tr>
<tr style="height: 23px;">
<td style="height: 23px;">Sr No.</td>
<td style="height: 23px;">Product Name</td>
<td style="height: 23px;">Seller Address</td>
<td style="height: 23px;">Price</td>
<td style="height: 23px;">Tax</td>
<td style="height: 23px;">Shipping Address</td>
<td style="height: 23px;">Quantity</td>
<td style="height: 23px;">Total Price</td>
</tr>';
$i=0;
$j=1;
$sum=0;
$query=mysqli_query($con,"select * from transaction where transaction_id=$transaction_id;");
while($result=mysqli_fetch_assoc($query))
{
    $tax=($result['price']*5)/100;
    $sellerid=$result['sellerid'];
    $total=($result['price']*$result['quantity'])+$tax+100;
    $sum+=$total;
    $q=mysqli_query($con,"select * from seller_master where sellerid=".$sellerid.";");
    $row=mysqli_fetch_assoc($q);
    $table.='<tr style="height: 23px;">
                 <td style="height: 23px;" align="center">'.$j.'</td>
                 <td style="height: 23px;">'.$result['productname'].'</td>
                 <td style="height: 23px;">'.$row['address'].'</td>
                 <td style="height: 23px;">'.$result['price'].'</td>
                 <td style="height: 23px;">'.$tax.'</td>
                 <td style="height: 23px;">100</td>
                 <td style="height: 23px;">'.$result['quantity'].'</td>
                 <td style="height: 23px;">'.$total.'</td>
             </tr>';
    $i++;
    $j++;
}
$table.='<tr style="height: 23px;">
<td style="height: 23px;" colspan="7">Total:</td>
<td style="height: 23px;">'.$sum.'</td>
</tr>';
$table.='</tbody>
</table>';
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetFont('times', '', 14);
$pdf->AddPage();
$pdf->SetAutoPageBreak(TRUE, 10);
$pdf->writeHTML($table);
ob_clean();
$pdf->Output('sampl.pdf');
?>