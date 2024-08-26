<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>All jobs</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">
  <style>
    * {
      font-family: "Lato", sans-serif;
    }
  </style>
</head>

<body>
  <main>
    <div class="container my-5">
      <div class="bg-light p-5 rounded">
        <h2 class="fw-bold fs-2 mb-5 pb-2">All jobs</h2>
        <table class="table table-hover">
          <thead>
            <tr class="table-dark">
              <th scope="col">title</th>
              <th scope="col">jobnature</th>
              <th scope="col">location</th>
              <th scope="col">dateline</th> 
              <th scope="col">Published</th>
              <th scope="col">categoryname</th>
              
              <th scope="col">show</th>
              <th scope="col">edit</th>
              <th scope="col">delete</th>
             
              
            </tr>
          </thead>
          <tbody>
            @foreach($jobs as $job )
            <tr>
              <td scope="row">{{$job['title']}}</td>
              <td scope="row">{{$job['job_nature']}}</td>
              <td scope="row">{{$job['location']}}</td>
              <td scope="row">{{$job['date_line']}}</td>
              <td>{{($job['published'] == 1) ? "yes" : "no"}}</td>
              <td>{{$job->category->category_name}}</td>
              
              <td><a href="{{route('jobs.show',$job->id)}}">show</a></td>
              <td><a href="{{route('jobs.edit',$job->id)}}">edit</a></td>
              <td>
                <form action="{{ route('jobs.delete', $job['id'])}}" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="submit" value="delete" class="btn btn-link mb-1 p-0 border-0">
                 </form>
            
              </td>

              
             
            </tr>

            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>