<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doorprize</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
      <div class="row mb-3">
        <div class="col">
          <h1>Employee List</h1>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <form action="{{ route('employee.import') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="input-group">
              <input type="file" name="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
              <button class="btn btn-success" type="submit" id="inputGroupFileAddon04">Import Employee Data</button>
            </div>
            
            {{-- <input type="file" name="file" class="form-control">

            <br>
            <button class="btn btn-success"><i class="fa fa-file"></i> Import User Data</button> --}}
          </form>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <form action="/employee/delete" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">Delete Employee</button>
          </form>
          <form action="/employee/reset" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-outline-danger">Reset Value</button>
          </form>
        </div>
      </div>
      
      <div class="row">
        <div class="col">
          @session('success')
            <div class="col">
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $value }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endsession
          <table class="table">
            <thead>
              <tr class="table-dark">
                <th scope="col">#</th>
                <th scope="col">NIP</th>
                <th scope="col">Name</th>
                <th scope="col">Position</th>
                <th scope="col">Department</th>
                <th scope="col">Unit</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              @php $i=1; @endphp
              @foreach ($employees as $employee)
              <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $employee->nip }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->position }}</td>
                <td>{{ $employee->department }}</td>
                <td>{{ $employee->unit }}</td>
                <td>{{ $employee->value }}</td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>