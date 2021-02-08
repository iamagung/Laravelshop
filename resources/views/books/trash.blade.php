@extends('layouts.global')

@section('title') Trashed Books @endsection

@section('pageTitle') Trashed Books @endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      @if(session('status'))
        <div class="alert alert-success">
          {{session('status')}}
        </div>
      @endif
 
      <table class="table table-bordered table-stripped">
        <thead>
          <tr>
            <th><b>Cover</b></th>
            <th><b>Title</b></th>
            <th><b>Author</b></th>
            <th><b>Categories</b></th>
            <th><b>Stock</b></th>
            <th><b>Price</b></th>
            <th><b>Action</b></th>
          </tr>
        </thead>
        <tbody>
          @foreach($books as $book)
          <tr>
            <td>
              @if($book->cover)
                <img src="{{asset('storage/' . $book->cover)}}" width="96px"/>
              @endif
            </td>
            <td>{{$book->title}}</td>
            <td>{{$book->author}}</td>
            <td>
              <ul class="pl-3">
                @foreach($book->categories as $category)
                  <li>{{$category->name}}</li>
                @endforeach
              </ul>
            </td>
            <td>{{$book->stock}}</td>
            <td>{{$book->price}}</td>
            <td>
              <form method="POST" action="{{route('books.restore', [$book->id])}}" class="d-inline">
                @csrf
                <input type="submit" value="Restore" class="btn btn-success"/>
              </form>
              <form method="POST" action="{{route('books.delete-permanent', [$book->id])}}" class="d-inline" onsubmit="return confirm('Delete this book permanently?')">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="10">
              {{$books->appends(Request::all())->links()}}
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
@endsection
