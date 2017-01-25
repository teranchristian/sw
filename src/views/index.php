<!DOCTYPE HTML>
<html>
    <head>
        <title>User List</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?= $assestsPath ?>pub/assets/dist/css/bootstrap.min.css" rel="stylesheet">
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
                                    <span class="glyphicon glyphicon-arrow-down hidden"></span>
                                </th>
                                <th data-orderBy='last_name' data-sortBy='DESC'>
                                    Last Name
                                    <span class="glyphicon glyphicon-arrow-down hidden"></span>
                                </th>
                                <th data-orderBy='email' data-sortBy='DESC'>
                                    Email
                                    <span class="glyphicon glyphicon-arrow-down hidden"></span>
                                </th>
                                <th data-orderBy='role' data-sortBy='DESC'>
                                    Role
                                    <span class="glyphicon glyphicon-arrow-down hidden"></span>
                                </th>
                                <th data-orderBy='department' data-sortBy='DESC'>
                                    Deparment
                                    <span class="glyphicon glyphicon-arrow-down hidden"></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5">No records found!</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="<?= $assestsPath ?>pub/assets/js/jquery-2.2.4.min.js"></script>
        <script src="<?= $assestsPath ?>pub/assets/js/script.js"></script>
    </body>
</html>
