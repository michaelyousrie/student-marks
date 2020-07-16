<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/loader.css">
    <link rel="stylesheet" href="/css/app.css">
    <title>Student Marks System</title>
    
</head>
<body>
    <div id="loader">
        <div class="content">
            <div class="loading">
                <p>loading</p>
                <span></span>
            </div>
        </div>
    </div>

    <div class="container" id="wrapper" style="display: hidden">
        <h1 class="ul-title">
            Students
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-student-modal">
                +
              </button>
        </h1>

        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Actions</th>
            </thead>
            <tbody id="students-table">
                {{--  --}}
            </tbody>
        </table>
    </div>

    {{-- New Student Modal --}}
    <div class="modal" tabindex="-1" role="dialog" id="add-student-modal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Student</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                  <label for="new-student-name">Student Name</label>
                  <input type="text" id="new-student-name" class="form-control" placeholder="Name" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary add-student-modal-save">Save changes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      {{-- /New Student Modal --}}

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script src="/js/funcs.js"></script>
    <script src="/js/app.js"></script>
</body>
</html>
