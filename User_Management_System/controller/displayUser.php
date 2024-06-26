<?php

    $action=getParam('action');//prendo parametri di ricerca
    switch($action){
      default:
      $pageI = getParam('page', 1);
        $params=[
          'orderBy'=>$orderBy,
          'recordsPerPage'=>$recordsPerPage,
          'orderDir'=>$orderDir,
          'search'=>$search,
          'currentPage'=>$pageI
        ];
        $totalRecords=getTotalUsersCount($params['search']);
        $user=$totalRecords?getUsers($params):[];//di default prende gli user
        // var_dump($_REQUEST);
        $orderDirClass = $orderDir;
        require 'views/userList.php';
        break;
    }
