<div class="page-wrapper dashboard-wrap">
    <div class="content container-fluid">
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2><i class="fa-solid fa-file-signature"></i>  Role <b>Details</b>      
                            <br><br> <button class="btn btn-primary ">
                        <a href="./role/create" style="color: white"><i class="fa-solid fa-user-plus"></i>  Add new Role</a>    
                        </button></h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name <i class="fa fa-sort"></i></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($danhsach as $Role)
                 <tr>
                 
                     <td>
                        {{$Role->Id}}
                     </td>
                     
                     <td>
                        {{$Role->Name}}
                     </td>
                     <td>
                        <a href="/admin/role/show/{{$Role->Id}}" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                        <a href="/admin/role/edit/{{$Role->Id}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a href="/admin/role/delete/{{$Role->Id}}" onclick="confirmDeletion(event,this)" class="detele" title="Delete" data-toggle="tooltip"><i class="material-icons" style="color: red;">&#xE872;</i></a>
                    </td>
           
                 </tr>
                    @endforeach        
                </tbody>
            </table>
            
        </div>
    </div>  
</div>  
</div>  
</div>  
 
 