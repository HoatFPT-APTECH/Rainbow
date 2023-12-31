<div class="page-wrapper dashboard-wrap">
    <div class="content container-fluid">
<div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>Photo <b>Details</b>       <button class="btn btn-primary ">
                                <a href="/admin/photo/create" style="color: white">Add new photo</a>    
                                </button></h2>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Src <i class="fa fa-sort"></i></th>
                                <th>Movie</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($danhsach as $Photo)
                     <tr>
                         <td>
                            {{$Photo->Id}}
                         </td>
                         <td>
                            <div class="avatar-container">
                                <img class="avatar" src="{{$Photo->Src}}"/>
                            </div>
                         </td>
                          <td>
                            {{$Photo->movies->Name}}
                         </td> 
                         <td>
                            <a href="/admin/photo/{{$Photo->Id}}" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                            <a href="/admin/photo/edit/{{$Photo->Id}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="/admin/photo/delete/{{$Photo->Id}}" onclick="confirmDeletion(event,this)" class="detele" title="Delete" data-toggle="tooltip"><i class="material-icons" style="color: red;">&#xE872;</i></a>
                        </td>
                     </tr>
                        @endforeach        
                        </tbody>
                </div>
            </div>  
        </div>  
    </div>
</div>