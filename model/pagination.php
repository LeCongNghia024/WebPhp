<?php
class pagination{
    function getStart($item_per_page)
    {
      if (!isset($_GET['page']) || $_GET['page'] == 1) {
        $_GET['page'] = 1;
        return 0;
      } else return ($_GET['page'] - 1) * $item_per_page;
    }
  
    function getTotalPage($totalProduct, $item_per_page)
    {
      return $totalProduct % $item_per_page === 0 ? $totalProduct / $item_per_page : ceil($totalProduct / $item_per_page);
    }


}