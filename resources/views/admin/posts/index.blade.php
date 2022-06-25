@extends('layouts.admin')

@section('content')
<div class="modal" id="deleteModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here. @{{postid}}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" @@click="submitForm()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
     <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Crea nuovo post</a>
    <table class="table">
        <thead>
            <tr class="text-white">
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Creation Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr class="text-white">
                    <td><a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->id }}</a></td>
                    <td><a href="{{ route('admin.posts.show', $post->id) }}"> {{ $post->title }}</a></td>
                    <td>{{ $post->created_at }}</td>
                    <td><a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary">Modifica</a></td>
                    <td>
                        <form id="form" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" @@click="openModal($event, {{$post->id}})" class="btn btn-danger">
                                Elimina
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

  </div>
</div>
   
    {{$posts->links()}}
@endsection
