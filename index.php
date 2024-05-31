<!-- git init
git add .
git commit -m "commit message"
git remote add origin https://github.com/username/repo-name.git
git push -u origin master -->


<?php
require_once "./partials/connection.php";
$sql = "SELECT * FROM `countries`;";
$result = $conn->query($sql);

$countries = $result->fetch_all(MYSQLI_ASSOC);

// echo "<pre>";
// print_r($result->fetch_all(MYSQLI_ASSOC));
// echo "</pre>";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Countries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h2 class="m-0">Countries</h2>
                            </div>
                            <div class="col-6 text-end">
                                <a href="./add-country.php" class="btn btn-outline-primary">Add Country</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($result->num_rows !== 0) { ?>
                            <table class="table table-bordered m-0">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Name</th>
                                        <th>Capital</th>
                                        <th>Currency</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    // $sr = 1;
                                    // while($row = $result->fetch_assoc()) { 
                                    ?>
                                    <!-- <tr>
                                        <td><?php echo $sr++ ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['capital'] ?></td>
                                        <td><?php echo $row['currency'] ?></td>
                                        <td>
                                            <a href="" class="btn btn-primary">Edit</a>
                                            <a href="" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr> -->
                                    <?php
                                    // }
                                    ?>

                                    <?php
                                    $sr = 1;
                                    foreach ($countries as $country) { ?>
                                        <tr>
                                            <td><?php echo $sr++ ?></td>
                                            <td><?php echo $country['name'] ?></td>
                                            <td><?php echo $country['capital'] ?></td>
                                            <td><?php echo $country['currency'] ?></td>
                                            <td>
                                                <a href="./edit-country.php?id=<?php echo $country['id'] ?>" class="btn btn-primary">Edit</a>
                                                <a href="./delete-country.php?id=<?php echo $country['id'] ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        <?php
                        } else { ?>
                            <div class="alert alert-info m-0">No record found!</div>
                        <?php
                        }
                        ?>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>