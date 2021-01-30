
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <div class="card-body">
              <!-- Page Heading -->
              <div class="row">
                <h1 class="h3 mb-4 text-gray-800 col-md-4">
                  Event Management >>
                </h1>
                <div class="text-right offset-md-5 col-md-3">
                  <button
                    type="button"
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#eventModal"
                  >
                    Create New Event
                  </button>
                </div>
              </div>
              <br /><br />

              <div class="table-responsive">
                <table
                  class="table table-bordered"
                  id="dataTable"
                  width="100%"
                  cellspacing="0"
                >
                  <thead>
                    <tr>
                      <th>Nama Event</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Selesai</th>
                      <th>Total Pengunjung</th>
                      <th>Total Area</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>varchar</td>
                      <td>date</td>
                      <td>date</td>
                      <td>int</td>
                      <td>int</td>
                      <td>boolean</td>
                      <td><button class="btn btn-info">Detail</button></td>
                    </tr>
                    <tr>
                      <td>varchar</td>
                      <td>date</td>
                      <td>date</td>
                      <td>int</td>
                      <td>int</td>
                      <td>boolean</td>
                      <td><button class="btn btn-info">Detail</button></td>
                    </tr>
                    <tr>
                      <td>varchar</td>
                      <td>date</td>
                      <td>date</td>
                      <td>int</td>
                      <td>int</td>
                      <td>boolean</td>
                      <td><button class="btn btn-info">Detail</button></td>
                    </tr>
									</tbody>
									<tfoot>
                    <tr>
                      <th>Nama Event</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Selesai</th>
                      <th>Total Pengunjung</th>
                      <th>Total Area</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- event modal -->
    <div
      class="modal fade"
      id="eventModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Buat Event Baru</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="offset-md-1 col-md-10">
								<div class="form-group">
									<label class="bmd-label-floating text-gray-800">Nama Event</label>
									<input type="email" class="form-control is-invalid" id="exampleInputEmail1" aria-describedby="emailHelp"/>
								</div>
              </div>
              <div class="offset-md-1 col-md-5">
								<div class="form-group">
									<label class="bmd-label-floating text-gray-800">Tanggal Mulai</label>
									<input type="email" class="form-control is-invalid" id="exampleInputEmail1" aria-describedby="emailHelp"/>
								</div>
              </div>
              <div class="col-md-5">
								<div class="form-group">
									<label class="bmd-label-floating text-gray-800">Tanggal Selesai</label>
									<input type="email" class="form-control is-invalid" id="exampleInputEmail1" aria-describedby="emailHelp"/>
								</div>
              </div>
              <div class="offset-md-1 col-md-10">
								<div class="form-group fieldGroup">
									<label class="bmd-label-floating text-gray-800">Area</label>
									<div class="input-group">
										<input type="text" name="username[]" class="form-control is-invalid" placeholder="Masukkan Nama Area"/>
										<input type="text" name="email[]" class="form-control is-invalid" placeholder="Masukkan Nama Petugas"/>
										<div class="input-group-addon ml-3">
											<a href="javascript:void(0)" class="btn btn-success addMore"><i class="fas fa-plus"></i></a>
										</div>
									</div>
								</div>
                <div class="form-group fieldGroupCopy" style="display: none">
                  <div class="input-group">
                    <input type="text" name="username[]" class="form-control is-invalid" placeholder="Masukkan Nama Area"/>
                    <input type="text" name="email[]" class="form-control is-invalid" placeholder="Masukkan Nama Petugas"/>
                    <div class="input-group-addon">
                      <a href="javascript:void(0)" class="btn btn-danger remove"><i class="fas fa-trash"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Cancel
            </button>
            <button type="button" class="btn btn-primary">Create</button>
          </div>
        </div>
      </div>
		</div>
		
    <script>
      $(document).ready(function () {
        // membatasi jumlah inputan
        var maxGroup = 10;

        //melakukan proses multiple input
        $(".addMore").click(function () {
          if ($("body").find(".fieldGroup").length < maxGroup) {
            var fieldHTML =
              '<div class="form-group fieldGroup">' +
              $(".fieldGroupCopy").html() +
              "</div>";
            $("body").find(".fieldGroup:last").after(fieldHTML);
          } else {
            alert("Maximum " + maxGroup + " groups are allowed.");
          }
        });

        //remove fields group
        $("body").on("click", ".remove", function () {
          $(this).parents(".fieldGroup").remove();
        });
      });
    </script>
