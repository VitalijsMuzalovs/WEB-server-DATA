<div class="add_user">
    <div class="admin_form">
        <form action="#" method="post">
            <input type="text" name="login" id="login" placeholder="Login" required>
            <input type="text" name="name" id="name" placeholder="Name" required>
            <input type="text" name="surname" id="surname" placeholder="Surname" required>
            <input type="email" name="email" id="email" placeholder="E-mail">
            <input type="password" name="password" id="password" placeholder="Password">
            <input type="password" name="password2" id="password2" placeholder="Password confirmation" required>
            <label for="chkActive">Active user: </label>
            <input class="form_item_activeUser" type="checkbox" id="chkActive" name="isUserActive" checked>
            <input type="text" name="userID" id="userID" hidden>
            <div class="buttons">
                <input class="button" type="submit" name="addUserBtn" id="addUserBtn" value="ADD">
                <input class="button disabled" type="button" name="saveUserBtn" id="saveUserBtn" value="SAVE">
                <input class="button disabled" type="button" name="cancelEditUser" id="cancelEditUser" onclick="cancelEdit()" value="CANCEL">
            </div>
        </form>
        <div id='info'></div>
    </div>
</div>