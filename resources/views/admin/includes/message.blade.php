               <h2>List of Messages</h2>
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
                          <th>Full Name</th>
                          <th>Email</th>
                          <th>Show</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($message as $row)
                        <tr>
                          <td>{{$row->firstName. ' '.$row->lastName}}</td>
                          <td>{{$row->email}}</td>
                          <td><a href = "showmessage/{{$row->id}}" >
                            <img src="{{asset('assets/admin/images/edit.png')}}" alt="Show"></a></td>
                          <td><a href="deletemessage/{{$row->id}}" onclick="return confirm('Are you sure you want to delete?')">
                            <img src="{{asset('assets/admin/images/delete.png')}}" alt="Delete"></a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{-- pagination --}}
                    <div class="d-flex justify-content-center">
                     {!! $message->links() !!}
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