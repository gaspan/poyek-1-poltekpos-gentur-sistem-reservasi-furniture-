<!DOCTYPE html> 
<html >
  <head>
    <meta charset="UTF-8">
    <title>Registration</title>
    
    
    
    
        <link rel="stylesheet" href="css/style.css">
 
    
    
    
  </head>

  <body>

    <!DOCTYPE html>
<head>
  <link href='css/bootstrap.min.css' rel='stylesheet' type='text/css'>
  <link href='css/datepicker.min.css' rel='stylesheet' type='text/css'>
  <link href='css/bootstrap-switch.css' rel='stylesheet' type='text/css'>
  <link href='http://davidstutz.github.io/bootstrap-multiselect/css/bootstrap-multiselect.css' rel='stylesheet' type='text/css'>
  <script src='jquery/jquery.min.js' type='text/javascript'></script>
  <script src='js/bootstrap.min.js' type='text/javascript'></script>
  <script src='js/bootstrap-datepicker.min.js' type='text/javascript'></script>
  <script src='js/bootstrap-switch.min.js' type='text/javascript'></script>
  <script src='http://davidstutz.github.io/bootstrap-multiselect/js/bootstrap-multiselect.js' type='text/javascript'></script>
</head>
<body>
  <div class='container'>
    <div class='panel panel-primary dialog-panel'>
      <div class='panel-heading'>
        <h5>Registrasi Customer PT INDO POLA FURNITURE</h5>
      </div>  
      <div class='panel-body'>

      <script type="text/javascript">
        function validasi_input(form){
          if (form.nama_lengkap.value == ""){
            alert("nama harus diisi!");
            form.nama_lengkap.focus();
            return (false);
          }else if(form.alamat.value == ""){
           alert("alamat harus diisi!");
            form.alamat.focus();
            return (false);
          }else if(form.no_hp.value == ""){
           alert("nomor hp harus diisi!");
            form.no_hp.focus();
            return (false);
          }else if (form.no_hp.value != ""){
            var x = (form.no_hp.value);
            var status = true;
            var list = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
            for (i=0; i<=x.length-1; i++)
            {
            if (x[i] in list) cek = true;
            else cek = false;
           status = status && cek;
            }
            if (status == false){
            alert("Telp harus angka!");
            form.no_hp.focus();
            return (false);  
          }else if (form.no_hp.value.length < 10){
            alert("Panjang nomer hp Minimal 10 Karater!");
            form.no_hp.focus();
            return (false);
          }else if (form.no_hp.value.length > 12){
            alert("Panjang nomer hp Maximal 12 Karater!");
            form.no_hp.focus();
            return (false);
          }else if(form.username.value == ""){
           alert("username harus diisi!");
            form.username.focus();
            return (false);
          }else if(form.password.value == ""){
           alert("password harus diisi!");
            form.password.focus();
            return (false);
          }
        return (true);          
            
          }
        
        }    
      </script>

        <form method="POST" class='form-horizontal' role='form' action="dbpendaftaran.php" 
        onsubmit="return validasi_input(this)">
          <div class='form-group'>
            
            <div class='col-md-2'>
              
            </div>
          </div>
          <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='nama_lengkap'>Nama</label>
            <div class='col-md-4'>
                <div class='form-group internal'>
                  <input class='form-control' id='nama_lengkap' placeholder='nama lengkap' type='text' name="nama_lengkap">
                </div>
              </div>
            <div class='col-md-8'>
              <div class='col-md-2'>
                <div class='form-group internal'>
                 
                </div>
              </div>
              
              
            </div>
          </div>
          <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='alamat'>Alamat</label>
            <div class='col-md-4'>
                <div class='form-group internal'>
                  <input class='form-control' id='alamat' placeholder='Alamat' type='text' name="alamat">
                </div>
              </div>
            <div class='col-md-8'>
              <div class='col-md-2'>
                <div class='form-group internal'>
                 
                </div>
              </div>
              
              
            </div>
          </div>
          <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='no_hp'>Contact</label>
            <div class='col-md-4'>
              <div class='form-group internal'>
                
                  <input class='form-control' id='no_hp' placeholder='Nomor Handphone' type='tel' name="no_hp">
                
              </div>
              
            </div>
          </div>
		  
		  <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='username'>username</label>
            <div class='col-md-4'>
              <div class='form-group internal'>
                
                  <input class='form-control' id='username' placeholder='username' type='text' name="username">
                
              </div>
              
            </div>
          </div>
		  
		  <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='password'>password</label>
            <div class='col-md-4'>
              <div class='form-group internal'>
                
                  <input class='form-control' id='password'  type='password' name="password" placeholder='Password'>
                
              </div>
              
            </div>
          </div>
          
          
          <div class='form-group'>
            <div class='col-md-offset-4 col-md-2'>
              <button class='btn-lg btn-primary' type='submit' name="daftar" value="simpan">Register</button>
            </div>
            <div class='col-md-2'>
              
              <a class="btn btn-danger btn-lg" href="../../" role="button">Kembali</a>


            </div>
          </div>
        </form>
      </div>
<?php
if (isset($_GET['digunakan'])) {
  

?>

      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
         Username sudah digunakan !!!
      </div>
<?php
}
?>

    </div>
  </div>
</body>
    
        <script src="js/index.js"></script>

    
    
   
</html>
