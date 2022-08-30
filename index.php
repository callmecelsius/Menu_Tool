<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <?php include 'header.php' ?>
  <!-- Model fuctionality Adapted from 'PHP - Update Data in XML File' by  razormist -->
  <!-- https://www.sourcecodester.com/tutorials/php/13137/php-update-data-xml-file.html -->

  <style>
    td {
      white-space: pre-line;
    }

    #main-buttons {
      margin: auto;
      text-align: center;
    }
  </style>

</head>

<body>
  <div class="col-md-3"></div>
  <div class="col-md-6 well">
    <h3 class="text-primary">Full Menu</h3>
    <hr style="border-top:1px dotted #ccc;" />

    <table class="table table-bordered table-striped" style="margin-top:20px;">
      <form method="post">
        <?php include 'buttons.php' ?>
      </form>
      <hr style="border-top:1px dotted #ccc;" />
      <div id="main-buttons">
        <form action="export.php">
          <?php echo '<input type="submit" name="export" value="Generate Menu" />'; ?>
        </form>
      </div>

      <thead class="alert-info">
        <th>Category</th>
        <th>Name</th>
        <th>Current Price 1</th>
        <th>New Price 1</th>
        <th>Current Price 2</th>
        <th>New Price 2</th>
        <th>Action</th>
      </thead>
      <tbody>
        <?php
        $file = simplexml_load_file('MenuEdits.xml');
        $file2 = simplexml_load_file('CurrentMenu.xml');
        foreach ($file->item as $row) {
          if (strpos($row->Category, $text) !== false) { ?>
            <tr>
              <td><?php echo $row->Category; ?></td>
              <td><?php echo $row->Name; ?></td>
              <td bgcolor=#B5E8C4><?php echo $file2->item[$i]->Price_1; ?></td>
              <td><?php echo $row->Price_1; ?></td>
              <td bgcolor=#B5E8C4><?php echo $file2->item[$i]->Price_2; ?></td>
              <td><?php echo $row->Price_2; ?></td>
              <td><a href="#edit_<?php echo $row->idNum; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>

              <div class="modal fade" id="edit_<?php echo $row->idNum; ?>" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="POST" action="update.php">
                      <div class="modal-header">
                        <center>
                          <h4 class="modal-title" id="myModalLabel">Edit Member</h4>
                        </center>
                      </div>
                      <div class="modal-body">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <label>Num</label>
                            <input type="text" class="form-control" name="id" value="<?php echo $row->idNum; ?>" readonly="readonly" />
                          </div>
                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $row->Name; ?>" <?php if (in_array($row->idNum, $readOnlyArray)) {
                                                                                                                    echo 'readonly="readonly"';
                                                                                                                  } ?> />
                          </div>
                          <div class="form-group">
                            <label>Current Price 1</label>
                            <input type="text" class="form-control" name="price1" value="<?php echo $file2->item[$i]->Price_1; ?>" readonly="readonly" />
                          </div>
                          <div class="form-group">
                            <label>Price 1</label>
                            <input type="text" class="form-control" name="price1" value="<?php echo $row->Price_1; ?>">
                          </div>
                          <div class="form-group">
                            <label>Current Price 2</label>
                            <input type="text" class="form-control" name="price2" value="<?php echo $file2->item[$i]->Price_2; ?>" readonly="readonly" />
                          </div>
                          <div class="form-group">
                            <label>Price 2</label>
                            <input type="text" class="form-control" name="price2" value="<?php echo $row->Price_2; ?>">
                          </div>
                        </div>
                      </div>
                      <br style="clear:both;" />
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                        <button name="edit" class="btn btn-warning"><span class="glyphicon glyphicon-save"></span> Update</a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </tr>
        <?php
            $i++;
          }
        }

        ?>
      </tbody>
    </table>
    <br><br>
  </div>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>