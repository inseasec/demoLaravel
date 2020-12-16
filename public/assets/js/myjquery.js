$(document).ready(function(){
    formsubmit();
    showdata();
    editdata();
    deletedata();
});

// insert data ajax

function formsubmit(){

    $('#submit').on('click',function(){

        var name = $('#name').val();
        var email = $('#email').val();
        var number = $('#number').val();
        var password = $('#password').val();
        // alert(password);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // alert(password);
        $.ajax({
            url:'../user/insertdata',
            type:'POST',
            data:{
                name:name,
                email:email,
                number:number,
                password:password,
            },
            success:function ( response ) {
            // alert(response);
    
                if(response.success){
                  alert(response.message)
                  $('#exampleModal').modal('hide');
                  $('#table').append(response['row']);
                  $('#mycustomers').trigger("reset");
              }else {
                  alert("Error");
              }
                
            }
        });
    });
}


// Show data ajax

function showdata(){
    $.ajax({
        url:'../user/showdata',
        type:'GET',
        datatype:'json',
        headers: {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
        success:function( response ){
          // alert(response);
          $('#table').html(response);
        }
        });
}

// edit data ajax

function editdata(){
    $('body').on('click','.row_edit',function (){
        var row=$(this).data('id');
        // alert(row);
        
        $.ajax({
          method:'GET',
          url:'../user/editdata',
          data:{id:row},
          success:function(response){
            // alert(response);
            if(response){
              $("#upd_id").val(response.id);
              $("#upd_name").val(response.name);
              $("#upd_email").val(response.email);
              $("#upd_number").val(response.number);
              $("#upd_password").val(response.password);
              $('#updateModal').modal('show');
            }
          }
        })
        });
        
        $('#edit').on('click', function(e){
              e.preventDefault();
              var name = $("#upd_name").val();
              var email = $("#upd_email").val();
              var number = $("#upd_number").val();
              var password = $("#upd_password").val();
              // alert(password);
              
              var id= $("#upd_id").val();
              // alert(id);
              $.ajaxSetup({
              headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
              });
        
              $.ajax({
                url:'../user/updatedata',
                type:'POST',
                data:{
                    name:name,
                    email:email,
                    number:number,
                    password:password,
                    id:id
                },
                success:function ( response ) {
                //alert(response);
        
                    if(response.success){
                      alert(response.message)
                      $('#updateModal').modal('hide');
                       $('#table').html(response['row']);
                     // $('#mycustomers').trigger("reset");
                  }else {
                      alert("Error");
                  }
                    
                }
              });
        });
}

// delete data ajax

function deletedata(){
    $('body').on('click','.row_delete',function (){
        var sure = confirm('You really want to delete this data');
        if(sure){
          var id=($(this).data('id'));
      $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
              method:'POST',
              url:'../user/deletedata',
              data:{id:id},
            success:function(response){
              $('#table').html(response);
          }
        });
        }
     
    });
}

