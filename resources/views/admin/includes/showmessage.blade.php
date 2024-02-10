
              </div>
            </div>
 
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <h2>Full Name: {{$message->firstName . ' ' . $message->lastName}}</h2>
                  <br>
                  <h2>Email: {{$message->email}}</h2>
                   <br>
                  <h2>Message Content:</h2>
                  <p>{{$message->message}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->