<?php

if(isset($_GET['action']))
{
    $action = $_GET['action'];

    switch($action)
    {
        case "0":
            {
                $id = $_GET['id'];
                $sql = "UPDATE tbl_book SET active = '0' WHERE id = '$id'";
                mysqli_query($connect,$sql);
                break;
            }

        case "1":
            {
                $id = $_GET['id'];
                $sql = "UPDATE tbl_book SET active = '1' WHERE id = '$id'";
                mysqli_query($connect,$sql);
                break;
            }

        case "4":
            {
                $id = $_GET['id'];
                $sql = "SELECT img FROM tbl_book WHERE id = '$id'";
                $result = mysqli_query($connect,$sql);
                $row = mysqli_fetch_array($result);
                $img = $row['img'];

                $sql = "DELETE from tbl_book WHERE id = '$id'";
                mysqli_query($connect,$sql);
                
                unlink ("../../Client/images/Book/thumbnail/$img");
                unlink ("../../Client/images/Book/Client/$img");
                unlink ("../../Client/images/Book/$img");   
                              
                break;
            }

        case "5":
            {
                $title = $_POST['txttitle'];
                $author = $_POST['txtauthor'];
                $publish = $_POST['txtdate'];
                $category = $_POST['txtcate'];
                $detail = $_POST['txtdetail'];
                $active = "1";
                
                $sql = "SELECT ordernum+1 AS newordernum FROM tbl_book ORDER BY ordernum DESC LIMIT 1";
                $result = mysqli_query($connect,$sql);
                $row = mysqli_fetch_array($result);
                $newordernum = $row['newordernum'];
                $img = "";

                if(isset($_FILES['imgfile']))
                {
                    $extension = pathinfo($_FILES["imgfile"]["name"], PATHINFO_EXTENSION);

                    if($extension == 'jpg' || $extension == 'jpeg')
                    {
                        $img = floor(microtime(true) * 1000) . "." . $extension;
                        move_uploaded_file($_FILES['imgfile']['tmp_name'],  "../../Client/images/Book/" . $img);
                        $thumbnail = resize_image("../../Client/images/Book/" . $img,50,50);
                        imagejpeg($thumbnail, "../../Client/images/Book/thumbnail/" . $img);
                        $client = resize_image("../../Client/images/Book/" . $img,350,350);
                        imagejpeg($client, "../../Client/images/Book/Client/" . $img);
                    }
                }
                
                if($img == "")
                {
                    echo "
                        
                        <script>
                            alert('Only jpg are allowen');
                        </script>
                        
                        ";
                }else{
                    $sql = "INSERT INTO tbl_book (title,author,category,img,publish,detail,ordernum,active)
                            VALUES('$title','$author','$category','$img','$publish','$detail',$newordernum,'$active')";
                    mysqli_query($connect,$sql);
                }
               break;
            }
        
        case "6":
            {
                $id = $_POST['ssid'];
                $title = $_POST['txttitle'];
                $author = $_POST['txtauthor'];
                $publish = $_POST['txtdate'];
                $category = $_POST['txteditcate'];
                $detail = $_POST['txtdetail'];
                $active = "1";

                $img = $_POST['oldimg'];
                
                    if(isset($_FILES['imgfile']))
                    {
                        $extension = pathinfo($_FILES["imgfile"]["name"], PATHINFO_EXTENSION);

                        if($extension == 'jpg' || $extension == 'jpeg')
                        {
                            $newimg = floor(microtime(true) * 1000) . "." . $extension;
                            move_uploaded_file($_FILES['imgfile']['tmp_name'],  "../../Client/images/Book/" . $newimg);
                            $thumbnail = resize_image("../../Client/images/Book/" . $newimg,50,50);
                            imagejpeg($thumbnail, "../../Client/images/Book/thumbnail/" . $newimg);
                            $client = resize_image("../../Client/images/Book/" . $newimg,350,350);
                            imagejpeg($client, "../../Client/images/Book/Client/" . $newimg);

                            unlink("../../Client/images/Book/$img");
                            unlink("../../Client/images/Book/thumbnail/$img");
                            unlink("../../Client/images/Book/Client/$img");
                            $img = $newimg;

                        }
                    }
                


                $sql = "UPDATE tbl_book set title='$title',author='$author',category='$category',img='$img',publish='$publish',detail='$detail',
                                active='$active' WHERE id='$id'";
                mysqli_query($connect,$sql);
                break;
            }
    }
}

$sql = "SELECT * FROM tbl_book ORDER BY ordernum ASC";
$result = mysqli_query($connect,$sql);
$numrow = mysqli_num_rows($result);
$pagenum = ceil($numrow/Itemperpage);
$pg = 1;
$offset = 0;

if(isset($_GET['pg']))
{
    $pg = $_GET['pg'];
    $offset = Itemperpage * ($pg-1);
}

?>

<div class="container-fluid pt-4 px-4">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaladd">
        Add New Book
    </button>

    <div class="bg-light text-center rounded p-4 mt-5">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Book</h6>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Nº</th>
                        <th scope="col">Img</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Category</th>
                        <th>Detail</th>
                        <th scope="col">Publish</th>
                        <th scope="col">Action</th>
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
                        <td id="img<?=$row['id']?>" data-value="<?=$row['img']?>"><img src="../../Client/images/Book/thumbnail/<?=$row['img']?>" alt=""></td>
                        <td id="title<?=$row['id']?>" data-value="<?=$row['title']?>"><?=$row['title']?></td>
                        <td id="author<?=$row['id']?>" data-value="<?=$row['author']?>"><?=$row['author']?></td>
                        <td id="category<?=$row['id']?>" data-value="<?=$row['category']?>"><?=$row['category']?></td>
                        <td id="detail<?=$row['id']?>" data-value="<?=$row['detail']?>"><?=substr($row['detail'],0,15) . "........"?></td>
                        <td id="publish<?=$row['id']?>" data-value="<?=$row['publish']?>"><?=$row['publish']?></td>
                        <td>
                            <a href="index.php?p=dashboard.php&id=<?=$row['id']?>&action=<?=$row['active']=="1"?"0":"1"?>">
                                <span class="<?=$row['active']=="1"?"fa fa-eye":"fa fa-eye-slash"?>"></span>
                            </a>
                            <!-- madaledit -->
                            <a href="#" >
                                <span class="fa fa-pen" data-toggle="modal" data-target="#modaledit" onclick="load(<?=$row['id']?>)"></span>
                            </a>
                            <!-- madaledit -->                         
                            <a href="index.php?p=dashboard.php&id=<?=$row['id']?>&action=4">
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
        
        <form action="index.php?p=dashboard.php&action=5" method="Post" enctype= multipart/form-data>

            <div class="form-group">
                <label for="txttitle">Book Title</label>
                <input type="text" class="form-control" id="txttitle" name="txttitle" placeholder="Book Title">
            </div>

            <br>

            <div class="form-group">
                <label for="txtauthor">Book Author</label>
                <input type="text" class="form-control" id="txtauthor" name="txtauthor" placeholder="Author">
            </div>

            <br>

            <div class="form-group">
               
                <textarea name="txtdetail" id="" cols="55" rows="5" placeholder="Book Detail"></textarea>
            </div>

            <br>

            <div class="form-group">
                <label for="inputState">Category</label>
                <select id="txtcate" name="txtcate" class="form-control">
                    <option selected>Choose...</option>
                    <option value="manga">Manga</option>
                    <option value="novel">Novel</option>
                </select>
            </div>

            <br>

            <div class="form-group">
                <label for="txtdate">Publish Date</label>
                <input type="date" class="form-control" id="txtdate" name="txtdate" placeholder="Another input">
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

<!-- Modal Edit -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="index.php?p=dashboard.php&action=6" method="Post" enctype= multipart/form-data>

            <div class="form-group">
                <input type="hidden" class="form-control" id="ssid" name="ssid" value="">
                <label for="txttitle">Book Title</label>
                <input type="text" class="form-control" id="txtedittitle" name="txttitle" placeholder="Book Title">
            </div>

            <br>

            <div class="form-group">
                <label for="txtauthor">Book Author</label>
                <input type="text" class="form-control" id="txteditauthor" name="txtauthor" placeholder="Author">
            </div>

            <br>

            <div class="form-group">
               
                <textarea name="txtdetail" id="txteditdetail" cols="55" rows="5" placeholder="Book Detail"></textarea>
            </div>

            <br>

            <div class="form-group">
                <label for="inputState">Category</label>
                <select id="txteditcate" name="txteditcate" class="form-control">
                    <option selected>Choose...</option>
                    <option value="manga">Manga</option>
                    <option value="novel">Novel</option>
                </select>
            </div>

            <br>

            <div class="form-group">
                <label for="txtdate">Publish Date</label>
                <input type="date" class="form-control" id="txteditdate" name="txtdate" placeholder="Another input">
            </div>

            <br>

            <div class="form-group">
                <label for="imgfile">Image</label>
                <input type="file" class="form-control" id="imgfile" name="imgfile" placeholder="Another input">
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

</div>

<script>

function load(id)
{

    var ssid = document.getElementById("id"+id).getAttribute("data-value");
    document.getElementById("ssid").value = ssid;
    var title = document.getElementById("title"+id).getAttribute("data-value");
    document.getElementById("txtedittitle").value = title;
    var author = document.getElementById("author"+id).getAttribute("data-value");
    document.getElementById("txteditauthor").value = author;
    var detail = document.getElementById("detail"+id).getAttribute("data-value");
    document.getElementById("txteditdetail").value = detail;
    var category = document.getElementById("category"+id).getAttribute("data-value");
    document.getElementById("txteditcate").value = category;
    var publish = document.getElementById("publish"+id).getAttribute("data-value");
    document.getElementById("txteditdate").value = publish;
    var img = document.getElementById("img"+id).getAttribute("data-value");
    document.getElementById("imgedit").src = "../../Client/images/Book/thumbnail/" + img;
    document.getElementById("oldimg").value = img;
}

</script>