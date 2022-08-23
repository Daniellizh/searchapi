@extends('welcome')
@section('content')
     
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Laravel 9 Import Export Excel to Database Example - ItSolutionStuff.com
        </div>
        <div class="card-body">
            <form action="{{ route('houses.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import House</button>
            </form>
  
            <table class="table table-bordered mt-3">
                <tr>
                    <th colspan="3">
                        Houses
                        <a class="btn btn-warning float-end" href="{{ route('houses.export') }}">Export House</a>
                    </th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>bedrooms</th>
                    <th>bathrooms</th>
                    <th>storeys</th>
                    <th>garages</th>
                    <th>price</th>
                </tr>
                @foreach($houses as $house)
                <tr>
                    <td>{{ $house->id }}</td>
                    <td>{{ $house->name }}</td>
                    <td>{{ $house->bedrooms }}</td>
                    <td>{{ $house->bathrooms }}</td>
                    <td>{{ $house->storeys }}</td>
                    <td>{{ $house->garages }}</td>
                    <td>{{ $house->price }}</td>
                </tr>
                @endforeach
            </table>
  
        </div>
    </div>
</div>
@endsection