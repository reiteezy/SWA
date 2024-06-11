<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Print PER</title>
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css"> -->
    <link href='https://fonts.googleapis.com/css?family=Bree Serif' rel='stylesheet'>
    <style>
    body {
        font-family: 'roboto';
        margin: 0;
        /* Remove default body margin */
        padding: 0;
        /* Remove default body padding */
        font-size: 13px;
    }

    .header {
        margin-top: 20px;
        /* Adjust top margin for the header */
    }

    table.td {
        /* font-family: 'Roboto Mono', monospace; */
    }

    img {
        width: 200px;
        margin-bottom: 10px;
        margin-top: 2px;
        /* Adjust bottom margin for the image */
    }

    h2 {
        margin: 10px 0;
        font-size: 18px;
    }

    h3 {
        margin: 10px 0;
        font-size: 17px;
    }

    label {
        display: inline-block;
        margin-bottom: 5px;
        /* Adjust bottom margin for labels */
    }

    .space {
        margin-bottom: 20px;
        /* Adjust the margin as needed */
    }

    .title {
        position: absolute;
        top: 50px;
        left: 100px;
        width: 200px;
        height: 1px;
    }

    span.remarks {
        float: right;
    }
    </style>
</head>

<body>
    <table style="width: 100%">
        <tr>
            <td style="width: 35%">
                <img src="<?php echo base_url('assets/backend/img/logo/alturas.png');?>" style="width: 186px;">
            </td>
            <td style="text-align: left; font-size: 16px; font-weight: bold;">
                <span class="title">PROMO EXECUTION REPORT</span>
            </td>
        </tr>
    </table>
    <table style="width: 100%;">
        <tr>
            <td style="width: 70%; font-weight: bold;">Name of Implementing Subsidiary / Business Unit :</td>
            <td style="text-align: right; font-weight: bold;">Series No.:</td>
            <td style="border-bottom: 1px solid black; width: 12%;"><?php echo $data['PER_ID'];?></td>
        </tr>
        <tr>
            <td style="border-bottom: 1px solid black; font-weight: bold; font-family: 'couriernew'; text-align: center;"><?php echo strtoupper($data['SUB_DESCRIPT']);?></td>
            <td style="text-align: right; font-weight: bold;">Date :</td>
            <td style="border-bottom: 1px solid black"><?php echo date("m/d/Y", strtotime($data['DOCUMENT_DATE']));?></td>
        </tr>
    </table>
    <table style="width: 100%">
        <tr>
            <td style="width: 17%; font-weight: bold;">Promo Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
            <td style="border-bottom: 1px solid black; width: 53%; font-weight: bold; font-family: 'couriernew';"><?php echo strtoupper($data['PER_PROMO_TITLE']);?></td>
            <td style="text-align: right; font-weight: bold;">SWA Series No.:</td>
            <td style="border-bottom: 1px solid black; width: 12%;"><?php echo $data['SWA_ID'];?></td>
        </tr>
        <tr>
            <td style="font-weight: bold;">Mechanics &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
            <td style="border-bottom: 1px solid black; font-weight: bold; font-family: 'couriernew';"><?php echo strtoupper($data['PER_MECHANICS']);?></td>
            <td style="text-align: right; font-weight: bold;">MIS Ref. NO. 1 :</td>
            <td style="border-bottom: 1px solid black"><?php echo $data['PER_MISREF_NO1'];?></td>
        </tr>
        <tr>
            <td style=" font-weight: bold;">Promo Period &nbsp;&nbsp;&nbsp;:</td>
            <td style="border-bottom: 1px solid black; font-weight: bold; font-family: 'couriernew';"><?php $startDate = DateTime::createFromFormat('Y-m-d', $data['PROMO_START']);
    if ($startDate !== false && !array_sum($startDate->getLastErrors())) {
        $formattedDate = $startDate->format('m/d/Y');
        echo $formattedDate;
    } else {
        echo '';
    }?> - <?php $endDate = DateTime::createFromFormat('Y-m-d', $data['PROMO_END']);
    if ($endDate !== false && !array_sum($endDate->getLastErrors())) {
        $formattedDate = $endDate->format('m/d/Y');
        echo $formattedDate;
    } else {
        echo '';
    }?></td>
            <td style="text-align: right; font-weight: bold;">2 :</td>
            <td style="border-bottom: 1px solid black"><?php echo $data['PER_MISREF_NO2'];?></td>
        </tr>
        <tr>
            <td style=" font-weight: bold;">Promo Sponsor :</td>
            <td style="border-bottom: 1px solid black; font-weight: bold; font-family: 'couriernew';"><?php echo $data['PER_SPONSOR_NAME'];?></td>
            <td style="text-align: right; font-weight: bold;">3 :</td>
            <td style="border-bottom: 1px solid black"><?php echo $data['PER_MISREF_NO3'];?></td>
        </tr>
    </table>
    <table
        style="width: 100%; border-collapse: collapse; margin-left: -15px; margin-top: 10px; font-size: 12px; margin-left: 3px;">
        <thead style="font-weight: bold; text-align: center;">
            <tr>
                <th colspan="3"></th>
                <th style="border: 1px solid black; border-bottom: none;"></th>
                <th style="border: 1px solid black; border-left: none; border-bottom: none; width: 14%; text-align: center;">Declaration of
                </th>
            </tr>
            <tr>
                <th colspan="3"></th>
                <th style="border-left: 1px solid black;">Actual</th>
                <th
                    style="border-left: 1px solid black; border-right: 1px solid black; width: 14%; text-align: center;">
                    Un-used</th>
            </tr>
            <tr>
                <th colspan="3" style="border-bottom: 1px solid black;text-align: left; padding: none;">
                    &nbsp;Allocation of Free Goods, POPs, Collaterals, others'</th>
                <th
                    style="border: 1px solid black; width: 14%; text-align: center;  border-top: none; border-bottom: none;">
                    Execution</th>
                <th
                    style="border: 1px solid black; border-top: none; border-bottom: none; border-left: none; width: 14%; text-align: center;">
                    Allocation</th>
            </tr>
            <tr>
                <th style="border: 1px solid black; width: 14%; text-align: center;">Quantity</th>
                <th style="border: 1px solid black; width: 7%; text-align: center;">Unit</th>
                <th style="border: 1px solid black; width: 45%; text-align: center;">Item Description</th>
                <th style="border: 1px solid black; border-top: none;  width: 14%; text-align: center;">Quantity</th>
                <th style="border: 1px solid black; border-top: none; border-left: none; width: 14%; text-align: center;">Quantity</th>
            </tr>
        </thead>
         <tbody id="tbody">
            <?php 
                $count = 0;
               $this->db->select('per_details_tbl.*');
               $this->db->from('per_details_tbl');
               $this->db->where('per_details_tbl.PER_ID', $data['PER_ID']);
                $datas = $this->db->get()->result_array();
                foreach ($datas as $row): 
            ?>
            <tr>

                <td
                    style="text-align: right; border: 1px solid black; border-bottom: 0; border-left: 1px solid black; border-top: 0; padding: 5px; padding-top: 2px; padding-bottom: 0px; height: 15px; font-family: 'couriernew';">
                    <?php echo number_format($row['PER_QUANTITY'], 2);?>
                </td>
                <td
                    style="text-align: left; border: 1px solid black; border-bottom: 0; border-top: 0; border-right: 0; padding: 5px; padding-top: 2px; padding-bottom: 0px; height: 15px;  font-family: 'couriernew';">
                    <?php echo (strtoupper($row['PER_UNIT']));?>
                </td>
                <td
                    style="text-align: left; border: 1px solid black; border-bottom: 0; border-top: 0; padding: 5px; padding-top: 2px; padding-bottom: 0px; height: 15px; font-family: 'couriernew';">
                    <?php echo (strtoupper($row['PER_ITEM_DESCRIPTION']));?>
                </td>
                <td
                    style="text-align: right; border: 1px solid black; border-bottom: 0; border-top: 0; padding: 5px; padding-top: 2px; padding-bottom: 0px; height: 15px; font-family: 'couriernew';">
                    <?php echo  number_format($row['PER_ACTUAL_EXECUTE_QTY'], 2);?>
                </td>
                <td
                    style="text-align: right; border: 1px solid black; border-bottom: 0; border-right: 1px solid black; border-top: 0; border-left: 0; padding: 5px; padding-bottom: 0px; padding-top: 2px; height: 15px; font-family: 'couriernew';">
                    <?php echo number_format($row['PER_UNUSED_ALLOCATION'], 2);?>
                </td>
            </tr>
            <?php echo $count++; ?>
            <?php  endforeach; ?>
            <?php 
              $remainingRows = 12 - $count;
              for ($addrow = 0; $addrow < $remainingRows; $addrow++) { ?>
            <tr>
                <td
                    style="text-align: right; border: 1px solid black; border-bottom: 0; border-left: 1px solid black; border-top: 0; padding: 1px; padding-top: 2px; height: 15px; font-family: 'couriernew';">
                </td>
                <td
                    style="text-align: left; border: 1px solid black; border-bottom: 0; border-top: 0;  border-right: 0; padding: 1px; padding-top: 2px; height: 15px; font-family: 'couriernew';">
                </td>
                <td
                    style="text-align: left; border: 1px solid black; border-bottom: 0; border-top: 0; padding: 1px; padding-top: 2px; height: 15px; font-family: 'couriernew';">
                </td>
                <td
                    style="text-align: right; border: 1px solid black; border-bottom: 0; border-top: 0; padding: 1px; padding-top: 2px; height: 15px; font-family: 'couriernew';">
                </td>
                <td
                    style="text-align: right; border: 1px solid black; border-bottom: 0; border-right: 1px solid black; border-top: 0; border-left: 0; padding: 1px; padding-top: 2px; height: 15px; font-family: 'couriernew';">
                </td>
            </tr>
            <?php  } ?>
            <tr>
                <td
                    style="text-align: right; border: 1px solid black; border-left: 1px solid black; border-top: 0; padding: 1px; height: 15px;">
                </td>
                <td style="text-align: left; border: 1px solid black; border-top: 0;  border-right: 0; padding: 1px; height: 15px;"></td>
                <td style="text-align: center; border: 1px solid black; border-top: 0; padding: 1px; height: 15px;">
                </td>
                <td style="text-align: right; border: 1px solid black; border-top: 0; padding: 1px; height: 15px;"></td>
                <td
                    style="text-align: right; border: 1px solid black; border-right: 1px solid black; border-left: 0; border-top: 0; padding: 1px; height: 15px;">
                </td>
            </tr>   

        </tbody>
    </table>
    <div style="margin-left: 5px;">
        <table style="width: 100%; margin-top: 4px;">
            <tr>
                <td style="width: 50%; font-weight: bold;">*Promo Execution Summary</td>
                <td style="text-align: left; font-weight: bold;">*Post Promo Remarks</td>
            </tr>
        </table>
        <textarea name="text" id="text" style="width: 49%; height: 100px;">&nbsp;<?php echo strtoupper($data['PER_SUMMARY']);?></textarea>
        <textarea name="text" id="text" style="width: 49%; height: 100px;">&nbsp;<?php echo strtoupper($data['PER_REMARK']);?></textarea>
    </div>
<table style="width: 100%; margin-top: 4px;">
    <tr>
        <td style="width: 55%; font-weight: bold;">Submitted by:</td>
        <td style="font-weight: bold;">Audited by:</td>
    </tr>
    <tr>
        <td><i>(Promo Coordinating Supervisor)</i></td>
        <td><i>(Subsidiary IAD)</i></td>
    </tr>
</table>
<table style="width: 100%; margin-top: 5px;">
    <tr>
        <td style="width: 45%; border-bottom: 1px solid black; height: 15px;"></td>
        <td></td>
        <td style="text-align: right; width: 45%; border-bottom: 1px solid black; height: 15px;"></td>
    </tr>
</table>
<table style="width: 100%;">
<tr>
    <td stlye="width: 5%; text-align: left;"><b>Name:</b></td>
    <td style="width: 38%; text-align: center;"><?php echo strtoupper($data['PER_SUBMIT_BY']);?></td>
    <td style="width: 10%;;"></td>
    <td stlye="width: 5%; text-align: left;"><b>Name:</b></td>
    <td style="width: 38%; text-align: center;"><?php echo strtoupper($data['PER_AUDIT_BY']);?></td>
</tr>
<tr>
    <td stlye="width: 5%; text-align: left;"><b>Date:</b></td>
    <td style="width: 38%; text-align: left;">    <?php $dateTime = DateTime::createFromFormat('Y-m-d', $data['PER_SUBMIT_BY_DATE']);
    if ($dateTime !== false && !array_sum($dateTime->getLastErrors())) {
        $formattedDate = $dateTime->format('m/d/Y');
        echo $formattedDate;
    } else {
        echo '&nbsp;/ /';
    }?></td>
    <td style="width: 10%;;"></td>
    <td stlye="width: 5%; text-align: left;"><b>Date:</b></td>
    <td style="width: 38%; text-align: left;">    <?php $dateTime = DateTime::createFromFormat('Y-m-d', $data['PER_AUDIT_BY_DATE']);
    if ($dateTime !== false && !array_sum($dateTime->getLastErrors())) {
        $formattedDate = $dateTime->format('m/d/Y');
        echo $formattedDate;
    } else {
        echo '&nbsp;/ /';
    }?></td>
</tr>
</table>
<table style="width: 100%; margin-top: 5px;">
    <tr>
        <td style="width: 55%; font-weight: bold;">Reviewed by:</td>
        <td style="font-weight: bold;">Noted by:</td> 
    </tr>
    <tr>
        <td><i>(Sr. Supervisor/Subsidiary Manager)</i></td>
        <td><i>(GGM/CMG)</i></td>
    </tr>
</table>
<table style="width: 100%; margin-top: 5px;">
    <tr>
        <td style="width: 45%; border-bottom: 1px solid black; height: 15px;"></td>
        <td></td>
        <td style="text-align: right; width: 45%; border-bottom: 1px solid black; height: 15px;"></td>
    </tr>
</table>
<table style="width: 100%;">
<tr>
    <td stlye="width: 5%; text-align: left; font-weight: bold;"><b>Name:</b></td>
    <td style="width: 38%; text-align: center;"><?php echo strtoupper($data['PER_REVIEW_BY']);?></td>
    <td style="width: 10%;;"></td>
    <td stlye="width: 5%; text-align: left;"><b>Name:</b></td>
    <td style="width: 38%; text-align: center;"><?php echo strtoupper($data['PER_NOTE_BY']);?></td>
</tr>
<tr>
    <td stlye="width: 5%; text-align: left;"><b>Date:</b></td>
    <td style="width: 38%; text-align: left;">    <?php $dateTime = DateTime::createFromFormat('Y-m-d', $data['PER_REVIEW_BY_DATE']);
    if ($dateTime !== false && !array_sum($dateTime->getLastErrors())) {
        $formattedDate = $dateTime->format('m/d/Y');
        echo $formattedDate;
    } else {
        echo '&nbsp;/ /';
    }?></td>
    <td style="width: 10%;;"></td>
    <td stlye="width: 5%; text-align: left;"><b>Date:</b></td>
    <td style="width: 38%; text-align: left;">    <?php $dateTime = DateTime::createFromFormat('Y-m-d', $data['PER_NOTE_BY_DATE']);
    if ($dateTime !== false && !array_sum($dateTime->getLastErrors())) {
        $formattedDate = $dateTime->format('m/d/Y');
        echo $formattedDate;
    } else {
        echo '&nbsp;/ /';
    }?></td>
</tr>
</table>
<br>
&nbsp;<span style="font-weight: bold;">Note:</span> This Promo Execution Report should be accomplished and signed three days after end of promo period.
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Attach required reports/exhibits.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*Attach separate sheets if allocated space is not enough

<table style="width: 100%; font-size: 10px; margin-top: 10px; font-weight: bold;">
    <tr>
        <td style="20%; text-align: left; font-style: italic;">Distribution of copies:</td>
        <td style="30%; text-align: left; font-style: italic;">Original - GGM/CMG</td>
        <td style="30%; text-align: center; font-style: italic;">Duplicate - Subsidary Manager</td>
        <td style="20%; text-align: right; font-style: italic;">Triplicate - Subsdiary IAD</td>
    </tr>
</table>

</body>
</html>