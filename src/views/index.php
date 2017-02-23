<!DOCTYPE HTML>
<html>
    <head>
        <title>User List</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="pub/assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="pub/assets/dist/css/jquery-ui.min.css" rel="stylesheet">
        <link type="pub/text/css" rel="stylesheet" href="assets/css/styles.css"/> 
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
            <label >First Name:</label>
            <span id="userFirstName"><span>
          </div>
          <div class="form-group">
            <label >Last Name:</label>
            <span id="userLastName"><span>
          </div>
          <div class="form-group">
            <label >Email:</label>
            <span id="userEmail"><span>
          </div>
          <div class="form-group">
            <label >Role:</label>
            <span id="userRole"><span>
          </div>
          <div class="form-group">
            <label >Deparment:</label>
            <span id="userDeparment"><span>
          </div>
          <div class="form-group">
            <label >dob:</label>
            <span id="userDob"><span>
          </div>
          <div class="form-group">
            <label >street address 1:</label>
            <span id="userStreetAddress1"><span>
          </div>
          <div class="form-group">
            <label >street address 2:</label>
            <span id="userStreetAddress2"><span>
          </div>
          <div class="form-group">
            <label >Suburb:</label>
            <span id="userSuburb"><span>
          </div>
          <div class="form-group">
            <label >State:</label>
            <span id="userState"><span>
          </div>
          <div class="form-group">
            <label >postcode:</label>
            <span id="userPostcode"><span>
          </div>
          <div class="form-group">
            <label >Country:</label>
            <span id="userCountry"><span>
          </div>
        </div>
        <script src="pub/assets/js/jquery-2.2.4.min.js"></script>
        <script src="pub/assets/dist/js/jquery-ui.js"></script>
        <script src="pub/assets/js/script.js"></script>
    </body>
</html>
