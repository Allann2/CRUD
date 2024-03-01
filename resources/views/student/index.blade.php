@extends('dashboard')

    @section('content')

    <!-- //sa add -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>  
    @endif

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStudentModal">Add Student</button>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>age</th>
                <th>phone</th>
                <th>Grades</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($studentList as $student)
            <tr>
                <td>{{  $student->id }}</td>
                <td>{{  $student->name }}</td>
                <td>{{  $student->address }}h</td>
                <td>{{  $student->email }}</td>
                <td>{{  $student->age }}</td>
                <td>{{  $student->phone }}</td>
                <td>
                   
                        <form method="POST" action="{{ route('subject.index') }}">
                     <div class="form-group">
                         <input type="submit" class="btn btn-danger delete-user" value="Subject">
                    </div>
                         </form>
                </td>
                <td>
                   
                        <form method="POST" action="{{ route('student.destroy', $student->id) }}">
                        {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                     <div class="form-group">
                         <input type="submit" class="btn btn-danger delete-user" value="Delete user">
                    </div>
                         </form>
                </td>
            </tr>  
            @endforeach 
        </tbody>
        <tfoot>
         <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>age</th>
                <th>phone</th>
                <th>Grades</th>
                <th>Action</th>
                
            </tr>
        </tfoot>
    </table>

    <!-- MODAL FORM OFR ADDING -->
                <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('student.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <input type="number" class="form-control" id="age" name="age" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Student</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection




