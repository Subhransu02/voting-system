<?php
session_start();
if(!isset($_SESSION['data'])){
    header('location:../');
}
$data = $_SESSION['data'];

if ($_SESSION['status'] == 1) {
    $status = '<b class="text-success">Voted</b>';
} else {
    $status = '<b class="text-danger">Not Voted</b>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voting System - Dashboard</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body class="bg-secondary text-light">
    <div class="conatiner my-5">
        <a href="../"><button class="btn btn-dark text-light px-3">Back</button></a>
        <a href="logout.php"><button class="btn btn-dark text-light px-3">Logout</button></a>

        <h1 class="my-3">Voting System</h1>
        <div class="row my-5">
            <div class="col-md-7">
                <?php
                if (isset($_SESSION['groups'])) {
                    $groups = $_SESSION['groups'];
                    for ($i = 0; $i < count($groups); $i++) {
                        ?>
                        <div class="row">
                            <div class="col-md-4">
                                <img src="../uploads/<?php echo $groups[$i]['photo'] ?>" alt="Group Image">
                            </div>
                            <div class="col-md-8">
                                <!-- user profile -->
                                <strong class="text-dark h5">Group Name: </strong>
                                <?php echo $groups[$i]['username'] ?><br>
                                <strong class="text-dark h5">Votes: </strong>
                                <?php echo $groups[$i]['votes'] ?>
                            </div>
                        </div>
                        <hr>
                        <form action="../actions/voting.php" method="POST">
                            <input type="hidden" name="groupvotes" value="<?php echo $groups[$i]['votes'] ?>">
                            <input type="hidden" name="groupid" value="<?php echo $groups[$i]['id'] ?>">

                            <?php
                            if ($_SESSION['status'] == 1) {
                                ?>
                                <button class="bg-success my-3 text-whiite px-3">Voted</button>
                                <?php
                            } else {
                                ?>
                                <button class="bg-danger my-3 text-whiite px-3">Vote<button>
                                        <?php
                            }
                            ?>
                        </form>
                        <hr>
                        <?php
                    }
                } else {
                    ?>
                    <div class="container">
                        <p>Np groups to display</p>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="col-md-5">
                <!-- user profile -->
                <img src="../uploads/<?php echo $data['photo']; ?>" alt="User Image">
                <br>
                <br>
                <strong class="text-dark h5">Name: </strong>
                <?php echo $data['username']; ?><br><br>
                <strong class="text-dark h5">Mobile: </strong>
                <?php echo $data['mobile']; ?><br><br>
                <strong class="text-dark h5">Status: </strong>
                <?php echo $status; ?><br><br>
            </div>
        </div>
    </div>
    <script src="index.js"></script>
</body>

</html>