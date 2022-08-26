<?php
$tit = $_POST["sdropdown"];
$tit2 = $_POST["sdropdown2"];
$url = "https://data.nhi.gov.tw/resource/mask/maskdata.csv";
// FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
$lines = file($url, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$titles = array_shift($lines);
$titArr = explode(",", $titles);
$tbl = "<table>";
$tbl .= "<tr>";
foreach ($titArr as $title) {
    $tbl .= "<th>$title</th>";
}
$tbl .= "</tr>";
foreach ($lines as $line) {
    //if (strpos($line, '請選擇鄉鎮') !== false) {
    //    if (strpos($line, $tit) !== false) {
    //        $tbl .= "<tr>";
    //        $dataArr = explode(",", $line);
    //        foreach ($dataArr as $data) {
    //            $tbl .= "<td>$data</td>";
    //        }
    //        $tbl .= "</tr>";
    //    }
    //}
    //else {
        if (strpos($line, $tit.$tit2) !== false) {
            $tbl .= "<tr>";
            $dataArr = explode(",", $line);
            foreach ($dataArr as $data) {
                $tbl .= "<td>$data</td>";
            }
            $tbl .= "</tr>";
        }
    //}
}

$tbl .= "</table>";


?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <meta charset="UTF-8" />
    <title>Service Area</title>
    <style type="text/css">
        table {
            border: 3px outset Olive;
            margin: 10px auto;
        }

        tr:nth-of-type(even) {
            background-color: LightCyan;
        }

        td {
            padding: 3px 5px;
            text-align: right;
        }

        th {
            color: white;
            background-color: DarkGreen;
            padding: 5px;
        }

        #cont {
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="cont">
        <h2>Assignment 7: 口罩剩餘數量即時線上查詢</h2>
        <?php
        echo $tbl;
        ?>
    </div>
</body>

</html>