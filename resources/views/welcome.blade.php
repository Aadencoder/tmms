@extends('main')
  @section('content')
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>Teacher Module <b>Management</b></h2>
                        </div>
                        <div class="col-sm-7">
                            <a href="{{URL::to('/')}}/teacher/export" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i> <span>Export to Excel</span></a>   
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTeacherModule">
                              <i class="material-icons">&#xE147;</i>Add Teacher Module
                          </button>

                      </div>
                  </div>
              </div>
              <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Lecturer Name</th>                      
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Nationality</th>
                        <th>DOB</th>
                        <th>Faculty</th>
                        <th>Faculty Module</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teachers as $key=> $teacher)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$teacher->lecturer_name}}</td>
                        <td>{{$teacher->gender->type}}</td>                        
                        <td>{{$teacher->phone}}</td>
                        <td>{{$teacher->email}}</td>
                        <td>{{$teacher->address}}</td>
                        <td>{{$teacher->nationality->name}}</td>
                        <td>{{$teacher->dob}}</td>
                        <td>{{$teacher->faculty->name}}</td>
                        <td>{{$teacher->facultyModule->name}}</td>
                        <td>
                            <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $teachers->links('pagination.default') }}

        </div>
    </div>
</div>    


<!-- Add Teacher Modal -->
<div class="modal fade" id="addTeacherModule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      <div class="signup-form"> 
        <form action="{{URL::to('/')}}/teacher/create" method="post" enctype="multipart/form-data" id="addTeacherModuleForm" >
            {{-- novalidate="novalidate" --}}
            {{ csrf_field() }}
            <h3>Create Teacher Module</h3>
            <p class="lead">All fields are compulsary</p>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name="lecturer_name" placeholder="Lecturer Name" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                    <input type="email" class="form-control" name="email" placeholder="Email Address" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="text" class="form-control" name="phone" placeholder="Phone Number" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                    <input type="text" class="form-control" name="address" placeholder="Address" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <label for="nationality"><i class="fa fa-globe"></i></label>
                    <select class="form-control" id="nationality" name="nationality_id" required="required">
                      <option value="">Select Nationality</option>
                      @foreach($nationalities as $nationality)
                      <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                      @endforeach
                  </select>
              </div>
          </div>
          <div class="form-group">
            <div class="input-group">
                <input type="date" class="form-control" name="dob" placeholder="Date of birth" required="required">
            </div>
        </div>
        <div class="form-group">
           <div class="input-group">
               <label for="faculties"><i class="fa fa-bank"></i></label>
               <select class="form-control" id="faculties" name="faculty_id" required="required">
                <option value="">Select Faculty</option>
                @foreach($faculties as $faculty)
                <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="form-group">
       <div class="input-group">
           <label for="facultyModules"><i class="fa fa-archive"></i></label>
           <select class="form-control" id="facultyModules" name="faculty_module_id" required="required">
        </select>
    </div>
</div>
<div class="form-group">
    <label for="gender">Gender</label>
    <div class="input-group">
        @foreach($genders as $gender)
        <div class="form-check-inline">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="gender_id" value="{{$gender->id}}" required="required">{{$gender->type}}
        </label>
    </div>
    @endforeach
</div>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary btn-block btn-lg">Submit</button>
</div>
</form>
</div>
</div>

</div>
</div>
</div>
  @endsection