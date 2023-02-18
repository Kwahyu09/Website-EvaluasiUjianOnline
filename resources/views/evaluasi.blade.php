@extends('layoutdashboard.main')

@section('container')
    <p>Hallo admin</p>


    <div class="d-flex justify-content-end">
        {{ $post->links() }}
      </div>
@endsection