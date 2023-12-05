<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <style>
    center {
        margin-top: 20%;
    }

    body {
        background-image: url('bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
    }

    span {
        background-color:cyan;
    }

    .logout {
        display:flex;
        justify-content:flex-end;
    }
    </style>
</head>

<body>
    <p class="logout">
        <a href="Logout.php"><button type="button" id="logout" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
</svg> Log Out</button></a>
    </p>
    <center>
        <a href='ManageUsers.php?' class='btn btn-primary'>Modify User Information</a>
        <a href='Recipes.php?' class='btn btn-primary'>Check Recipes</a><br><br>
    <button type="button" class="btn btn-primary" onclick="goBack()">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
    </svg> Go back
</button>
    </center>

<script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>