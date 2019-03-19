<? include 'changepage.php'; ?>
<table class='table web-border text-light'>
    <tr>
        <td width="25%" align="center" class='web-border'>
            <p><a id='click' href='#' data-target="sent">
                    <img src="picture/Sent.png" width="50%" height="50%" title="SentPage" /></a></p>
            <p class="font-xlarge font-color-hardgreen">Sent</p>
        </td>


        <td width="37.5%" rowspan="2" valign="top" align="center" class='web-border'>
            <form id="form1" name="form1" method="post" action="addjob.php">
                <p><img src="picture/book.png" width="65%" /> </p>
                <p>
                    <label for="Job" class='h4'>Time/Date : </label>
                    <!-- <input type="number" name="hr_job" min="0" max="23">: -->
                    <select name="hr_job" class='custom-select col-1'>
                        <? for ($i = 0; $i < 24; $i++) {
                            echo "<option value = '$i'> $i </option>";
                        }
                        ?>
                    </select>
                    <!-- <input type="number" name="min_job" min="0" max="59"> -->
                    <select name="min_job" class='custom-select col-1'>
                        <? for ($i = 0; $i < 60; $i++) {
                            echo "<option value = '$i'> $i </option>";
                        }
                        ?>
                    </select>
                    <input type="date" name="d_job" id="d.job" class='custom-select col-3' />
                    <div>
                        <input type="text" name="job" id="job" class='form-control col-5 p-1 text-center' placeholder="งานที่ต้องการมอบหมาย" maxlength="25" />
                    </div>
                </p>
                <div>
                    <input type="submit" class="btn btn-light" name="Sent.J" id="Sent.J" value="มอบหมายงาน" />
                </div>
            </form>
        </td>
        <td width="37.5%" rowspan="2" valign="top" align="center" class=''>
            <form id="form2" name="form2" method="post" action="botbroadcast.php">
                <p><img src="picture/megaphone.png" width="58%" /> </p>
                <p>
                    <label for="Anou"></label><br />
                    <br />
                    <input type="text" name="Anou" class='form-control col-8 p-1 text-center' id="Anou" placeholder="Input Anouncement to broadcast" />
                </p>
                <p>
                    <input type="submit" class="btn btn-light" name="Sent.A" id="Sent.A" value="Broadcast" />
                </p>
            </form>
        </td>

    <tr>
        <td align="center" class='web-border'>
            <p><a id='click' href="#" data-target="receive">
                    <img src="picture/Receive.png" width="50%" height="50%" title="ReceivePage" /></a></p>
            <p class="font-xlarge font-color-hardgreen">Receive</p>
        </td>
    </tr>
</table> 