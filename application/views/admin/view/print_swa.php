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
    <title>Print SWA</title>
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css"> -->
    <style>
      body {
        font-family: 'roboto';
        margin: 0;
        /* Remove default body margin */
        padding: 0;
        font-size: 14px;
        /* Remove default body padding */
        /* font-family: 'dejavuserif'; */
      }
      .header {
        margin-top: 20px;
        /* Adjust top margin for the header */
      }
      /* .td-data {
        font-family: 'couriernew' !important;
    } */
      img {
        width: 200px;
        margin-bottom: 10px;
        margin-top: 2px;
        /* Adjust bottom margin for the image */
      }
      h2 {
        margin: 10px 0;
        font-size: 20px;
      }
      h3 {
        margin: 10px 0;
        font-size: 16px;
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
    </style>
  </head>
  <body>
    <div style="text-align: center;">
      <img src="<?php echo base_url('assets/assets/images/alturas.png');?>" style="width: 200px;">
    </div>
    <div style="text-align: center; margin-bottom: -20px; margin-top: -20px;">
      <h2>Grocery Group Management (GGM)</h2>
    </div>
    <div style="text-align: center;">
      <p style="font-size: 11px;">Tel. No.: 501-3000 loc.#1421/1422/1431</p>
    </div>
    <div style="text-align: center; margin-top: -15px;">
      <h3>STOCK WITHDRAWAL ADVICE FORM (SWAF)</h3>
    </div>
    <table style="margin-left: -18px; margin-top: -5px; font-size: 13px; width: 100%">
      <tr style="margin-bottom: -5px;">
        <td style="font-weight: bold; width: 7%;">From :</td>
        <td style="width: 3.5%; text-align: left;"><input type="checkbox" style="font-size: 1.8rem;" <?php echo ($data['LOCATION'] == 'GDC') ? 'checked="checked"' : ''; ?>></td>
        <td style="width: 7%; text-align: left; font-size: 14px;">GDC</td>
        <td style="width: 3.5%; text-align: left;"><input type="checkbox" style="font-size: 1.8rem;" <?php echo ($data['LOCATION'] == 'LDI/DSG') ? 'checked="checked"' : ''; ?>></td>
        <td style="width: 10%; text-align: left; font-size: 14px;">LDI/DSG</td>
        <td style="width: 3.5%; text-align: left;"><input type="checkbox" style="font-size: 1.8rem;" <?php echo ((!in_array($data['LOCATION'], ['LDI/DSG','GDC','WDG','STORE'])) && (!empty($data['LOCATION']))) ? 'checked="checked"' : ''; ?>>
        </td>
        <td style="width: 14%; text-align: left; font-size: 13px;">Others, specify</td>
        <td style="border-bottom: 1px solid black; width: 28%; text-align: left; padding: 0px;">&nbsp;
          <?php echo (!in_array($data['LOCATION'], ['LDI/DSG','GDC','WDG','STORE'])) ? (strtoupper($data['LOCATION'])) : ''; ?>
        </td>
        <td style="text-align: right; font-weight: bold; width: 11%; ">&nbsp;Series No.:</td>
        <td style="border-bottom: 1px solid black; width 3%; text-align: right;"><?php echo $data['SWA_ID']; ?></td>
      </tr>
    </table>
    <table style="margin-left: -18px; font-size: 13px; width: 100%">
      <tr>
        <td style="width: 7%;"></td>
        <td style="width: 3.5%; text-align: left;"><input type="checkbox" style="font-size: 1.8rem;" <?php echo ($data['LOCATION'] == 'WDG') ? 'checked="checked"' : ''; ?>></td>
        <td style="width: 7%; text-align: left; font-size: 14px;">WDG</td>
        <td style="width: 3.5%; text-align: left;"><input type="checkbox" style="font-size: 1.8rem;" <?php echo ($data['LOCATION'] == 'STORE') ? 'checked="checked"' : ''; ?>></td>
        <td style="width: 14%; text-align: left; font-size: 14px;">STORE</td>
        <td style="text-align: right;">&nbsp;&nbsp;<span style="font-weight: bold;">Date: </td>
            <td style="border-bottom: 1px solid; width: 12%; text-align: right;">
                <?php
if (!empty($data['DOCUMENT_DATE'])) {
    // var_dump($data['DOCUMENT_DATE']);
    $dateTime = DateTime::createFromFormat('Y-m-d', $data['DOCUMENT_DATE']);
    if ($dateTime !== false && !array_sum($dateTime->getLastErrors())) {
        $formattedDate = $dateTime->format('m/d/Y');
        echo $formattedDate;
    } else {
        echo '';
    }
} else {
    echo '';
}
?>
            </td>
        </tr>
    </table>
    <table style="margin-left: -18px; font-size: 13px; width: 75%;">
        <tr>
            <td style="font-weight: bold; width: 10%">To &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; </td>
            <td class="td-data"
                style="border-bottom: 1px solid black; font-family: 'couriernew'; font-weight: bold; font-size: 14px;">
                <?php echo (strtoupper($data['DESCRIPTION']));?></td>
        </tr>
    </table>
    <table style="width: 100%; border-collapse: collapse; margin-left: -15px;   font-size: 12px;">
        <thead style="font-weight: bold; text-align: center;">
            <tr>
                <th style="width: 12%; border: 1px solid black; border-left: 0; padding: 5px; font-size: 13px;">QUANTITY
                </th>
                <th style="width: 8%; border: 1px solid black; padding: 5px; font-size: 13px;">UNIT</th>
                <th style="width: 45%; border: 1px solid black; padding: 5px;  font-size: 13px;">DESCRIPTION</th>
                <th style="width: 15%; border: 1px solid black; padding: 5px;  font-size: 13px;">COST PER UNIT</th>
                <th style="width: 15%; border: 1px solid black; border-right: 0; padding: 5px;  font-size: 13px;">AMOUNT
                </th>
            </tr>
        </thead>
        <tbody id="tbody">
            <?php 
                $count = 0;
               $this->db->select('swa_details_tbl.*');
               $this->db->from('swa_details_tbl');
               $this->db->where('swa_details_tbl.SWA_ID', $data['SWA_ID']);
                $datas = $this->db->get()->result_array();
                foreach ($datas as $row): 
            ?>
            <tr>
                <td
                    style="text-align: right; border: 1px solid black; border-bottom: 0; border-left: 0; border-top: 0; padding: 5px; padding-top: 2px; padding-bottom: 0px; height: 15px; font-family: 'couriernew';">
                    <?php echo number_format($row['SWA_QUANTITY'], 2);?>
                </td>
                <td
                    style="text-align: left; border: 1px solid black; border-bottom: 0; border-top: 0; padding: 5px; padding-top: 2px; padding-bottom: 0px; height: 15px;  font-family: 'couriernew';">
                    <?php echo (strtoupper($row['SWA_UNIT']));?>
                </td>
                <td
                    style="text-align: left; border: 1px solid black; border-bottom: 0; border-top: 0; padding: 5px; padding-top: 2px; padding-bottom: 0px; height: 15px; font-family: 'couriernew';">
                    <?php echo (strtoupper($row['SWA_DESCRIPTION']));?>
                </td>
                <td
                    style="text-align: right; border: 1px solid black; border-bottom: 0; border-top: 0; padding: 5px; padding-top: 2px; padding-bottom: 0px; height: 15px; font-family: 'couriernew';">
                    <?php echo  number_format($row['SWA_UNIT_COST'], 2);?>
                </td>
                <td
                    style="text-align: right; border: 1px solid black; border-bottom: 0; border-right: 0; border-top: 0; padding: 5px; padding-bottom: 0px; padding-top: 2px; height: 15px; font-family: 'couriernew';">
                    <?php echo number_format($row['SWA_AMOUNT'], 2);?>
                </td>
            </tr>
            <?php echo $count++; ?>
            <?php  endforeach; ?>
            <?php 
              $remainingRows = 15 - $count;
              for ($addrow = 0; $addrow < $remainingRows; $addrow++) { ?>
            <tr>
                <td
                    style="text-align: right; border: 1px solid black; border-bottom: 0; border-left: 0; border-top: 0; padding: 1px; padding-top: 2px; height: 15px; font-family: 'couriernew';">
                </td>
                <td
                    style="text-align: left; border: 1px solid black; border-bottom: 0; border-top: 0; padding: 1px; padding-top: 2px; height: 15px; font-family: 'couriernew';">
                </td>
                <td
                    style="text-align: left; border: 1px solid black; border-bottom: 0; border-top: 0; padding: 1px; padding-top: 2px; height: 15px; font-family: 'couriernew';">
                </td>
                <td
                    style="text-align: right; border: 1px solid black; border-bottom: 0; border-top: 0; padding: 1px; padding-top: 2px; height: 15px; font-family: 'couriernew';">
                </td>
                <td
                    style="text-align: right; border: 1px solid black; border-bottom: 0; border-right: 0; border-top: 0; padding: 1px; padding-top: 2px; height: 15px; font-family: 'couriernew';">
                </td>
            </tr>
            <?php  } ?>
            <tr>
                <td
                    style="text-align: right; border: 1px solid black; border-left: 0; border-top: 0; padding: 1px; height: 15px;">
                </td>
                <td style="text-align: left; border: 1px solid black; border-top: 0; padding: 1px; height: 15px;"></td>
                <td style="text-align: center; border: 1px solid black; border-top: 0; padding: 1px; height: 15px;">
                </td>
                <td style="text-align: right; border: 1px solid black; border-top: 0; padding: 1px; height: 15px;"></td>
                <td
                    style="text-align: right; border: 1px solid black; border-right: 0; border-top: 0; padding: 1px; height: 15px;">
                </td>
            </tr>
        </tbody>
    </table>
    <table style="margin-left: -15px; font-size: 13px; width: 100%;">
        <tr>
            <td style="width: 35%;"><i>Declaration of withdrawal</i></td>
            <td style="width: 35%;"></td>
            <td style="width: 15%; font-weight: bold; text-align: center;">TOTAL >>></td>
            <td style="width: 15b%; text-align: right; border-bottom: 2px double #000; font-family: 'couriernew'">
            <?php 
               $this->db->select('swa_tbl.SWA_TOTAL');
               $this->db->from('swa_tbl');
               $this->db->where('swa_tbl.SWA_ID', $data['SWA_ID']);
                $swa_datas = $this->db->get()->result_array();
                foreach ($swa_datas as $swa_data): 
            ?>
                <?php echo number_format($swa_data['SWA_TOTAL'], 2); ?></td>
                <?php endforeach; ?>
        </tr>
    </table>
    <table style="margin-left: -18px; margin-top: 5px; margin-bottom: 5px; font-size: 13px; width: 80%;">
        <tr>
            <td style="font-weight: bold; width: 22%; ">SUPPLIER NAME :</td>
            <td style="border-bottom: 1px solid black; text-align: center;"> <?php echo (strtoupper($data['NAME']));?>
            </td>
        </tr>
    </table>
    <div style="margin-left: -15px;">
        <table style="width: 100%; border-collapse: collapse; font-size: 13px;">
            <tr>
                <th style="width: 50%; text-align: left;">Accounting Instruction :</th>
                <th style="width: 50%; text-align: left;">Remarks :</th>
            </tr>
        </table>
        <textarea name="text" id="text"
            style="width: 49.5%; height: 90px; font-family: 'Roboto'; overflow: auto;">&nbsp;<?php echo (strtoupper($data['SWA_ACCOUNTING_INSTRUCT']));?></textarea>
        <textarea name="text" id="text"
            style="width: 50%; height: 90px; font-family: 'Roboto'; overflow: auto; padding-right: 10px;">&nbsp;<?php echo (strtoupper($data['SWA_REMARK']));?></textarea>
    </div>
    <div style="margin-left: -15px; margin-top: 2px; margin-bottom: 5px; font-size: 13px;">
        <span><i>Attach supplier approved document</i></span>
          </div>
          <table style="width: 100%; margin-left: -17px; font-size: 13px; margin-top: 10px;">
            <tr>
              <td style="width: 17%; font-weight: bold;">REQUESTED BY:</td>
              <td style="text-align: center; width: 35%; border-bottom: 1px solid black;">
                <?php echo (strtoupper($data['SWA_REQUEST_BY']));?></td>
              <td style="text-align: right; width: 17%; font-weight:bold;">RELEASED BY:</td>
              <td style="text-align: center; width: 35%; border-bottom: 1px solid black;">
                <?php echo (strtoupper($data['SWA_RELEASE_BY']));?></td>
            </tr>
            <tr>
              <td></td>
              <td style="text-align: center; font-weight: bold;"><i>Full Name & Signature</i></td>
              <td></td>
              <td style="text-align: center; font-weight: bold;"><i>Full Name & Signature</i></td>
            </tr>
          </table>
          <table style="width: 100%; margin-left: -17px; font-size: 13px; margin-top: 0;">
            <tr>
              <td style="width: 23%;"></td>
              <td style="width: 7%; text-align: right; font-weight: bold;"><i>Date:</i></td>
              <td style="width: 15%; text-align: left; border-bottom: 1px solid black"><?php $dateTime = DateTime::createFromFormat('Y-m-d', $data['SWA_REQUEST_BY_DATE']);
    if ($dateTime !== false && !array_sum($dateTime->getLastErrors())) {
        $formattedDate = $dateTime->format('m/d/Y');
        echo $formattedDate;
    } else {
        echo '&nbsp;/ /';
    }?>
              </td>
              <td style="width: 7%;"></td>
              <td style="width: 23%;"></td>
              <td style="width: 7%%; text-align: right; font-weight: bold;"><i>Date:</i></td>
              <td style="width: 15%; text-align: left; border-bottom: 1px solid black">
                <?php $dateTime = DateTime::createFromFormat('Y-m-d', $data['SWA_RELEASE_BY_DATE']);
    if ($dateTime !== false && !array_sum($dateTime->getLastErrors())) {
        $formattedDate = $dateTime->format('m/d/Y');    
        echo $formattedDate;
    } else {
        echo '&nbsp;/ /';
    }?></td>
              <td style="width: 7%;"></td>
            </tr>
          </table>
          <table style="width: 100%; margin-left: -17px; font-size: 13px; margin-top: 10px;">
            <tr>
              <td style="width: 17%; font-weight: bold;">REVIEWED BY:</td>
              <td style="text-align: center; width: 35%; border-bottom: 1px solid black;">
                <?php echo (strtoupper($data['SWA_REVIEW_BY']));?></td>
              <td style="text-align: right; width: 17%; font-weight: bold;">RECEIVED BY:</td>
              <td style="text-align: center; width: 35%; border-bottom: 1px solid black;">
                <?php echo (strtoupper($data['SWA_RECEIVE_BY']));?></td>
            </tr>
            <tr>
              <td></td>
              <td style="text-align: center; font-weight: bold;"><i>Full Name & Signature</i></td>
              <td></td>
              <td style="text-align: center; font-weight: bold;"><i>Full Name & Signature</i></td>
            </tr>
          </table>
          <table style="width: 100%; margin-left: -17px; font-size: 13px; margin-top: 0;">
            <tr>
              <td style="width: 23%;"></td>
              <td style="width: 7%; text-align: right; font-weight: bold;"><i>Date:</i></td>
              <td style="width: 15%; text-align: left; border-bottom: 1px solid black">
                <?php $dateTime = DateTime::createFromFormat('Y-m-d', $data['SWA_REVIEW_BY_DATE']);
    if ($dateTime !== false && !array_sum($dateTime->getLastErrors())) {
        $formattedDate = $dateTime->format('m/d/Y');
        echo $formattedDate;
    } else {
        echo '&nbsp;/ /';
    } ?>
              </td>
              <td style="width: 7%;"></td>
              <td style="width: 23%;"></td>
              <td style="width: 7%; text-align: right; font-weight: bold;"><i>Date:</i></td>
              <td style="width: 15%; text-align: left; border-bottom: 1px solid black">
                <?php $dateTime = DateTime::createFromFormat('Y-m-d', $data['SWA_RECEIVE_BY_DATE']);
    if ($dateTime !== false && !array_sum($dateTime->getLastErrors())) {
        $formattedDate = $dateTime->format('m/d/Y');
        echo $formattedDate;
    } else {
        echo '&nbsp;/ /';
    }?></td>
              <td style="width: 7%;"></td>
            </tr>
          </table>
          <table style="width: 100%; margin-left: -17px; font-size: 13px; margin-top: 10px;">
            <tr>
              <td style="width: 16%; font-weight: bold;">APPROVED BY:</td>
              <td style="text-align: center; width: 34%; border-bottom: 1px solid black;">
                <?php echo (strtoupper($data['SWA_APPROVE_BY']));?></td>
              <td style="text-align: right; font-size: 11px; padding-top: 14px; width: 18%; font-weight: bold;">
                <i>Distribution of copies:</i>
              </td>
              <td style="font-size: 11px; padding-top: 14px; text-align: center; font-weight: bold;">
                <i>Original - Subsidiary</i>
              </td>
            </tr>
            <tr>
              <td></td>
              <td style="text-align: center; font-weight: bold;"><i>Full Name & Signature</i></td>
              <td></td>
              <td style="font-size: 11px; text-align: center; font-weight: bold;">
                <i>Duplicate - GGM File</i>
              </td>
            </tr>
          </table>
          <table style="width: 100%; margin-left: -17px; font-size: 13px; margin-top: 0;">
            <tr>
              <td style="width: 30%; text-align: right; font-weight: bold;"><i>Date:</i></td>
              <td style="width: 15%; text-align: left; border-bottom: 1px solid black">
                <?php $dateTime = DateTime::createFromFormat('Y-m-d', $data['SWA_APPROVE_BY_DATE']);
            if ($dateTime !== false && !array_sum($dateTime->getLastErrors())) {
                $formattedDate = $dateTime->format('m/d/Y');
                echo $formattedDate;
            } else {
                echo '&nbsp;/ /';
            }?>
              </td>
              <td style="width: 32%"></td>
              <td style="font-size: 11px; width: 22%; text-align: center; font-weight: bold;">
                <i>Triplicate - IAD&nbsp;&nbsp;&nbsp;&nbsp;</i>
              </td>
              <td style="width: 8%;"></td>
            </tr>
          </table>
  </body>
</html>