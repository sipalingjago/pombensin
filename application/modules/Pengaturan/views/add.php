<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo $judul; ?> <small style="font-size: 12px;">Tambah</small></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard'); ?>">Home</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url($url); ?>"><?php echo $judul; ?></a></li>
          <li class="breadcrumb-item active">Tambah</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Data <?php echo $judul; ?></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form role="form" method="POST" action="<?php echo site_url($url.'/insert'); ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Jadwal Shift</label>
                <select class="form-control" name="jadwal_shift" required>
                  <option value="">-</option>
                  <option value="06.00-09.00">06.00-09.00</option>
                  <option value="09.00-12.00">09.00-12.00</option>
                  <option value="12.00-15.00">12.00-15.00</option>
                  <option value="15.00-18.00">15.00-18.00</option>
                  <option value="18.00-21.00">18.00-21.00</option>
                  <option value="21.00-23.00">21.00-23.00</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
              <div class="form-group">
        			  <label for="exampleInputEmail1">Hak Akses</label>
                <select name="hak_akses" class="form-control" required>
        				<option value="">-</option>
        				<option value="1">Admin</option>
        				<option value="2">User</option>
                </select>
        			</div>
        			<div class="form-group">
        			  <label for="exampleInputEmail1">Status</label>
        			  <select name="status" class="form-control" required>
        				<option value="">-</option>
        				<option value="1">Aktif</option>
        				<option value="0">Tidak Aktif</option>
        			  </select>
        			</div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <a href="<?php echo site_url($url); ?>" class="btn btn btn-danger">
        			  <i class="fa fa-angle-double-left"></i> Back</a>
      			  <button type="submit" class="btn btn-primary">Simpan</button>
      			  <button type="reset" class="btn btn-warning">Batal</button>
            </div>
          </form>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

<?php
	echo $this->session->flashdata('notif');
	echo $this->session->flashdata('audio');
?>
