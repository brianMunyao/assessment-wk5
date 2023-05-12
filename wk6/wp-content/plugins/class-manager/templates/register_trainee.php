<style>
    .success {
        background: rgba(47, 204, 68, 0.2);
        width: fit-content;
        padding: 10px;
        color: rgba(47, 204, 68, 1);
        border-radius: 5px;
        font-weight: 600;
    }

    .error {
        background: rgba(204, 60, 47, 0.2);
        width: fit-content;
        padding: 10px;
        color: rgba(204, 60, 47, 1);
        border-radius: 5px;
        font-weight: 600;
    }

    .input-con {
        display: flex;
        flex-direction: column;
        gap: 5px;
        margin: 10px 0;
    }

    .input-con input {
        width: 300px;

    }

    button {
        background: dodgerblue;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 10px;
        cursor: pointer;
    }
</style>

<div class="container">
    <h1>Register New</h1>

    <?php

    global $success_msg;

    if ($success_msg) {
        echo "<p class='success'>Trainee Added Successfully</p>";
    }
    ?>

    <div class="form">
        <form action="" method="post">


            <div class="input-con">
                <label for="name">Name</label>
                <input type="text" name="name" id='name' required />
            </div>
            <div class="input-con">
                <label for="email">Email Address</label>
                <input type="email" name="email" id='email' required />
            </div>
            <div class="input-con">
                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" id='phone' required />
            </div>
            <button type="submit" name='submit'>REGISTER</button>
        </form>
    </div>
</div>