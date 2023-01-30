<?php

    if(isset($_GET['action']))
    {
        $action = $_GET['action'];

        switch($action)
        {
            case "4":
                {
                    $id = $_GET['id'];
                    
                    
                    $sql = "DELETE FROM tbl_users WHERE id = '$id'";
                    echo $sql;
                    mysqli_query($connect,$sql);
                    break;
                }
        }
    }

    $sql = "SELECT * FROM tbl_users ORDER BY id ASC";
    $result = mysqli_query($connect,$sql);
?>
<div class="container-fluid pt-4 px-4">

    <div class="bg-light text-center rounded p-4 mt-5">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">User</h6>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Nº</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        $i = 1;
                        while($row = mysqli_fetch_array($result))
                        {
                    ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$row['username']?></td>
                        <td><?=$row['email']?></td>
                        <td>
                            <a href="index.php?p=user.php&id=<?=$row['id']?>&action=4">
                                <span class="fa fa-trash"></span>
                            </a>
                        </td>
                    </tr>
                    <?php
                        $i++;
                        }
                    ?>

                </tbody>
            </table>
        </div>
    </div>