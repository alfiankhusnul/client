<script type="text/javascript">
    function validateForm() {
    	var x = document.getElementById("createForm");
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
<legend>Masukkan Entry Baru</legend>
<?php $attributes = array('id' => 'createForm','onsubmit' => 'return validateForm()');?>
<?php echo form_open_multipart('users/create', $attributes)?>
	<div class="form-group">
	  <label class="col-form-label" for="nama">Nama</label>
	  <input type="text" class="form-control" placeholder="Default input" id="nama" name="nama">
	</div>
	
	<div class="form-group">
	  <label class="col-form-label" for="dob">Tanggal Lahir</label>
	  <input type="date" class="form-control" id="dob" name="dob">
	</div>
	
	<div class="form-group">
      <label for="jenis_kelamin">Jenis Kelamin</label>
      <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
        <option>Laki-laki</option>
        <option>Perempuan</option>
      </select>
    </div>
	
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" id="email"  name="email" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
	
	<div class="form-group">
      <label for="alamat">Alamat</label>
      <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
    </div>

    <button type="submit" name="submit" id="submit" value="submit" class="btn btn-primary">Submit</button>
<?php echo form_close()?>
</div>