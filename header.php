<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Support Line-LMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="web.css">
</head>

<? session_start();

include 'changepage.php'; ?>

<link rel="stylesheet" type="text/css" href="web.css">

<body class='' style='overflow-x: hidden;overflow-y: scroll;'>
    <header class='header'>
        <script src="Time.js"></script>
        <div class='bg-success p-1'>
            <table width = '100%'>
                <tr>
                    <td><span id="date_time" class='h4 bg-primary rounded-pill p-1 text-light font-weight-lighter'></span>
                        <script type="text/javascript">
                            window.onload = date_time('date_time');
                        </script>
                    </td>
                    <td class='text-right'>
                        <? if ($_SESSION['status'] == 'correct') { ?>
                        <button class='btn p-2 rounded-pill btn-secondary' onclick="location.href = 'logout.php';">Logout</button>
                        <?
                    } ?>
                    </td>

                </tr>
                </tr><td class='p-1'></td></tr>
                <tr>
                    <td colspan="3" class='text-center text-light header text-center p-4 h1 web-header'>Learning Management System on Line Application</td>
                </tr>
            </table>
        </div>

    </header> 