<?= view('header') ?>
<section>
    <h1>Users</h1>

    <?= view('messages') ?>

    <a href="/create">Add user</a>
    <table>
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Date of birth</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td> <?= $user['first_name'] ?> </td>
                    <td> <?= $user['last_name'] ?> </td>
                    <td> <?= $user['email'] ?> </td>
                    <td> <?= $user['date_of_birth'] ?> </td>
                    <td>
                        <a href="/edit/<?= $user['_id'] ?>">Edit</a>
                        <a href="/delete/<?= $user['_id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</section>
<?= view('footer') ?>