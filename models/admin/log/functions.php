<?php 

    function logFiles(){

        $file = fopen("data/log.txt","r");

        $podaci = file("data/log.txt");

        return $podaci;

    }

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
            // zaplet
            else if($log[1] == 'php-shop')
            {
              $log[1] = 'index.php?page=index';
            }
            else if($log[1]== "logout")
            {
              $log[1] = 'index.php?page=logout';
            }
            else if($log[1]== "login")
            {
              $log[1] = 'index.php?page=login';
            }
            else if($log[1]=="")
            {
              $log[1] = 'index.php?page='.$log[1];
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
  
            // echo "<pre>"; var_dump($pageVisits);
  
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
  
            // echo 'NAKON POPUNE';
            // echo "<pre>"; var_dump($pageVisits);
  
  
  
  
  
            $numbers = [];
            foreach($pageVisits as $key => $value)
            {
              echo "Broj poseta stranici ".$key." je :";
              echo $value['visits']."</br>";
              $numbers[]=$value['visits'];  
              
            }
  
            $sum = array_sum($numbers);
  
            echo "Ukupan broj poseta stranicama :".$sum;
  
            echo "</br>";
          
            foreach($pageVisits as $key => $value)
            {
              echo "Stranica ".$key.":";
              echo ceil($value['visits']/$sum*100)."%"."</br>";
            }
  
          }

?>