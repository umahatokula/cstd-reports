<table class="table">
    <thead>
        <tr>
            <th><b>File Number</b></th>
            <th>{{ $staff->pf }}</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="row"><b>Name</td>
            <td>{{ $staff->full_name }}</td>
        </tr>
        <tr>
            <td scope="row"><b>Email</td>
                    <td>{{ $staff->email }}</td>
                </tr>
                <tr>
                    <td scope="row"><b>Phone</td>
                            <td>{{ $staff->phone }}</td>
                        </tr>
        <tr>
            <td scope="row"><b>Username</td>
                                    <td>{{ $staff->username }}</td>
                                </tr>
        <tr>
            <td scope="row"><b>Grade Level</td>
                                    <td>{{ $staff->gradeLevel->name }}</td>
                                </tr>
        <tr>
            <td scope="row"><b>Sign In Identity</td>
                                    <td>
                                    @foreach($staff->user->roles as $role)
                                    {{$role->name}} <br>
                                    @endforeach
                                    </td>
                                </tr>
    </tbody>
</table>
