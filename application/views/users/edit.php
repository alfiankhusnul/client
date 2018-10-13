<script type="text/javascript">
    function validateForm() {
    	var x = document.getElementById("editForm");
    	for(var i=0; i < x.elements.length; i++){
    		if(x.elements[i].value.trim() == ""){
    			alert(x.elements[i].id+" harus diisi.");
    			return false;
    			break;
    		}
    	}
    }
</script>


<div class="container">

<?php if(!empty($success_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-success"><?php echo $success_msg; ?></div>
    </div>
    <?php }elseif(!empty($error_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
    <?php } ?>
<legend>Edit data</legend>
<?php $attributes = array('id' => 'editForm','onsubmit' => 'return validateForm()');?>
<?php echo form_open('users/edit', $attributes)?>
<?php echo form_hidden('id',$users->id);?>

	<div class="form-group">
	  <label class="col-form-label" for="nama">Nama</label>
	  <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $users->nama;?>">
	</div>
	
	<div class="form-group">
	  <label class="col-form-label" for="dob">Tanggal Lahir</label>
	  <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $users->dob;?>">
	</div>
	
	<div class="form-group">
      <label for="jenis_kelamin">Jenis Kelamin</label>
      <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?php echo $users->jenis_kelamin;?>">
        <option>Laki-laki</option>
        <option>Perempuan</option>
      </select>
    </div>
	
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" id="email"  name="email" aria-describedby="emailHelp"  value="<?php echo $users->email;?>">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
	
	<div class="form-group">
      <label for="alamat">Alamat</label>
      <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo $users->alamat;?></textarea>
    </div>

    <button type="submit" name="submit" id="submit" value="submit" class="btn btn-primary">Simpan</button>
 
<?php echo form_close()?>
</div>