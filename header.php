<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Line-LMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<? session_start();

include 'changepage.php'; ?>

<link rel="stylesheet" type="text/css" href="web.css">

<body>
    <header>
        <script src="Time.js"></script>
        <div class='header-background'>
            <table width="100%" height="100%" border="0" ">
            <tr><td class ='top-header'><span id=" date_time" class='header-time'></span>
                <script type="text/javascript">
                    window.onload = date_time('date_time');
                </script>
                </td>
                <td align='right'>
                    <? if ($_SESSION['status'] == 'correct') { ?>
                    <button onclick="location.href = 'logout.php';">Logout</button>
                    <?
                } ?>
                </td>

                </tr>
                <tr>
                    <td colspan="3" class='header head-font'>Learning Management System on Line Application</td>
                </tr>
            </table>
        </div>

    </header> 