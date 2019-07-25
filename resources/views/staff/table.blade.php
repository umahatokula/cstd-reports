<table class="table datatable" id="staff-table">
    <thead>
        <tr>
            <th>PF</th>
            <th>Full Name</th>
            <th>Role</th>
            <th>Email</th>
            <th>Phone</th>
            <th class="text-center" colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($staff as $staff)
        <tr>
            <td>{!! $staff->pf !!}</td>
            <td>{!! $staff->full_name !!}</td>
            <td>
                @foreach($staff->user->roles as $role)
                {{$role->name}} <br>
                @endforeach
            </td>
            <td>{!! $staff->email !!}</td>
            <td>{!! $staff->phone !!}</td>
            <td class="text-center">
                {!! Form::open(['route' => ['staff.destroy', $staff->id], 'method' => 'delete']) !!}

                <a href="{!! route('staff.show', [$staff->id]) !!}" class='btn btn-info btn-sm'>Details</a>
                <a href="{!! route('staff.edit', [$staff->id]) !!}" class='btn btn-success btn-sm'>Edit</a>
                {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return
                confirm('Are you sure?')"]) !!} {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
