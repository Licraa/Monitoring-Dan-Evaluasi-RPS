<h2>Daftar Pengguna</h2>
<a href="/admin/create">Tambah Pengguna</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user->id ?></td>
                <td><?= $user->username ?></td>
                <td><?= $user->email ?></td>
                <td><?= implode(', ', $user->getRoles()) ?></td>
                <td>
                    <a href="/admin/assign-role/<?= $user->id ?>">Set Role</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
