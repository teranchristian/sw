<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <title>User list</title>
        <link type="text/css" rel="stylesheet" href="<?= $assestsPath ?>pub/assets/css/styles.css" media="screen, projection, print" />
        <style type="text/css">
        </style>
    </head>
    
    <body>

<!--         <div class="nav_bar">
          <div class="logo">
                <a href="sbs.com.au" title="Home" >
                    <img src="assets/images/logo@2x.png">
                </a>
          </div>
        </div> -->
        <div id="wrapper" class="wrapWidth ">
            <table id="userTable">
                <thead>
                <tr>
                    <th id='sortByFirstName'>First Name</th>
                    <th id='sortByLastName'>Last Name</th>
                    <th id='sortByEmail'>Email</th>
                    <th id='sortByRole'>Role</th>
                    <th id='sortDeparment'>Deparment</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">No records found!</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <script src="<?= $assestsPath ?>pub/assets/js/jquery-2.2.4.min.js"></script>
        <script src="<?= $assestsPath ?>pub/assets/js/script.js"></script>
    </body>
</html>
