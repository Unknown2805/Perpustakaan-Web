<div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Register</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <form action="{{url('/anggota/register')}}" method="POST">
              @csrf
              <div class="modal-body">
                  <div class="row">
                      <div class="col-6 col-md-6">
                          <label>FullName</label>
                          <input type="text" name="fullname" class="form-control">
                      </div>
                      <div class="col-6 col-md-6">
                          <label>Username</label>
                          <input type="text" name="username" class="form-control">
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-6 col-md-6">
                          <label>Join date</label>
                          <input value="{{ Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control" disabled>
                      </div>
                      <div class="col-6 col-md-6">
                          <label>Role</label>
                          <input value="User" class="form-control" disabled>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-6 col-md-6">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control">
                      </div>
                      <div class="col-6 col-md-6">
                              <label>NIS</label>
                              <input name="nis" class="form-control">
                      </div>
                  </div>                 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Save changes</button>
                </div>
          </form>

      </div>
    </div>
  </div>
