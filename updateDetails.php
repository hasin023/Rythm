<?php include("includes/includedFiles.php"); ?>

<div class="userDetails">

    <div class="container borderBottom">
        <h3>EMAIL</h3>
        <input type="text" class="email" name="email" placeholder="Enter your Email" value="<?php echo $userLoggedIn->getEmail(); ?>">
        <span class="message">Email Updated!!</span>
        <button class="buttonSave" onclick="updateEmail('email')">SAVE</button>
    </div>

    <div class="container">
        <h3>PASSWORD</h3>
        <input type="password" class="oldPassword" name="oldPassword" placeholder="Current Password">
        <input type="password" class="newPassword1" name="newPassword1" placeholder="New Password">
        <input type="password" class="newPassword2" name="newPassword2" placeholder="Confirm Password">
        <span class="message">Password Updated!!</span>
        <button class="buttonSave" onclick="">SAVE</button>
    </div>

</div>