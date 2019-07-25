<table class="table" id="divisions-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Department</th>
        <th>Head of Division</th>
            <th class="text-center" colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($divisions as $division)
        <tr>
            <td>{!! $division->name !!}</td>
            <td>{!! ($division->department ? $division->department->name : '') !!}</td>
            <td>{!! ($division->headOfDivision ? $division->headOfDivision->full_name : '') !!}</td>
            <td class="text-center">
                {!! Form::open(['route' => ['divisions.destroy', $division->id], 'method' => 'delete']) !!}
                    <a href="{!! route('divisions.show', [$division->id]) !!}" class='btn btn-info btn-sm'>Details</a>
                    <a href="{!! route('divisions.edit', [$division->id]) !!}" class='btn btn-success btn-sm'>Edit</a>
                    {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
