@extends('app')
@section('content')
<!-- search box start-->
<div class="row mt-3 ms-4 me-5 text-white">
    <div class="col-12 col-md-3 ms-md-auto ">
        <form id="searchForm" method="POST" action="{{ route('search') }}" class="d-flex" >
            @csrf
            <input class="form-control me-2 border border-dark " name="search" type="search" placeholder="Search" aria-label="Search ">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> 
    </div>                
</div> 
<!-- search box end-->

<!-- table start -->
<div class="row mt-3 ms-4 me-5 ">
    <table class="table">
        <thead class="bg-dark text-white">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Veteran</th>
            </tr>
        </thead>
        <tbody id="tbody">
            @php($i=1)
            @foreach($grandpa as $row)
                <tr id="{{$row->id}}">
                    <td class=" col-3">{{ $i++ }}<i class="fa-solid fa-chevron-down" id="{{ $row->id }}" onclick="grandpa_children(this.id);"></i></td>
                    <td class=" col-3">{{ $row->children_name }}</td>
                    <td class=" col-3">{{ $row->age }}</td>
                    <td class=" col-3">{{ $row->veteran }}</td>
                </tr>
            @endforeach            
        </tbody>
        
    </table> 
    
            {{ $grandpa->links('pagination.pagination-style') }}
        </div>
    
    
</div>
<!-- search box end-->
<script>
    $(document).ready(function() {
        $('#searchForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success:function(data){
                    console.log(data)
                    var i = 1
                    var tbody = ""
                    $.each(data.result, function(key,value){
                        tbody = `<tr id=${value.id}>
                                    <td class=" col-3">${i++}<i class="fa-solid fa-chevron-down" id="${value.id}" onclick="grandpa_children(this.id);"></i></td>
                                    <td class=" col-3">${ value.children_name }</td>
                                    <td class=" col-3">${ value.age }</td>
                                    <td class=" col-3">${ value.veteran }</td>
                                </tr>`
                    });
                    $('#tbody').html(tbody);
                },
                error:function(){}
            });       
        });
    });


    function grandpa_children(grandpa_id) {
        // alert(grandpa_id)
        if ($('i'+'[id='+grandpa_id+']').hasClass('fa-rotate-180')) {
            // alert('yes') 
            $('tr'+'[id='+grandpa_id+']').next().remove();  
            $('i'+'[id='+grandpa_id+']').removeClass("fa-rotate-180");
                    
        } else {
            // alert('false')
            $.ajax({
                type:'GET',            
                dataType:'json',
                url: "/grandpa_child/"+grandpa_id,
                success:function(data){
                    console.log(data.grandpa_child)

                    if (data.grandpa_child.length > 0) {
                        $('i'+'[id='+grandpa_id+']').addClass("fa-rotate-180");

                        var grandpa_child = ""
                        var i = 1
                        $.each(data.grandpa_child, function(key,value){
                            grandpa_child += `<tr id="${value.id}">
                            <td scope="row" class=" col-3">${i++}<i class="fa-solid fa-chevron-down" id="${value.id}" onclick="grandpa_children(this.id);"></i></td>
                            <td class=" col-3">${value.children_name}</td>
                            <td class=" col-3">${ value.age }</td>
                            <td class=" col-3">${ value.veteran }</td>
                        </tr>`
                        });
                        
                        $('tr'+'[id='+grandpa_id+']').after(`<tr>
                        <td colspan="4">
                            <table class="table">
                            <tbody>`+grandpa_child+`</tbody>
                                </table>
                            </td>
                        </tr>`);
                    } else {
                        console.log('no content')                        
                    }                    
                }
            });              
        }                
    }   
</script>
@endsection