<h2>Set Role untuk <?= $user->username ?></h2>
<form action="/admin/store-role/<?= $user->id ?>" method="post">
    <label for="group_id">Pilih Role</label>
    <select name="group_id" id="group_id">
        <?php foreach ($groups as $group): ?>
            <option value="<?= $group->id ?>"><?= $group->name ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Simpan Role</button>
</form>
