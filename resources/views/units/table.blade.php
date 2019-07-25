<table class="table" id="units-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Department</th>
            <th>Division</th>
            <th>Head of Unit</th>
            <th class="text-center" colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($units as $unit)
        <tr>
            <td>{!! $unit->name !!}</td>
            <td>{!! $unit->division->department ? $unit->division->department->name : '' !!}</td>
            <td>{!! $unit->division ? $unit->division->name : '' !!}</td>
            <td>{!! $unit->unitOfUnit ? $unit->unitOfUnit->full_name : '' !!}</td>
            <td class="text-center">
                {!! Form::open(['route' => ['units.destroy', $unit->id], 'method' => 'delete']) !!}
                <a href="{!! route('units.edit', [$unit->id]) !!}" class='btn btn-success btn-sm'>Edit</a> {!! Form::button('Delete',
                ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"])
                !!} {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
