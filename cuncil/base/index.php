<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <?php

        session_start();

        require "get-php/functions.php";

        if (isset($_SESSION['esuccess'])) {
            $_sql = "SELECT * FROM `id` ORDER BY id";
            $_res = q($_sql);
            $output = ''; ?>
            <table class="table">
                <thead class="table-dark">
                    <th>#</th>
                    <th>Անուն</th>
                    <th>Էլ—հասցե</th>
                    <th>Նամակ</th>
                    <th>Ուղղարկվել—է</th>
                    <th>Հրամաններ</th>
                </thead>
                <tbody>
                    <?php
                    while ($td = mysqli_fetch_assoc($_res)) { ?>
                        <tr>
                            <td><?= $td['id'] ?></td>
                            <td><?= $td['name'] ?></td>
                            <td><?= $td['email'] ?></td>
                            <td><?= $td['message'] ?></td>
                            <td><?= show_time($td['created_at']) ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <?php
                                    if ($td['view_status_secretary'] == "0") { ?>
                                        <button id="showPopup<?= $td['id'] ?>" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Ցուցադրել
                                        </button>
                                    <?php } else { ?>
                                        <a class="btn btn-secondary" href="get-php/actions.php?unmessage=<?= $td['id'] ?>">Հետ բերել</a>
                                    <?php } ?>
                                    <a href="get-php/actions.php?dmessage=<?= $td['id'] ?>" class="btn btn-danger">Հեռացնել բազայից</a>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="exampleModal<?= $td['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?= $td['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Զգուշացում</h5>
                                        <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Համաձա՞յն եք, որ նամակը տեսնի ավագանին։
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" aria-label="Close" data-bs-dismiss="modal">Ոչ</button>
                                        <a href="get-php/actions.php?pmessage=<?= $td['id'] ?>" type="button" class="btn btn-success">Այո</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $("#showPopup<?= $td['id'] ?>").on("click", function() {
                                    $("#exampleModal<?= $td['id'] ?>").modal("show");
                                })
                            });
                        </script>
                    <?php } ?>
                </tbody>
            </table>
        <?php
        } else {
            header("location: ?page=general");
        }
        ?>
    </div>

    <br>
    <br>
    <br>
    <iframe width="100%" height="100%" src="http://localhost/cuncil/?mpanel"></iframe>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>