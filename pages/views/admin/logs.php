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

        <?php

        function allPages(){
          $datas = logFiles();

            $logs = [];
            foreach($datas as $data)
            {
                $logs[]= explode("\t",$data);
            }


            $pages = [];
            foreach($logs as $log)
            {
              if ($log[1] == 'index.php') {
                $log[1] = 'index.php?page=index';
              }
              // ovaj else if je moj
              else if($log[1] == 'php-shop')
              {
                $log[1] = 'index.php?page=index';
              }
             $pages[] = explode("=",$log[1]);
            }

            $allPages = [];
            foreach($pages as $page) {
              $allPages[$page[1]]['visits'] = 0;
            }

            return $allPages;
          }
        
        function allDates(){
          $datas = logFiles();

          $pageVisits = allPages();

          $logs = [];

          $date = date("d.m.Y");

          echo "<pre>"; var_dump($pageVisits);

          $logs= [];

          foreach ($datas as $data) {

            $logs[] = explode("\t",$data);
          }

          foreach($logs as $log)
          {
            if($log[0]==$date)
            {
              
              $page = explode("=",$log[1]);
              if (!isset($page[1])) {
                  $page[1] = 'index';
              }
              $pageVisits[$page[1]]['visits']++;
            }
          }

          echo 'NAKON POPUNE';
          echo "<pre>"; var_dump($pageVisits);
          foreach($pageVisits as $key => $value)
          {
            echo $key;
            echo $value['visits'];
          }

        }
        
        allDates();
        ?>