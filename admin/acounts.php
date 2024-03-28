<?php

include 'header.php';
include 'connect.php';

/// hey don't miss to test if session ['username '] is set to see all page or no to see error and redirect
 
//-------And make this in all pages ok---------//

$stmt = $conn->prepare("SELECT * FROM users 
                        ORDER BY id DESC"); 

$stmt->execute();
$row = $stmt->fetchALL();

if ($stmt->rowCount() > 0) { ?>

    <br>
    <br>
    <div class="row">
    <div class="col-md-1">
</div>

    <div class="col-md-10">
    <div class="content-panel">
        <h4><i class="fa fa-angle-right"></i> Acounts </h4><hr><table class="table table-striped table-advance table-hover">
                                    
                
        <thead>
        <tr>
            <th><i class="fa fa-bullhorn"></i> #</th>
            <th class="hidden-phone"><i class="fa fa-user"></i> Acount</th>
            <th class="hidden-phone"><i class="fa fa-user-circle"></i> Man name</th>
            <th class="hidden-phone"><i class="fa fa-user-circle"></i> Woman name</th>
            <th><i class="fa fa-email"></i> Email</th>
            <th><i class="fa fa-bookmark"></i> Man birthday</th>
            <th><i class="fa fa-bookmark"></i> Woman birthday</th>
            <th><i class="fa fa-bookmark"></i> Adress</th>
            <th><i class=" fa fa-edit"></i> Actions</th>
            <th></th>
        </tr>
        </thead>    
        <?php
    foreach($row as $r){ ?>

        <tr>
          <td>

          </td>
          <td> <?= $r['username']; ?></td>
          <td> <?= $r['man_name']; ?></td>
          <td> <?= $r['woman_name']; ?></td>
          <td> <?= $r['email']; ?></td>
          <td> <?= $r['man_birthday']; ?></td>
          <td> <?= $r['woman_birthday']; ?></td>
          <td> <?= $r['adress']; ?></td>
          
          <td>
              <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
              <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
              <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
          </td>
      <tbody>

        <?php
    } ?>
                  </tbody>
          </table>
      </div><!-- /content-panel -->
  </div>
  </div><?php
} else {
    ?> 
    <div class="alert alert-danger">No user acount</div>
    <?php
}



?>







                    
