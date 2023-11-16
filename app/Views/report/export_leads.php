<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export to Excel</title>
    <!-- Include TableExport library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
</head>

<body>

    <div class="card rounded">
        <div class="card-body" id="dataToExport">
            <div class="p-lg-3 p-0">
                <div class="table-responsive">
                    <table class="table  table-hover" border="1" id="myTable">

                        <thead>
                            <tr>
                                <th class="d-sm-table-cell d-none">
                                    No
                                </th>
                                <th>
                                    Name
                                </th>
                                <th class="text-lg-left text-right">
                                    Category
                                </th>
                                <th class="d-sm-table-cell d-none">
                                    Date In
                                </th>
                                <th class="d-none">
                                    Address
                                </th>
                                <th class="d-sm-table-cell d-none">
                                    Project
                                </th>
                                <th class="d-sm-table-cell d-none">
                                    Source
                                </th>

                                <th class="d-sm-table-cell d-none">
                                    Sales
                                </th>
                                <th class="d-sm-table-cell d-none">
                                    Manager
                                </th>
                                <th class="d-sm-table-cell d-none">
                                    GM
                                </th>
                                <th class="d-sm-table-cell d-none">
                                    Status
                                </th>



                            </tr>
                        </thead>


                        <tbody>

                            <?php $no = 1; ?>
                            <?php

                            foreach ($leads->getResultArray() as $row) :

                            ?>

                                <tr>
                                    <td class="d-sm-table-cell d-none">
                                        <?= $no++; ?>
                                    </td>
                                    <td style="width:100px;">

                                        <?php
                                        $str = $row['nama_leads'];
                                        if (strlen($str) > 15) {
                                            $str = substr($str, 0, 15) . ' ...';
                                        }
                                        echo $str;
                                        ?>
                                    </td>
                                    <td class="text-lg-left text-right">
                                        <label><?= $row['kategori_status']; ?></label>

                                    </td>

                                    <td class="d-sm-table-cell d-none" >
                                        <?php
                                        $row['time_stamp_new'];
                                        $dt_cnv_tmstp = date('d M Y', strtotime($row['time_stamp_new']));
                                        echo $dt_cnv_tmstp;
                                        ?>
                                    </td>
                                    <td class="d-none">
                                        <?= $row['alamat']; ?>
                                    </td>
                                    <td class="d-sm-table-cell d-none">
                                        <?php foreach ($project->detail($row['project'])->getResultarray() as $prj) {
                                            echo $prj['project'];
                                        } ?>
                                    </td>
                                    <td class="d-sm-table-cell d-none">
                                        <?= $row['sumber_leads']; ?>
                                    </td>

                                    <td class="d-sm-table-cell d-none">

                                        <?php foreach ($user_group->detail($row['sales'])->getResultArray() as $sl) : ?>
                                            <?= $sl['fullname']; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td class="d-sm-table-cell d-none">

                                        <?php foreach ($user_group->detail($row['manager'])->getResultArray() as $sl) : ?>
                                            <?= $sl['fullname']; ?>
                                        <?php endforeach; ?>

                                    </td>
                                    <td class="d-sm-table-cell d-none">

                                        <?php foreach ($user_group->detail($row['general_manager'])->getResultArray() as $sl) : ?>
                                            <?= $sl['fullname']; ?>
                                        <?php endforeach; ?>

                                    </td>
                                    <td class="d-sm-table-cell d-none">
                                        <?= $row['update_status']; ?>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
            </div>

        </div>

    </div>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Trigger the export function on page load
            exportTableToExcel();
        });

        function exportTableToExcel() {
            // Select the table element
            var table = document.getElementById("myTable");

            // Convert the table to a worksheet
            var ws = XLSX.utils.table_to_sheet(table);

            // Create a new Excel workbook
            var wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'Sheet 1');

            // Save the workbook to a file
            XLSX.writeFile(wb, 'Report_Leads.xlsx');
        }
    </script>

    <script>
        document.getElementById("doPrint").addEventListener("click", function() {
            var printContents = document.getElementById('export_excel').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        });
    </script>


</body>

</html>