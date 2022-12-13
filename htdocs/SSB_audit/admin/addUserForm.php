<div class="add_user">
    <div class="admin_form">
    
        <form action="#" method="post">
            <input type="text" name="login" placeholder="Login" required>
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="surname" placeholder="Surname" required>
            <input type="email" name="email" placeholder="E-mail">
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password2" placeholder="Password confirmation" required>
            <label for="chkActive">Active user: </label>
            <input class="form_item_activeUser" type="checkbox" id="chkActive" name="isUserActive" checked>
            <div class="button"><input class="btn" type="submit" name="addUserBtn" value="ADD"></div>
        </form>
        <div id='info'></div>
    </div>
</div>