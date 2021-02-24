<?= view('header') ?>
<h1>Create User</h1>

<?= view('messages') ?>

<a href="/">back</a>
<form action="/store" method="post">
    <label for="">
        <span>First Name</span>
        <input type="text" name="first_name" placeholder="first name">
    </label>
    <label for="">
        Last Name
        <input type="text" name="last_name" placeholder="last name">
    </label>
    <label for="">
        Email
        <input type="email" name="email" placeholder="email">
    </label>
    <label for="">
        Date of Birth
        <input type="date" name="date_of_birth">
    </label><br>
    <input type="submit" value="Submit">
</form>

<?= view('footer') ?>
