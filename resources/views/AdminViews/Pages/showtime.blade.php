<div class="page-wrapper dashboard-wrap">
    <div class="content container-fluid">
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2><i class="fa-solid fa-file-signature"></i>  Showtime <b>Details</b>      
                            <br><br> <button class="btn btn-primary ">
                        <a href="./showtime/create" style="color: white"><i class="fa-solid fa-user-plus"></i>  Add new Showtime</a>    
                        </button></h2>
                    </div>
                    <div class="col-sm-4">
                        <div class="search-box">+
                            <form action="#">
                                <i class="material-icons">&#xE8B6;</i>
                                <input type="text" class="form-control" placeholder="Search&hellip;">
                          
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Start <i class="fa fa-sort"></i></th>
                        <th>End <i class="fa fa-sort"></i></th>
                        <th>Movie_Id <i class="fa fa-sort"></i></th>
                        <th>Cinema_Id <i class="fa fa-sort"></i></th>
                        <th>Room_Id <i class="fa fa-sort"></i></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($danhsach as $Showtime)
                 <tr>
                 
                     <td>
                        {{$Showtime->Id}}
                     </td>
                     <td>
                        {{$Showtime->Start}}
                     </td>
                     <td>
                        {{$Showtime->End}}
                     </td>
                     <td>
                        {{$Showtime->Movie_Id}}
                     </td>
                     <td>
                        {{$Showtime->Cinema_Id}}
                     </td>
                     <td>
                        {{$Showtime->Room_id}}  {{--hangcsdl--}}
                     </td>
                     
                     
                     <td>
                        <a href="/admin/showtime/show/{{$Showtime->Id}}" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                        <a href="/admin/showtime/edit/{{$Showtime->Id}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a href="/admin/showtime/delete/{{$Showtime->Id}}" onclick="return confirm('Your sure delete ')" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
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
 
 