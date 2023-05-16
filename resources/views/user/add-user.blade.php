@extends('app')
@section('content')
<div class="row m-2 p-2">
    <div class="col-md-3 col-7">
        <select class="form-select border border-dark" id="selectgrandpa">
            <option selected>select grandpa</option>
            @foreach($grandpa as $row)
                <option value="{{ $row->id }}">{{ $row->children_name }}</option>
            @endforeach 
        </select>
    </div>
</div>
<div id="section2">
<form  id="postAddUser1" method="POST" action="{{  route('post.add.user') }}" class="row m-2 p-2 d-flex flex-column flex-md-row">
                @csrf
                <input type="hidden" name="grandpa_id" value="1" >
            <div class="col">
                <label>ID</label>
                <input type="text" name="id" class="form-control border border-dark" placeholder="Enter ID" disabled>
            </div>
            <div class="col">
                <label>Name</label>
                <input type="text" name="children_name" class="form-control border border-dark" placeholder="Enter Name">
            </div>
            <div class="col">
                <label>Age</label>
                <input type="text" name="age" class="form-control border border-dark" placeholder="Enter Age">
            </div>
            <div class="col">
                <label>Veteran</label>
                <input type="text" name="veteran" class="form-control border border-dark" placeholder="Enter Veteran">
            </div>
            <div class="col">
                <button type="submit" class=" form-control border border-dark mt-4 btn btn-primary">save</button>
            </div>
        </form>

</div>




<script>
$(document).ready(function() {

    $('#selectgrandpa').on('change', function() {
    var selectedOption = $(this).val();
    // Perform some action based on the selected option
    console.log('Selected option: ' + selectedOption);

    var section2 = ""
    section2 = `<form  id="postAddUser" class="row m-2 p-2 d-flex flex-column flex-md-row">
                @csrf
                <input type="hidden" name="grandpa_id" value="1" >
            <div class="col">
                <label>ID</label>
                <input type="text" name="id" class="form-control border border-dark" placeholder="Enter ID" disabled>
            </div>
            <div class="col">
                <label>Name</label>
                <input type="text" name="children_name" class="form-control border border-dark" placeholder="Enter Name">
            </div>
            <div class="col">
                <label>Age</label>
                <input type="text" name="age" class="form-control border border-dark" placeholder="Enter Age">
            </div>
            <div class="col">
                <label>Veteran</label>
                <input type="text" name="veteran" class="form-control border border-dark" placeholder="Enter Veteran">
            </div>
            <div class="col">
                <button type="submit" class=" form-control border border-dark mt-4 btn btn-primary">save</button>
            </div>
        </form>`
    $('#section2').html(section2);      
});
    

    $('#postAddUser').on('submit', function(event){
        event.preventDefault(); // Prevent the form from submitting via the browser
        var formData = $(this).serialize();
        console.log(formdata)
        $.ajax({
            url: $(this).attr('action'), // Use the Laravel route URL
            type: $(this).attr('method'), // Use the POST method
            data: $(this).serialize(), // Pass the form data
            success: function(response) {
                console.log(response); // Handle the server response
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error: ' + textStatus + ' ' + errorThrown); // Handle the AJAX error
            }
        });
    });
});
</script>

@endsection