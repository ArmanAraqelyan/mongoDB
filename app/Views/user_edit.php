<?= view('header') ?>
<h1>Update User</h1>
<a href="/">back</a>

<?= view('messages') ?>

<form action="/update/<?= $user['_id'] ?>" method="post">
    <label for="">
        <span>First Name</span>
        <input type="text" name="first_name" placeholder="first name" value="<?= $user['first_name'] ?>">
    </label>
    <label for="">
        Last Name
        <input type="text" name="last_name" placeholder="last name" value="<?= $user['last_name'] ?>">
    </label>
    <label for="">
        Email
        <input type="email" name="email" placeholder="email" value="<?= $user['email'] ?>">
    </label>
    <label for="">
        Date of Birth
        <input type="date" name="date_of_birth" value="<?= $user['date_of_birth'] ?>">
    </label><br>
    <input type="submit" value="Submit">
</form>

<?= view('footer') ?>
