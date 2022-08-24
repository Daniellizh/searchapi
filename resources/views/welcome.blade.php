@extends('layouts.master')
@section('content')

<div class="container"> 
    <div class="row">
        <div class="col-md-6">
            <input type="text" name="name" id="name" class="form-control" placeholder="name" value="">
            <input type="text" name="bedrooms" id="bedrooms" class="form-control" placeholder="bedrooms" value="">
            <input type="text" name="bathrooms" id="bathrooms" class="form-control" placeholder="bathrooms" value="">
            <input type="text" name="storeys" id="storeys" class="form-control" placeholder="storeys" value="">
            <input type="text" name="garages" id="garages" class="form-control" placeholder="garages" value="">
            <input type="text" name="price" id="price" class="form-control" placeholder="price" value="">
        </div>
        <div class="col-md-2">
            @csrf
            <button type="button" name="search" id="search" class="btn btn-success">Search</button>
        </div>
    </div>
    <br />
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Bedrooms</th>
                    <th>Bathrooms</th>
                    <th>Storeys</th>
                    <th>Garages</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function(){
        load_data('');
        function load_data(name = '', bedrooms = '', bathrooms = '', storeys = '', garages = '', price = '')
        {
            $.ajax({
                url:"{{ route('api.search') }}",
                method:"GET",
                data:{name:name, bedrooms:bedrooms, bathrooms:bathrooms, storeys:storeys, garages:garages, price:price},
                dataType:"json",
                success:function(data)
                {
                    var output = '';
                    if(data.length > 0)
                    {
                        for(var count = 0; count < data.length; count++)
                        {
                            output += '<tr>';
                            output += '<td>'+data[count].name+'</td>';
                            output += '<td>'+data[count].bedrooms+'</td>';
                            output += '<td>'+data[count].bathrooms+'</td>';
                            output += '<td>'+data[count].storeys+'</td>';
                            output += '<td>'+data[count].garages+'</td>';
                            output += '<td>'+data[count].price+'</td>';
                            output += '</tr>';
                        }
                    }else{
                        output += '<tr>';
                        output += '<td colspan="6">No Data Found</td>';
                        output += '</tr>';
                    }
                    $('tbody').html(output);
                }
            });
        }

        $('#search').click(function(){
            var name = $('#name').val();
            var bedrooms = $('#bedrooms').val();
            var bathrooms = $('#bathrooms').val();
            var storeys = $('#storeys').val();
            var garages = $('#garages').val();
            var price = $('#price').val();
            load_data(name, bedrooms, bathrooms, storeys, garages, price);
        });
    });
</script>
@endsection