<table class="table" id="departments-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Head of Department</th>
            <th class="text-center" colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($departments as $department)
        <tr>
            <td>{!! $department->name !!}</td>
            <td>{!! $department->headOfDepartment ? $department->headOfDepartment->full_name : '' !!}</td>
            <td class="text-center">
                {!! Form::open(['route' => ['departments.destroy', $department->id], 'method' => 'delete']) !!}
                <a href="{!! route('departments.edit', [$department->id]) !!}" class='btn btn-success btn-sm'>Edit</a> {!!
                Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!} {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
