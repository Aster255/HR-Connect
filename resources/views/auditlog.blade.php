<!DOCTYPE html>
<html lang="en">
<head>
    @include('Layout.Head')
    <title>Hr Connect | Audit Log</title>
</head>
<body>
    @include('Layout.NavBarAdmin')

    <div>
        <table>
            <thead class="thead_section">
                <tr>
                    <th>ID</th>
                    <th>Action</th>
                    <th>Auditable type</th>
                    <th>Auditable id</th>
                    <th>Old Values</th>
                    <th>New Values</th>
                    <th>Additional Details</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="body_section">
                @forelse ($auditlogs as $al)
                <tr>
                    <td>{{ $al->id }}</td>
                    <td>{{ $al->action }}</td>
                    <td>{{ $al->auditable_type }}</td>
                    <td>{{ $al->auditable_id }}</td>
                    <td>{{ $al->old_values }}</td>
                    <td>{{ $al->new_values }}</td>
                    <td>{{ $al->additional_details }}</td>
                    <td>{{ $al->updated_at }}</td> <!-- Fixed typo here -->
                    <td><button>View Info</button></td>
                </tr>
                @empty
                <tr>
                    <td colspan="9">No audit logs found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>
