@extends('master')
@section('content')

<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-conterole="tabpanel">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>APER Reports
                        <div class="btn-actions-pane-right">
                            <div class="nav">
                                <button class="btn-pill btn-wide btn btn-info btn-sm" id="cmd">Print</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                              <table class="table table-bordered" id="content">
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
                                <div id="editor"></div>                     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // var doc = new jsPDF();
    // var specialElementHandlers = {
    //     '#editor': function (element, renderer) {
    //         return true;
    //     }
    // };

    // $('#cmd').click(function () {
    //     doc.fromHTML($('#content').html(), 15, 15, {
    //         'width': 170,
    //             'elementHandlers': specialElementHandlers
    //     });
    //     doc.save('sample-file.pdf');
    // });


    var pdf = new jsPDF('p', 'pt', 'letter');
    pdf.addHTML($('#content')[0], function () {
        pdf.save('Test.pdf');
    });

    $('#cmd').click(function () {
        doc.fromHTML($('#content').html(), 15, 15, {
            'width': 170,
                'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
    });
</script>

@endsection

