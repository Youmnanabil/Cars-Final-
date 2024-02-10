                    <h2>List of Cars</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Price</th>
                          <th>Active</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      @foreach($car as $row)
                      <tbody>
                        <tr>
                          <td>{{ $row->title}}</td>
                          <td>{{ $row->price}}</td>
                          <td>{{ $row->active ? "Yes" : "No" }}</td>
                          <td><a href = "editcar/{{$row->id}}" >
                            <img src="{{asset('assets/admin/images/edit.png')}}" alt="Edit"></a></td>
                          <td><a href="deletecar/{{$row->id}}" onclick="return confirm('Are you sure you want to delete?')">
                            <img src="{{asset('assets/admin/images/delete.png')}}" alt="Delete"></a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{-- pagination --}}
                    <div class="d-flex justify-content-center">
                    {!! $car->links() !!}
                  </div> 
                  </div>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  <!-- /page content -->

