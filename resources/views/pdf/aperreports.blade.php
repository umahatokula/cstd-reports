
                              <table class="table table-bordered">
                                  <thead>
                                      <tr>
                                          <th class="text-center">#</th>
                                          <th>Staff</th>
                                          <th>APER Score</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($aperPerformance as $report)
                                      <tr>
                                          <td class="text-center" scope="row">{{$loop->iteration}}</td>
                                          <td>{{$report[0]->full_name}}</td>
                                          <td>{{$report[1]}}</td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table> 