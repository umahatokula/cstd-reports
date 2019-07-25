<table class="table" id="gradeLevels-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Level</th>
            <th class="text-center" colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($gradeLevels as $gradeLevel)
        <tr>
            <td>{!! $gradeLevel->name !!}</td>
            <td>{!! $gradeLevel->rank !!}</td>
            <td class="text-center">
                {!! Form::open(['route' => ['gradeLevels.destroy', $gradeLevel->id], 'method' => 'delete']) !!}
                {{-- <a href="{!! route('gradeLevels.show', [$gradeLevel->id]) !!}" class='btn btn-info btn-sm'>Details</a> --}}
                <a href="{!! route('gradeLevels.edit', [$gradeLevel->id]) !!}" class='btn btn-success btn-sm'>Edit</i></a>                {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!} {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
