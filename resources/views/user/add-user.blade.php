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

<form  id="postAddUser1" method="POST" action="{{ route('post.add.user') }}"  class="row m-2 p-2 d-flex flex-column flex-md-row">
                @csrf
                <input type="hidden" id="grandpaId" name="grandpa_id" value="" >
            <!-- <div class="col">   
                <label>ID</label>
                <input type="text" name="id" class="form-control border border-dark" placeholder="Enter ID" disabled>
            </div> -->
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
                <button type="button" id="sp" onclick="addChildren(this, this.id);" class="d-none form-control border border-dark mt-4 btn btn-dark">Add Children</button>
            </div>
        </form>

</div>




<script>
    let counter = 10
// $(document).ready(function() {

    $('#selectgrandpa').on('change', function() {
        var selectedOption = $(this).val();
        // Perform some action based on the selected option
        console.log('Selected option: ' + selectedOption);   
        
        $('#grandpaId').val(selectedOption);
    });
    

    
// });

// document.querySelector('.ac').addEventListener('click',()=>{
//       var newNode = document.createElement("div");
//       var referenceNode = document.querySelector('.ac');
//       referenceNode.appendChild(newNode);
// });

    function addChildren(button, id){
        console.log('btn id: '+ id)
       console.log('addchild');
    //    var listItem = document.createElement("li");
        // Get the closest form element to the clicked button
        const form = button.closest('form');

        // Get the form ID
        const formId = form.id;  
        console.log(formId)  
        
        const child_id = "postAddUser" + counter++;
        console.log('form child id: '+  child_id)

        $('#'+formId).append(`<form  id="${child_id}" method="POST" action="{{ route('post.add.user') }}" class="row m-2 p-2 d-flex flex-column flex-md-row">
                @csrf
                <input type="hidden" name="grandpa_id" value="${id}" >
           
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
                <button type="button" id="sp" onclick="addChildren(this, this.id);" class="d-none form-control border border-dark mt-4 btn btn-dark">Add Children</button>
            </div>
        </form>`);

        $('#'+child_id).on('submit', function(event){
         console.log(child_id);
            event.preventDefault(); // Prevent the form from submitting via the browser
             //const firstParent = $(this).parentNode;
             //console.log(firstParent);
            $.ajax({
                url: $(this).attr('action'), // Use the Laravel route URL
                type: $(this).attr('method'), // Use the POST method
                data: $(this).serialize(), // Pass the form data
                success: function(response) {
                    console.log(response); // Handle the server response
                    // $(this + "#sp" ).removeClass("d-none");
                    $('#'+child_id+' #sp').removeClass("d-none");
                    $('#'+child_id+' #sp').attr("id", response.id);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Error: ' + textStatus + ' ' + errorThrown); // Handle the AJAX error
                }
            });
        });
        
        // $.ajax({
        //     url:  $('#'+formId).attr('action'), // Use the Laravel route URL
        //     type: $('#'+formId).attr('method'), // Use the POST method
        //     data: $('#'+formId).serialize(), // Pass the form data
        //     success: function(response) {
        //         console.log(response); // Handle the server response
        //     },
        //     error: function(jqXHR, textStatus, errorThrown) {
        //         console.log('Error: ' + textStatus + ' ' + errorThrown); // Handle the AJAX error
        //     }
        // });
    }

    $('#postAddUser1').on('submit', function(event){
        event.preventDefault(); // Prevent the form from submitting via the browser

        $.ajax({
            url: $(this).attr('action'), // Use the Laravel route URL
            type: $(this).attr('method'), // Use the POST method
            data: $(this).serialize(), // Pass the form data
            success: function(response) {
                console.log(response); // Handle the server response
                
                $("#postAddUser1 #sp").removeClass("d-none");
                $("#postAddUser1 #sp").attr("id", response.id);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error: ' + textStatus + ' ' + errorThrown); // Handle the AJAX error
            }
        });
    });
</script>

@endsection