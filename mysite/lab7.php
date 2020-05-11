    <?php
        echo "<b>" . $mailResult . "</b><br>";
    ?>
    <h2>Форма для составления письма</h2>
    <form method="post">
        <fieldset style="padding: 8px; width: 50%;">
            <legend class="text"><b>Оставьте сообщение:</b></legend>
            <b>Имя:</b><br>
            <input type="text" name="mailName" class="input" required><br>
            <b>E-mail:</b><br>
            <input type="email" name="mailEmail" class="input" required><br>
            <b>Текст сообщения:</b><br>
            <textarea rows="12" cols="70" name="mailMessage" class="input" required></textarea><br>
            <b>Подтверждение:</b><br>
            <img src="checking.php"/><br>
            <input type="text" name="mailCaptcha" class="input" required><br>
            <input name="mailSubmit" type="submit" value="Отправить" class="button" />
        </fieldset>
    </form>