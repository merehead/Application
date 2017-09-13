<div class="mainPanel">
    <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
          </span>
        Blog
    </h2>
    <table class="table table-striped table-responsive">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Created</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($blogs as $blog)
            <tr>
                <td>{{$blog->id}} </td>
                <td>{{$blog->title}} </td>
                <td>{{$blog->created_at}} </td>
                <td><a class="btn btn-info" href="/admin/blog/edit/{{$blog->id}}">Edit</a>
                    <a class="btn btn-danger" href="/admin/blog/delete/{{$blog->id}}">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$blogs->render()}}
</div>