<!DOCTYPE html>

<?php
include "connection/koneksi.php";
session_start();
ob_start();
//echo $_SESSION['edit_menu'];
$id = $_SESSION['id_user'];

if(isset ($_SESSION['username'])){
  
  $query = "select * from tb_user natural join tb_level where id_user = $id";

  mysqli_query($conn, $query);
  $sql = mysqli_query($conn, $query);

  $id_sayur = "";
  $nama_sayur = "";
  $nama_pedagang = "";
  $harga = "";
  $stok = "";
  $gambar_sayur = "no_image.png";

  if(isset($_SESSION['edit_menu'])){
    $id = $_SESSION['edit_menu'];
    $query_data_edit = "select * from tb_sayur where id_sayur = $id";
    $sql_data_edit = mysqli_query($conn, $query_data_edit);
    $result_data_edit = mysqli_fetch_array($sql_data_edit);

    $id_sayur = $result_data_edit['id_sayur'];
    $nama_sayur = $result_data_edit['nama_sayur'];
    $nama_pedagang = $result_data_edit['nama_pedagang'];
    $harga = $result_data_edit['harga'];
    $stok = $result_data_edit['stok'];
    $gambar_sayur = $result_data_edit['gambar_sayur'];
  }
 
  while($r = mysqli_fetch_array($sql)){
    
    $nama_user = $r['nama_user'];

?>

<html lang="en">
<head>
<title>Referensi</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="template/dashboard/css/bootstrap.min.css" />
<link rel="stylesheet" href="template/dashboard/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="template/dashboard/css/fullcalendar.css" />
<link rel="stylesheet" href="template/dashboard/css/matrix-style.css" />
<link rel="stylesheet" href="template/dashboard/css/matrix-media.css" />
<link href="template/dashboard/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="template/dashboard/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="entri_referensi.php">Referensi</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome <?php echo $r['nama_user'];?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i><?php echo "&nbsp;&nbsp;".$r['nama_level'];?></a></li>
        <li><a href="logout.php"><i class="icon-key"></i> Keluar</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->

<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar">
  <a href="entri_referensi.php" class="visible-phone">
    <i class="icon icon-tasks"></i> <span>Referensi</span>
  </a>
  <ul>
    <li><a href="beranda.php"><i class="icon icon-home"></i> <span>Beranda</span></a> </li>
    <li class="active"> <a href="entri_referensi.php"><i class="icon icon-tasks"></i> <span>Referensi</span></a> </li>
    <li> <a href="logout.php"><i class="icon icon-sign-out"></i> <span>Logout</span></a> </li>
  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">
      <a href="entri_referensi.php" title="Entri Referensi" class="tip-bottom">
        <i class="icon icon-tasks"></i>
        Referensi
      </a>
      <?php 
      if(isset($_SESSION['edit_menu'])){
      ?>
      <a href="tambah_menu.php" title="Tambah Menu" class="tip-bottom">
        <i class="icon icon-tasks"></i>
        Ubah Detail Menu
      </a>
      <?php 
      } else {
      ?>
      <a href="tambah_menu.php" title="Tambah Menu" class="tip-bottom">
        <i class="icon icon-tasks"></i>
        Tambah Menu
      </a>
      <?php
        }
      ?>
    </div>
  </div>
<!--End-breadcrumbs-->
  
<!--Action boxes-->
  <div class="container-fluid">
    <div class="row-fluid">
    <?php
      if($r['id_level'] == 1 || $r['id_level'] == 3){
    ?>
      <div class="widget-box span6">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-th-large"></i></span>
          <h5>Tambah Menu</h5>
        </div>
        <div class="widget-content" >
          <form action="" method="post" class="form-horizontal" accept-charset="UTF-8" enctype="multipart/form-data">
            <div class="control-group">
              <label class="control-label">Nama Sayuran:</label>
              <div class="controls">
                <?php 
                  if(isset($_SESSION['edit_menu'])){
                ?>
                  <input name="" type="text" value="<?php echo $nama_sayur; ?>" class="span11" placeholder="Nama Sayur" disabled=""/>
                  <input name="nama_sayur" type="hidden" value="<?php echo $nama_sayur; ?>" class="span11" placeholder="Nama Sayur"/>
                <?php
                  } else {
                ?>
                  <input name="nama_sayur" type="text" value="" class="span11" placeholder="Nama Sayur"/>
                <?php
                  }
                ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nama Pedagang:</label>
              <div class="controls">
                <?php 
                  if(isset($_SESSION['edit_menu'])){
                ?>
                  <input name="" type="text" value="<?php echo $nama_pedagang; ?>" class="span11" placeholder="To" disabled=""/>
                  <input name="nama_pedagang" type="hidden" value="<?php echo $nama_pedagang; ?>" class="span11" placeholder="Nama Pedagang"/>
                <?php
                  } else {
                ?>
                  <input name="nama_pedagang" type="text" value="" class="span11" placeholder="Nama Pedagang"/>
                <?php
                  }
                ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Harga / Kg :</label>
              <div class="controls">
                <input name="harga" type="text" value="<?php echo $harga; ?>" class="span11" placeholder="Rupiah" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Stok Persediaan :</label>
              <div class="controls">
                <input name="stok" value="<?php echo $stok; ?>" type="number" class="span11" placeholder="Jumlah Stok" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Gambar Sayur :</label>
              <div class="control-group">
                <div class="controls">
                  <input class="span11" value="" name="gambar" type="file" accept="image/*"  onchange="preview(this,'previewne')"/>
                </div>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label"></label>
              <div class="control-group">
                <div class="controls">
                  <img src="gambar/<?php echo $gambar_sayur;?>" id="previewne" class="rounded border p-1" style="width: 110px;px; height:80px;">
                </div>
              </div>
            </div>
            <div class="form-actions">
              <?php
                if(isset($_SESSION['edit_menu'])){
              ?>
                  <button type="submit" name="ubah_menu" class="btn btn-info"><i class='icon icon-save'></i>&nbsp; Simpan Perubahan</button>
              <?php
                } else {
              ?>
              <button type="submit" name="tambah_menu" class="btn btn-success"><i class='icon icon-plus'></i>&nbsp; Tambahkan</button>
              <?php
                }
              ?>
              <button type="submit" name="batal_menu" class="btn btn-danger"><i class='icon icon-remove'></i>&nbsp; Batalkan</a>
            </div>
          </form>
          <?php
            if(isset($_POST['tambah_menu'])){
              $nama_sayur = $_POST['nama_sayur'];
              $nama_pedagang = $_POST['nama_pedagang'];
              $harga = $_POST['harga'];
              $stok = $_POST['stok'];
              //$gambar = file($_POST['gambar']);

              $direktori = "gambar/";  

              $tmp_name = $_FILES["gambar"]["tmp_name"];
              $name = pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION);
              $nama_baru = $_POST['nama_sayur'].".".$name;
              $nama_baru = $_POST['nama_pedagang'].".".$name;
              move_uploaded_file($tmp_name, $direktori."/".$nama_baru);
              $gambar = $nama_baru;

              //echo $nama_baru;

              if($stok > 0){
                $status_sayur = 'tersedia';
              } else {
                $status_sayur = 'habis';
              }
              //echo "<br>";
              //echo $nama_user . " || " . $username . " || " . $password . " || " . $id_level . " || " . $status;
              //echo "<br></br>";
              $query_tambah_masakan = "insert into tb_sayur values ('','$nama_sayur','$nama_pedagang','$harga','$stok','$status_sayur','$gambar')";
              $sql_tambah_masakan= mysqli_query($conn, $query_tambah_masakan);
              if($sql_tambah_masakan){
                header('location: entri_referensi.php');
              }
            }
            if(isset($_REQUEST['batal_menu'])){
              //echo $_REQUEST['hapus_menu'];
              if(isset($_SESSION['edit_menu'])){
                unset($_SESSION['edit_menu']);
              }
              header('location: entri_referensi.php');
            }

            if(isset($_POST['ubah_menu'])){
              $nama_sayur = $_POST['nama_sayur'];
              $nama_pedagang = $_POST['nama_pedagang'];
              $harga = $_POST['harga'];
              $stok = $_POST['stok'];
              if($stok > 0){
                $status_sayur = 'tersedia';
              } else {
                $status_sayur = 'habis';
              }
              $gbr = $_FILES["gambar"]["name"];

              $query_ubah_masakan = "update tb_sayur set nama_sayur = '$nama_sayur', nama_pedagang = '$nama_pedagang', harga = '$harga', stok = '$stok', status_sayur = '$status_sayur' where id_sayur = '$id_sayur'";;
              $sql_ubah_masakan = mysqli_query($conn, $query_ubah_masakan);

              //$gambar = file($_POST['gambar']);
              if($gbr != "" || $gbr != null){
                $direktori = "gambar/";  

                $tmp_name = $_FILES["gambar"]["tmp_name"];
                $name = pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION);
                $nama_baru = $_POST['nama_sayur'].".".$name;
                unlink('gambar/'.$gambar_sayur);
                move_uploaded_file($tmp_name, $direktori."/".$nama_baru);
                $gambar = $nama_baru;

                $query_ubah_gambar = "update tb_sayur set gambar_sayur = '$gambar' where id_sayur = '$id_sayur'";;
                $sql_ubah_gambar = mysqli_query($conn, $query_ubah_gambar);
              }

              if($sql_ubah_masakan){
                unset($_SESSION['edit_menu']);
                header('location: entri_referensi.php');
              }
            }
          ?>
        </div>
      </div>
      <?php
        }
      ?>
    </div>
<!--End-Action boxes-->    
  </div>
</div>

<script type="text/javascript">
  function preview(gambar,idpreview){
    var gb = gambar.files;
    for (var i = 0; i < gb.length; i++){
      var gbPreview = gb[i];
      var imageType = /image.*/;
      var preview=document.getElementById(idpreview);            
      var reader = new FileReader();
      if (gbPreview.type.match(imageType)) {
        preview.file = gbPreview;
        reader.onload = (function(element) { 
          return function(e) { 
            element.src = e.target.result; 
          }; 
        })(preview);
        reader.readAsDataURL(gbPreview);
      } else{
          alert("Type file tidak sesuai. Khusus image.");
      }
                   
    }    
  }
</script>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> <?php echo date('Y'); ?> &copy; Pasar Senen <a href="#">by Rachmat Iqbal</a> </div>
</div>

<!--end-Footer-part-->

<script src="template/dashboard/js/excanvas.min.js"></script> 
<script src="template/dashboard/js/jquery.min.js"></script> 
<script src="template/dashboard/js/jquery.ui.custom.js"></script> 
<script src="template/dashboard/js/bootstrap.min.js"></script> 
<script src="template/dashboard/js/jquery.flot.min.js"></script> 
<script src="template/dashboard/js/jquery.flot.resize.min.js"></script> 
<script src="template/dashboard/js/jquery.peity.min.js"></script> 
<script src="template/dashboard/js/fullcalendar.min.js"></script> 
<script src="template/dashboard/js/matrix.js"></script> 
<script src="template/dashboard/js/matrix.dashboard.js"></script> 
<script src="template/dashboard/js/jquery.gritter.min.js"></script> 
<script src="template/dashboard/js/matrix.interface.js"></script> 
<script src="template/dashboard/js/matrix.chat.js"></script> 
<script src="template/dashboard/js/jquery.validate.js"></script> 
<script src="template/dashboard/js/matrix.form_validation.js"></script> 
<script src="template/dashboard/js/jquery.wizard.js"></script> 
<script src="template/dashboard/js/jquery.uniform.js"></script> 
<script src="template/dashboard/js/select2.min.js"></script> 
<script src="template/dashboard/js/matrix.popover.js"></script> 
<script src="template/dashboard/js/jquery.dataTables.min.js"></script> 
<script src="template/dashboard/js/matrix.tables.js"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
<?php
  }
} else {
  header('location: logout.php');
}
ob_flush();
?>