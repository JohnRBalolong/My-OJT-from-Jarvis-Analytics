@extends('studentInfo.layout')
@include('partials.navbar')
@section('content')
<style>

</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">



    <div class="container" >
        <div class="row">
 
            <div class="col-md-9" style="width: 1000px;">
                <div class="card">
                    <div class="card-header">
                        <h2>PhoneBooks</h2>
                    </div>
                    <div class="card-body">
                    <button style="color: black;"  type="button" value="" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                                          Add New
</button>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Course</th>
                                        <th>Address</th>
                                        <th>Mobile</th>
                                        <th>Actions</th>
                                     
                                    </tr>
                                </thead>
                            <tbody id="student-table-body">

                            </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


<!-- Add Student Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStudentModalLabel">Add New Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     
            </div>
            <div class="modal-body">
                <form id="addStudentForm">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="course">Course</label>
                        <input type="text" class="form-control" id="course" name="course" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <button type="submit" class="btn btn-primary m-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Delete Student Modal -->
<div class="modal fade" id="deleteStudentModal" tabindex="-1" role="dialog" aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteStudentModalLabel">Delete Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
         
            <div class="modal-body">
                <p>Are you sure you want to delete this student? <span id="name"></span></p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="deleteStudentButton">Delete</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                
            </div>
        </div>
    </div>
</div>






<!-- Modal to Update student information -->

<div class="modal fade" id="editStudentModal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-modal-label">Edit Student Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="edit-student-form" method="POST">
          @csrf
          @method('PUT')
          <div hidden class="form-group">
            <label for="id">Id</label>
            <input type="text" class="form-control" id="id" name="id">
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="form-group">
            <label for="course">Course</label>
            <input type="text" class="form-control" id="course" name="course">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="tel" class="form-control" id="phone" name="phone">
          </div>
          <button type="submit" class="btn btn-primary m-3">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>





<script src = "https://code.jquery.com/jquery-3.6.0.min.js" > </script>

<script src="{{ asset('js/fetch-students.js') }}"></script>




<script> 
$(document).ready(function() {
    $('#addStudentForm').submit(function(event) {
        event.preventDefault(); // Prevent form submission from refreshing the page
        var formData = $(this).serialize(); // Serialize form data into a query string
        $.ajax({
            url: 'http://127.0.0.1:8000/api/students',
            type: 'POST',
            data: formData,
            success: function(response) {
                // Handle success response
                console.log(response);
    $('#addStudentModal').modal('hide'); // Hide the modal after successful submission
    $('#addStudentForm').trigger("reset"); // Clear the input fields
                // Refresh the table to display the new student
                fetchStudents(); // use this fetch to realod the table data.  //function to fetch and display all students
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.log(xhr.responseText);
            }
        });
    });
});
</script>




