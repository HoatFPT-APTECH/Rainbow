<div class="page-wrapper dashboard-wrap">
  <div class="content container-fluid">
<div class="container-xl">
  <div class="table-responsive">
      <div class="table-wrapper">
          <div class="table-title">
              <div class="row">
                  <div class="col-sm-8">
                      <h2>Productor <b>Details</b>       <button class="btn btn-primary ">
                      <a href="./productor/create" style="color: white">Add new Productor</a>
                      </button></h2>
                  </div>
                  <div class="col-sm-4">
                      <div class="search-box">
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
                      <th>Name <i class="fa fa-sort"></i></th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($danhsach as $Productor)
               <tr>
                   <td>{{$Productor->Id}}</td>
                   <td>{{$Productor->Name}}</td>
                   <td>
                      <a href="/admin/productor/{{$Productor->Id}}" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                      <a href="/admin/productor/{{$Productor->Id}}/edit" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                      <a href="/admin/productor/delete/{{$Productor->Id}}" onclick="return confirm('Your sure delete productor has name: {{$Productor->Name}}')" class="detele?id=" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
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

