<?include 'changepage.php';?>



<table class='color-blue' >
    <tr>
        <td width="25%" align="center" class='border'><p><a id = 'click' href='#' data-target="sent">
        <img src="picture/Sent.png" width="50%" height="50%" title="SentPage" /></a></p>
        <p class="font-xlarge font-color-hardgreen">Sent</p>
        </td>


<td width="37.5%" rowspan="2" valign="top" align="center" class='border'>
        <form id="form1" name="form1" method="post" action="addjob.php">
        <p><img src="picture/book.png"/book.png" width="77%" height="77%" /> </p>
        <p>
            <label for="Job"></label>
            <input type="number" name="hr_job" min="0" max="23">:
            <input type="number" name="min_job" min="0" max="59">
            <input type="date" name="d_job" id="d.job"/><br/>
            <input type="text" name="job" id="job" placeholder="งานที่ต้องการมอบหมาย" maxlength="25"/>
        </p>
        <p>
            <input type="submit" name="Sent.J" id="Sent.J" value="มอบหมายงาน" />
        </p>
        </form></td>
        <td width="37.5%" rowspan="2" valign="top" align="center" class='border'>
        <form id="form2" name="form2" method="post" action="botbroadcast.php">
        <p><img src="picture/megaphone.png" width="75%" height="75%" /> </p>
        <p>
            <label for="Anou"></label><br />
            <br />            
            <input type="text" name="Anou" id="Anou" placeholder="Input Anouncement to broadcast" />
        </p>
        <p>
            <input type="submit" name="Sent.A" id="Sent.A" value="Broadcast" />
        </p>
        </form>
        </td>


</tr>
    <tr>
        <td align="center" class='border'><p><a id = 'click' href="#" data-target="receive">
        <img src="picture/Receive.png" width="50%" height="50%" title="ReceivePage" /></a></p>
        <p class="font-xlarge font-color-hardgreen">Receive</p></td>
    </tr>
</table>



        
    
