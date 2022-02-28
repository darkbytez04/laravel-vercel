@extends ('layouts.app')

@section('content')

  <div class="col-lg-12">
    <div class="row">
      <div class="col-md-9">
        <div class="card">

          <div class="card-header"> 
            <h4 style="float: left">Add User </h4>
            <a href=" #" style="float: right" class="btn btn-light" 
            data-bs-toggle="modal" data-bs-target="#addUser">  
              <i class="fa fa-plus"></i> Add New User  </a>  </div>
            <div class="card-body">
              <table class="table table-bordered table-left">
               <thead>
                 <tr>
                   <th>#</th>
                   <th>Name</th>
                   <th>Email</th>

                   <th>Role</th> 
                   <th>Actions</th> 
                 </tr>
               </thead>
               <tbody>
                 @foreach ($users as $key => $user)

                 <tr>

                  <td> {{ $key+1 }} </td>
                  <td> {{ $user->name }} </td>
                  <td> {{ $user->email }} </td>
                  <td> @if( $user->is_admin == 1) Admin
                    @else Cashier 
                  @endif </td>
                <td>
                  <div class="btn-group">
                    <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" 
                    data-bs-target="#editUser{{ $user->id }}"> <i class="fa fa-edit">
                    </i> Edit </a>
                    <a href="#" data-bs-toggle="modal" 
                    data-bs-target="#deleteUser{{$user->id}}" class="btn btn-sm btn-danger"> 
                    <i class="fa fa-trash">
                    </i> Delete</a>     
                  </div>
                </td>
                 </tr>




                 
                  <!-- Modal Edit User-->
<div class="modal right fade" id="editUser{{ $user->id }}" data-bs-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Edit User</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
        {{ $user->id }}
      </div>
      <div class="modal-body">
       <form action="{{ route ('users.update', $user->id) }}" method="post">
         @csrf
         @method('put')
         <div class="form-group">
           <label for="">Name</label>
           <input type="text" name="name" id="" value=" {{ $user->name }} " class="form-control">
         </div>
         <div class="form-group">
          <label for="">Email</label>
          <input type="text" name="email" id="" value=" {{ $user->email }} " class="form-control">
        </div>
       
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" id="" readonly value=" {{ $user->password }} "  class="form-control">
        </div>
        <!---<div class="form-group">
          <label for="">Confirm Password</label>
          <input type="text" name="password" id="" class="form-control">
        </div> -->
        <div class="form-group">
          <label for="">Role</label>
          <select name="is_admin" id="" class="form-control">
            <option value="1" @if($user->is_admin==1)
              selected
              @endif>Admin</option>
            <option value="2" @if($user->is_admin==2) 
              selected
              @endif>Cashier</option>
          </select>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary btn-block">Update</button>
        </div>
       </form>
      </div>
     <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
    </div>
  </div>
</div>

        <!-- Modal Delete User-->
        <div class="modal right fade" id="deleteUser{{ $user->id }}" data-bs-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Delete User</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
              </div>
              <div class="modal-body">     
               <form action="{{ route('users.destroy', $user->id) }}" method="post">
                 @csrf
                 @method('delete')
                   <p> Are you sure you want to delete this user "{{ $user->name}}" ? </p>
                <div class="modal-footer">
                <button type="submit" class="btn btn-danger" >Submit</button>
                <button type="button" class="btn btn-primary btn-block" data-bs-dismiss="modal">
                    Cancel </button>
                 
                </div>
               </form>
              </div>
             <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
              </div> -->
            </div>
          </div>
        </div>
                 @endforeach
               </tbody>
              </table>
            </div> 
        </div>
        
      </div>
    </div>

  </div>

</div>
<!-- Modal Add User-->
<div class="modal right fade" id="addUser" data-bs-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Add New User</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form action="{{ route ('users.store') }}" method="post">
         @csrf
         <div class="form-group">
           <label for="">Name</label>
           <input type="text" name="name" id="" class="form-control">
         </div>
         <div class="form-group">
          <label for="">Email</label>
          <input type="text" name="email" id="" class="form-control">
        </div>
       
        <div class="form-group">
          <label for="">Password</label>
          <input type="text" name="password" id="" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Confirm Password</label>
          <input type="text" name="password" id="" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Role</label>
          <select name="is_admin" id="" class="form-control">
            <option value="1" >Admin</option>
            <option value="2" >Cashier</option>
          </select>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary btn-block">Save User</button>
        </div>
       </form>
      </div>
     <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
    </div>
  </div>
</div>

 
<style>
  .modal.right .modal-dialog {
  /**  position: absolute; **/
    top: 0;
    right: 0;
    margin-right: 20vh;
  }
  .modal.fade:not(.in).right .modal-dialog{
    -webkit-transform: translate3d(25%,0,0);
    transform: translate3d(25%,0,0);

  }

</style>


  
@endsection
