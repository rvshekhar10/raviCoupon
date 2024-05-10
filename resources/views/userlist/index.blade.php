<!-- resources/views/userlist/index.blade.php -->
<h1>User List</h1>

<table>
    <thead>
        <tr>
            <th><a href="?sort_by=firstName&sort_order={{ $sortBy == 'firstName' && $sortOrder == 'asc' ? 'desc' : 'asc' }}">First Name</a></th>
            <th><a href="?sort_by=lastName&sort_order={{ $sortBy == 'lastName' && $sortOrder == 'asc' ? 'desc' : 'asc' }}">Last Name</a></th>
            <!-- Add more columns for sorting if needed -->
        </tr>
    </thead>
    <tbody>
        @foreach($users->data as $user)
            <tr>
                <td>{{ $user->firstName }}</td>
                <td>{{ $user->lastName }}</td>
                <!-- Add more columns if needed -->
            </tr>
        @endforeach
    </tbody>
</table>

{{ $users->meta->pagination }}
