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
          <h1>Winner List</h1>
        </div>
      </div>
      
      <div class="row">
        <div class="col">
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