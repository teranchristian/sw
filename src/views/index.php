<!DOCTYPE HTML>
<html>
    <head>
        <title>User List</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?= $assestsPath ?>pub/assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= $assestsPath ?>pub/assets/dist/css/jquery-ui.min.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="<?= $assestsPath ?>pub/assets/css/styles.css"/> 
    </head>
    <body class="container">
        <div class="row ">
            <div style="float: none; margin: 0 auto;">
                <h1>User List (<span id="totalUsers">0</span>)</h1>
                <div class="table-responsive">
                    <table id="userTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th data-orderBy='first_name' data-sortBy='ASC'>
                                    First Name
                                    <span></span>
                                </th>
                                <th data-orderBy='last_name' data-sortBy='DESC'>
                                    Last Name
                                    <span></span>
                                </th>
                                <th data-orderBy='email' data-sortBy='DESC'>
                                    Email
                                    <span></span>
                                </th>
                                <th data-orderBy='role' data-sortBy='DESC'>
                                    Role
                                    <span></span>
                                </th>
                                <th data-orderBy='department' data-sortBy='DESC'>
                                    Deparment
                                    <span></span>
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="6">No records found!</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="dialog" title="User Details">
          <div class="form-group">
            <label for="email">First Name:</label>
            <span id="userFirstName"><span>
          </div>
          <div class="form-group">
            <label for="pwd">Last Name:</label>
            <span id="userLastName"><span>
          </div>
          <div class="form-group">
            <label for="pwd">Email:</label>
            <span id="userEmail"><span>
          </div>
          <button id="dialogClose" class="btn btn-default">close</button>
        </div>
        <script src="<?= $assestsPath ?>pub/assets/js/jquery-2.2.4.min.js"></script>
        <script src="<?= $assestsPath ?>pub/assets/dist/js/jquery-ui.js"></script>
        <script src="<?= $assestsPath ?>pub/assets/js/script.js"></script>
    </body>
</html>
