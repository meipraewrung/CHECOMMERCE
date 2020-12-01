<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
include("fusion_chart/fusioncharts.php");
?>
<?php
$yearThai = date("Y") + 543;
$dateStart = date("d/m/") . $yearThai;
$dateEnd = date("d/m/") . $yearThai;
$dataChart = getAllDataChartReportSale($dateStart, $dateEnd);
$allDataReportSale = getAllDataReportSale($dateStart, $dateEnd);

if (isset($_POST["submit"])) {
  $dataChart = getAllDataChartReportSale($_POST["start_date"], $_POST["end_date"]);
  $allDataReportSale = getAllDataReportSale($_POST["start_date"], $_POST["end_date"]);
}

?>
<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js?cacheBust=56"></script>
<?php


$columnChart = new FusionCharts("column2d", "myFirstChart", 800, 600, "chart-1", "json", $dataChart);

// Render the chart
$columnChart->render();

?>

<body>

  <?php
  require_once("nav.php");
  ?>


  <section class="flat-tracking background">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="order-tracking">
            <div class="title">
              <h3>รายงานการขายสินค้า</h3>
            </div><!-- /.title -->
            <div class="tracking-content">

              <form name="report_form" action="" method="post">
                <table style="width:100%" align="center">
                  <tr>
                    <td style="text-align:center;">ตั้งแต่วันที่ </td>
                    <td><input type="text" class="form-control border-input" name="start_date" id="start_date"></td>
                    <td style="text-align:center;">ถึงวันที่ </td>
                    <td><input type="text" class="form-control border-input" name="end_date" id="end_date"></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td style="text-align:center;" colspan="4">
                      <input type="submit" name="submit" value="แสดงรายงาน" class="btn btn-info">
                    </td>
                  </tr>
                </table>
              </form>

              <div id="chart-1" align="center"></div>

              <table class="table" id="data_table">
                <thead class=" text-primary">
                  <th style="text-align: center">ชื่อสินค้า</th>
                  <th style="text-align: center">จำนวนที่ขาย</th>
                  <th style="text-align: center">รวมสุทธิ</th>
                </thead>
                <tbody>
                  <?php if (empty($allDataReportSale)) { ?>
                  <?php } else { ?>
                    <?php $total = 0; ?>
                    <?php foreach ($allDataReportSale as $data) { ?>

                      <tr>
                        <td style="text-align: center"><?php echo $data["pro_name"]; ?></td>
                        <td style="text-align: center"><?php echo $data["amount"]; ?></td>
                        <td style="text-align: center"><?php echo number_format($data["sum_price"]); ?></td>
                      </tr>
                      <?php $total += $data["sum_price"]; ?>
                    <?php } ?>
                  <?php } ?>
                  <tr>
                    <td colspan="2" style="text-align:center;">รวมสุทธิ</td>
                    <td><?php echo number_format($total); ?> บาท</td>
                  </tr>
              </table>

            </div><!-- /.tracking-content -->
          </div><!-- /.order-tracking -->
        </div><!-- /.col-md-12 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /.flat-tracking -->


  <script>
    $('#start_date').datetimepicker({
      lang: 'th',
      timepicker: false,
      format: 'd/m/Y'
    });
    $('#end_date').datetimepicker({
      lang: 'th',
      timepicker: false,
      format: 'd/m/Y'
    });
  </script>

  <?php
  require_once("footer.php");
  ?>


</body>

</html>