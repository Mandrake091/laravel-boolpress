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
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" @@click="submitForm()">Save changes</button>
      </div>
    </div>
  </div>
</div>

    <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">Crea nuovo tag</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Creation Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr class="text-white">
                    <td><a href="{{ route('admin.tags.show', $tag->id) }}">{{$tag->id}}</a></td>
                    <td><a href="{{ route('admin.tags.show', $tag->name) }}">{{$tag->name}} </a></td>
                    <td></td>
                    <td><a href="{{ route('admin.posts.edit', $tag->id) }}" class="btn btn-primary">Modifica</a></td>
                    <td>
                        <form id="form" action="{{ route('admin.posts.destroy', $tag->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" @@click="openModal($event, {{$tag->id}})" class="btn btn-danger">
                                Elimina
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$tags->links()}}
@endsection
