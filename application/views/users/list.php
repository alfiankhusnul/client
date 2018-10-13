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
    
    
<div class="panel-heading">
		USERS<a href="<?php echo site_url('users/create/'); ?>" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-plus"></span>Tambah</a>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nama</th>
            <th scope="col">DoB</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Email</th>
            <th scope="col">Alamat</th>
            <th scope="col">Option</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($users as $user)
        {
            echo "<tr>
                    <td>$user->id</td>
                    <td>$user->nama</td>
                    <td>$user->dob</td>
                    <td>$user->jenis_kelamin</td>
                    <td>$user->email</td>
                    <td>$user->alamat</td>
                    <td>".anchor('users/edit/'.$user->id, 'Edit')."
                        ".anchor('users/delete/'.$user->id, 'Delete')."
                    </td>
                 </tr>
                ";
        }
        ?>
    </tbody>
</table>
</div>