<h2>Logs from log file</h2></br>
<table border="1">

        <tr>
          <td>Date</td>
          <td>Page</td>
          <td>Ip adress</td>
        </tr>
        <?php 

              
            include "models/admin/log/functions.php";

            $datas = logFiles();

            foreach($datas as $data):

              $log = explode("\t",$data);
            

          ?>
          <tr>
          <td><?=$log[0]?></td>
          <td><?=$log[1]?></td>
          <td><?=$log[2]?></td>
        </tr>
            
            <?php endforeach; ?>
        </table>

        </br>