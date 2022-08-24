@extends('layouts.master')
@section('content')

<div class="container"> 
    <div class="row">
        <div class="col-md-6">
            <input type="text" name="text_search" id="text_search" class="form-control" placeholder="Search" value="">
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
        function load_data(text_search_query = '')
        {
            var _token = $("input[name=_token]").val();
            $.ajax({
                url:"{{ route('text_search.action') }}",
                method:"POST",
                data:{text_search_query:text_search_query, _token:_token},
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
            var text_search_query = $('#text_search').val();
            load_data(text_search_query);
        });
    });
</script>
@endsection