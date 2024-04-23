<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h1>Student List</h1>
    <a href="/students/create" class="btn btn-success btn-sm" title="Add New Student">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Student
    </a>
                        <br/>
                        <br/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <table class="table table-bordered">
        <thead>
           <th>Student ID</th>
           <th>Name</th>
           <th>Faculty</th>
           <th>Email</th>
           <th>Address</th>
           <th>Action</th>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->faculty }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->address }}</td>
                <td>
          
                        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-success btn-sm" title="Edit Student">
                            <i class="fa fa-plus" aria-hidden="true"></i> Edit
                        </a>
                        <a href="{{ route('students.delete', $student->id) }}" class="btn btn-danger btn-sm" title="Delete Student">
                            <i class="fa fa-plus" aria-hidden="true"></i> Delete
                        </a>
          </td>
          
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
  
    
</body>
</html>