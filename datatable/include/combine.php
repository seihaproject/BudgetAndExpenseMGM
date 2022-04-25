<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body>
    <?php include('sidebar.php');?>
    <main style="margin-top: 58px;">
                <div class="container pt-4">
                    <div class="row p-3">
                        <div class="col-md-4">
                            <h2>User Management</h2>

                        </div> 
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <button data-bs-target="#modaluser" id="btnadd" data-bs-toggle="modal" class="btn btn-info float-end">Add Record</button>
                        </div>   
                    </div>
                    <hr>
                    <div class="row p-3">
                        <table class="table table-bordered" id="tbl">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Create_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                
    </main>
    

    <!--Modal-->
    <div class="modal" tabindex="-1" id="modaluser">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <form class="p-2" id="userform">
                       <input type="hidden" id="mode" name="mode" value="add"/>
                       <div class="form-group p-3">
                           <label>Name</label>
                           <input type="text" class="form-control" name="name" id="name"/>

                       </div>      
                       <div class="form-group p-3">
                           <label>Email</label>
                           <input type="email" class="form-control" name="email" id="email">

                       </div>      
                                    
                       <div class="form-group p-3">
                           <label>Create At</label>
                           <input type="date" class="form-control" name="created_at" id="created_at">

                       </div>      
                                    
                                         
                       <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="btnsave" class="btn btn-primary">Save changes</button>
                       </div>   
                </form>
                </div>
                <div class="modal-footer">
                  
                </div>
                </div>
            </div>
</div>

<!--Modal Edit-->

<div class="modal" tabindex="-1" id="modaledit">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <form class="p-2" id="userform">
                       <input type="hidden" id="mode" name="mode" value="update"/>
                       <div class="form-group p-3">
                           <label>Name</label>
                           <input type="text" class="form-control" name="name" id="nameedit"/>

                       </div>      
                       <div class="form-group p-3">
                           <label>Email</label>
                           <input type="email" class="form-control" name="email" id="emailedit">

                       </div>      
                                    
                       <div class="form-group p-3">
                           <label>Create At</label>
                           <input type="date" class="form-control" name="created_at" id="creatededit_at">

                       </div>      
                                    
                                         
                       <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="btnupdate" class="btn btn-primary">update</button>
                       </div>   
                </form>
                </div>
                <div class="modal-footer">
                  
                </div>
                </div>
            </div>
</div>

     
    <?php include('footer.php');?>
</body>
</html>
<script>
    $(document).ready(function(){
     
        fetchdata();
     /*
        function fetchdata(){
           var dataTable = $('#tbl').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{url:"fetch.php", type="post"}



        });
                */
          
                function fetchdata(){
                $('#tbl').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": "fetch.php"
        });
        }



    }),
    /*
    $('#btnadd').click(function(){
        $('modal')

    });
    */

    



    $('#userform').submit(function(){
     //   var mode = 
        $.ajax({
            url:'edit-add-delete.php',
            method:'post',
            data:$(this).serialize(),
            success: function(){
                var oTable = $('#tbl').DataTable();
                oTable.fnDraw(false);
                $('#modaluser').modal('hide');
                $('#userform').trigger('reset');


            }


        })



    });
/*

    $('.btn-delete').click(function(){
            alert('test');

    })
*/
$('body').on('click','.btn-delete',function(){
    alert($(this).data('id'));
    var id = $(this).data('id');
    alert('are you sure to delete this record?');
    $.ajax({
        url:'edit-add-delete.php',

        method:'post',
        data:{
            'idSent':id,
            mode:'delete',
        },
        success:function(){
           var oTable = $('#tbl').DataTable();
         oTable.fnDraw(false);
               
       //fetchdata();


        }



    })


});
//return false;
//});
$('body').on('click','.btn-edit',function(){

    alert($(this).data('id'));
    var id = $(this).data('id');
    $.ajax({
        url:'edit-add-delete.php',
        method:'post',
       
        data:{
            'idSent':id,
            'mode':'edit',
        },
      //  dataType :'json',
        success:function(data){
            var result = JSON.parse(data);
           $('#idedit').val(result.id);
            $('#nameedit').val(result.name);
            $('#emailedit').val(result.email);
            $('#creatededit_at').val(result.created_at);
            $('#modaledit').modal('show');
}
            

        });
    });



    






      

            
    
    
</script>