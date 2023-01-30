<?php

if(isset($_GET['action']))
{
    $action = $_GET['action'];

    switch($action)
    {
        case "4":
            {
                $id = $_GET['id'];
                $sql = "SELECT img FROM tbl_member WHERE id = '$id'";
                $result = mysqli_query($connect,$sql);
                $row = mysqli_fetch_array($result);
                $img = $row['img'];

                $sql = "DELETE FROM tbl_member WHERE id = '$id'";
                mysqli_query($connect,$sql);
                unlink ("../../Client/images/Member/$img");
                unlink ("../../Client/images/Member/thumbnail/$img");
                break;
            }
        
        case "5":
            {
                $id = $_POST['ssid'];
                $name = $_POST['txtname'];
                $position = $_POST['txtposition'];
                $address = $_POST['txtaddress'];
                $contact = $_POST['txtcontact'];
                $img = $_POST['oldimg'];

                if(isset($_FILES['imgfile']))
                {
                    $extension = pathinfo($_FILES["imgfile"]["name"], PATHINFO_EXTENSION);

                    if($extension == 'jpg')
                    {   
                        
                        $newimg = floor(microtime(true) * 1000) . "." . $extension;
                        move_uploaded_file($_FILES['imgfile']['tmp_name'],  "../../Client/images/Member/" . $newimg);
                        $thumbnail = resize_image("../../Client/images/Member/" . $newimg,50,50);
                        imagejpeg($thumbnail, "../../Client/images/Member/thumbnail/" . $newimg);

                        unlink("../../Client/images/Member/$img");
                        unlink("../../Client/images/Member/thumbnail/$img");
                        $img = $newimg;
                    }
                }

                $sql = "UPDATE tbl_member SET name='$name',position='$position',address='$address',img='$img'
                        ,Contact='$contact' WHERE id='$id'";
                mysqli_query($connect,$sql);
                break;
            }

        case "6":
            {
                $name = $_POST['txtname'];
                $position = $_POST['txtposition'];
                $address = $_POST['txtaddress'];
                $contact = $_POST['txtcontact'];

                $sql = "SELECT ordernum+1 AS newordernum FROM tbl_member ORDER BY ordernum DESC LIMIT 1";
                $result = mysqli_query($connect,$sql);
                $row = mysqli_fetch_array($result);
                $newordernum = $row['newordernum'];
                
                $img = "";

                if(isset($_FILES['imgfile']))
                {
                    $extension = pathinfo($_FILES["imgfile"]["name"], PATHINFO_EXTENSION);

                    if($extension == 'jpg')
                    {
                        $img = floor(microtime(true) * 1000) . "." . $extension;
                        move_uploaded_file($_FILES['imgfile']['tmp_name'],  "../../Client/images/Member/" . $img);
                        $thumbnail = resize_image("../../Client/images/Member/" . $img,50,50);
                        imagejpeg($thumbnail, "../../Client/images/Member/thumbnail/" . $img);
                    }
                }

                if($img == "")
                {
                    echo "
                    
                    <script>
                        alert('Only jpg file are allow');
                    </script>
                    
                    ";
                }
                else{
                    $sql = "INSERT INTO tbl_member (name,position,address,Contact,img,ordernum)
                        VALUES('$name','$position','$address','$contact','$img',$newordernum)";
                    mysqli_query($connect,$sql);
                }
                break;
            }
    }
}

$sql = "SELECT * FROM tbl_member ORDER BY ordernum ASC";
$result = mysqli_query($connect,$sql);


?>

<div class="container-fluid pt-4 px-4">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaladd">
        Add Member
    </button>

    <div class="bg-light text-center rounded p-4 mt-5">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Member</h6>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Nº</th>
                        <th scope="col">Img</th>
                        <th>Name</th>
                        <th>Positon</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=1;
                        while($row = mysqli_fetch_array($result))
                        {
                    ?>
                    <tr>
                        <td id="id<?=$row['id']?>" data-value="<?=$row['id']?>"><?=$i?></td>
                        <td id="img<?=$row['id']?>" data-value="<?=$row['img']?>"><img src="../../Client/images/Member/thumbnail/<?=$row['img']?>" alt="" ></td>
                        <td id="name<?=$row['id']?>" data-value="<?=$row['name']?>"><?=$row['name']?></td>
                        <td id="position<?=$row['id']?>" data-value="<?=$row['position']?>"><?=$row['position']?></td>
                        <td id="address<?=$row['id']?>" data-value="<?=$row['address']?>"><?=$row['address']?></td>
                        <td id="contact<?=$row['id']?>" data-value="<?=$row['Contact']?>"><?=$row['Contact']?></td>
                        <td>
                            <a href="index.php?p=member.php&id=<?=$row['id']?>&action=4">
                                <span class="fa fa-trash"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-pen" data-toggle="modal" data-target="#modaledit" onclick="load(<?=$row['id']?>)"></span>
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

<!-- Modal -->
<div class="modal fade" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="index.php?p=member.php&action=6" method="Post" enctype= multipart/form-data>

            <div class="form-group">
                <label for="txttitle">Member Name</label>
                <input type="text" class="form-control" id="txttitle" name="txtname" placeholder="Name">
            </div>

            <br>

            <div class="form-group">
                <label for="txtauthor">Position</label>
                <input type="text" class="form-control" id="txtauthor" name="txtposition" placeholder="Position">
            </div>

            <br>

            <div class="form-group">
                <label for="txtposition">Address</label>
                <input type="text" class="form-control" id="txtauthor" name="txtaddress" placeholder="Address">
            </div>

            <br>

            <div class="form-group">
                <label for="txtdate">Contact</label>
                <input type="text" class="form-control" id="txtdate" name="txtcontact" placeholder="Contact">
            </div>

            <br>

            <div class="form-group">
                <label for="imgfile">Image</label>
                <input type="file" class="form-control" id="imgfile" name="imgfile" placeholder="Another input">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">ADD</button>
            </div>

        </form>

      </div>
      
    </div>
  </div>
</div>
<!-- Modal -->

</div>

<!-- Modal Edit --> 
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Member</h5>
        <button type="button" class="close" data-dismiss="modaledit" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="index.php?p=member.php&action=5" method="Post" enctype= multipart/form-data>

        <div class="form-group">
                <label for="txttitle">Member Name</label>
                <input type="hidden" class="form-control" id="ssid" name="ssid">
                <input type="text" class="form-control" id="txteditname" name="txtname" placeholder="Name">
            </div>

            <br>

            <div class="form-group">
                <label for="txtauthor">Position</label>
                <input type="text" class="form-control" id="txteditposition" name="txtposition" placeholder="Position">
            </div>

            <br>

            <div class="form-group">
                <label for="txtposition">Address</label>
                <input type="text" class="form-control" id="txteditaddress" name="txtaddress" placeholder="Address">
            </div>

            <br>

            <div class="form-group">
                <label for="txtdate">Contact</label>
                <input type="text" class="form-control" id="txteditcontact" name="txtcontact" placeholder="Contact">
            </div>

            <br>

            <div class="form-group">
                <label for="imgfile">Image</label>
                <input type="file" class="form-control" id="imgfile" name="imgfile" placeholder="Another input">
                <br>
                <img src="" alt="" id="imgedit">
                <input type="hidden" id="oldimg" name="oldimg">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </form>

      </div>
      
    </div>
  </div>

</div>
<!-- Modal Edit -->

<script>

function load(id)
{
    var name = document.getElementById("id"+id).getAttribute("data-value");                 
    document.getElementById("ssid").value = name;
    var name = document.getElementById("name"+id).getAttribute("data-value");                   
    document.getElementById("txteditname").value = name;
    var position = document.getElementById("position"+id).getAttribute("data-value");                   
    document.getElementById("txteditposition").value = position;
    var address = document.getElementById("address"+id).getAttribute("data-value");                 
    document.getElementById("txteditaddress").value = address;
    var contact = document.getElementById("contact"+id).getAttribute("data-value");                 
    document.getElementById("txteditcontact").value = contact;
    var img = document.getElementById("img"+id).getAttribute("data-value");
    document.getElementById("imgedit").src = "../../Client/images/Member/thumbnail/" + img;
    document.getElementById("oldimg").value = img;
}

</script>
