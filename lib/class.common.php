<?php

class Common {

    public function pageNav($total_page,$page)
    {
	
        $nav = [];
        $nav_count = 5;
        $total_nav =  ceil($total_page/$nav_count);
        $pre_nav = 0;
        if($total_page <= $nav_count){
            for ($i=1; $i < $page; $i++) { 
                array_push($nav,$i);
            }
        }else{
            $j =  ( $nav_count * floor( ($page -1)/$nav_count) )  + 1;
            $k = $j + $nav_count;
            for ($i=$j; $i < $k; $i++) { 
                array_push($nav,$i);
            }
            $pre_nav = $j - 1 > 0 ? $j - 1 : 0;
        }
        $next_nav = $i < $total_page ? $i  : 0;
        $return  = [
            'pre' => $pre_nav,
            'nav' => $nav,
            'next' => $next_nav,
        ];
        return $return;
    }
}
