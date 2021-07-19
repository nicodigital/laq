<form id="contact-form" action="#" method="post" accept-charset="utf-8">
    <div class="field field-name">
        <input type="text" name="field_name" placeholder="Nombre" required />
        <div class="status"></div>
    </div>
    <div class="field field-email">
        <input type="email" name="field_email" placeholder="Email" required />
        <div class="status"></div>
    </div>
    <div class="field field-phone">
        <input type="tel" name="field_phone" placeholder="Teléfono" required />
        <div class="status"></div>
    </div>
    <div class="field field-message">
        <textarea name="field_message" cols="" rows="1" placeholder="Mensaje..."></textarea>
    </div>
    <div class="field checkbox-round pt-4">
        
        <div class="round">
            <input type="checkbox" id="checkbox" />
            <label for="checkbox"></label>
        </div>
        <label for="checkbox">Quiero recibir noticias sobre el proyecto</label>

    </div>
    <div class="field field-submit pt-8">
        <input type="submit" id="submit" name="submit" value="Enviar" class="btn btn-color-1" disabled>
    </div>
    <div class="form-notify py-3"></div>
    <input type="hidden" name="recaptcha_response" id="recaptcha-response">

</form>

<script type="module">
    /* Google Recaptcha get Response Script */
    let recaptcha_response = '';
    import {
        contact_form
    } from './js/contact-form.js';

    grecaptcha.ready(function() {
        grecaptcha.execute('<?= $recaptcha_key ?>', {
                action: 'formulario'
            })
            .then(function(token) {
                recaptcha_response = document.getElementById('recaptcha-response');
                recaptcha_response.value = token;
                const SEND_FORM = contact_form(token);
                SEND_FORM;
            })
    });
</script>