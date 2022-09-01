<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <?php include './php-files/header.php' ?>
  <!-- Model fuctionality Adapted from 'PHP - Update Data in XML File' by  razormist -->
  <!-- https://www.sourcecodester.com/tutorials/php/13137/php-update-data-xml-file.html -->

  <style>
    td {
      white-space: pre-line;
    }

    .main-buttons {
      margin: auto;
      text-align: center;
    }

    form {
      margin: auto;
    }
  </style>

</head>

<body>
  <div class="col-md-3"></div>
  <div class="col-md-6 well">
    <h3 class="text-primary">Full Menu</h3>
    <hr style="border-top:1px dotted #ccc;" />

    <table class="table table-bordered table-striped" style="margin-top:20px;">
      <div class="main-buttons">
        <form action="./php-files/export.php">
          <?php echo '<input type="submit" name="export" value="Download Menu" />'; ?>
        </form>
        <hr style="border-top:1px dotted #ccc;" />
        <form method='POST' action="./php-files/reset.php">
          <?php echo '<input type="submit" name="reset" value="Clear Edits" />'; ?>
          <?php echo '<input type="submit" name="transfer" value="Update Current" />'; ?>
          <?php echo '<input type="submit" name="restore" value="Restore Backup" />'; ?>
        </form>
      </div>
      <hr style="border-top:1px dotted #ccc;" />
      <div class="main-buttons">
        <form method="post">
          <?php include './php-files/buttons.php' ?>
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
        $xml = simplexml_load_file('./xml/MenuEdits.xml');
        $xml2 = simplexml_load_file('./xml/CurrentMenu.xml');
        foreach ($xml->item as $row) {
          if (strpos($row->Category, $text) !== false) { ?>
            <tr>
              <td><?php echo $row->Category; ?></td>
              <td><?php echo $row->Name; ?></td>
              <td bgcolor=#B5E8C4><?php echo $xml2->item[$i_index_php]->Price_1; ?></td>
              <td><?php echo $row->Price_1; ?></td>
              <td bgcolor=#B5E8C4><?php echo $xml2->item[$i_index_php]->Price_2; ?></td>
              <td><?php echo $row->Price_2; ?></td>
              <td><a href="#edit_<?php echo $row->idNum; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>

              <div class="modal fade" id="edit_<?php echo $row->idNum; ?>" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="POST" action="./php-files/update.php">
                      <div class="modal-header">
                        <center>
                          <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
                        </center>
                      </div>
                      <div class="modal-body">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                          <div class="form-group" hidden>
                            <label>Num</label>
                            <input type="text" class="form-control" name="id" value="<?php echo $row->idNum; ?>" readonly="readonly" />
                          </div>
                          <div class="form-group col-md-12">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $row->Name; ?>" readonly="readonly" />
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Current Price 1</label>
                              <input type="text" class="form-control" name="price1" value="<?php echo $xml2->item[$i_index_php]->Price_1; ?>" readonly="readonly" />
                            </div>
                            <div class="form-group">
                              <label>Price 1</label>
                              <input type="text" class="form-control" name="price1" value="<?php echo $row->Price_1; ?>" pattern="\S(.*\S)?">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Current Price 2</label>
                              <input type="text" class="form-control" name="price2" value="<?php echo $xml2->item[$i_index_php]->Price_2; ?>" readonly="readonly" />
                            </div>
                            <div class="form-group">
                              <label>Price 2</label>
                              <input type="text" class="form-control" name="price2" value="<?php echo $row->Price_2; ?>" pattern="\S(.*\S)?">
                            </div>
                          </div>
                          <div class="col-md-12" style="text-align: center;">
                            <p>Form does <u>not</u> accept whitespace</p>
                            <p>ex: '&nbsp;&nbsp;&nbsp;&nbsp;1.00' or '1.00&nbsp;&nbsp;'</p>
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
            $i_index_php++;
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