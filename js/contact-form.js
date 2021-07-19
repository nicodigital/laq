function contact_form(recaptcha_response) {

		const contact_form = document.querySelector('#contact-form');
		const ajax_form_url = 'inc/send-form.php';

		const field_name = document.querySelector('.field-name');
		const field_name_input = field_name.querySelector('input');

		const field_email = document.querySelector('.field-email');
		const field_email_input = field_email.querySelector('input');

		const field_phone = document.querySelector('.field-phone');
		const field_phone_input = field_phone.querySelector('input');

		const field_message = document.querySelector('.field-message');
		const field_message_input = field_message.querySelector('textarea');

		const field_submit = document.querySelector('.field-submit');
		const btn_submit = field_submit.querySelector('input');

		const notify = document.querySelector('.form-notify');
		// console.log(field_name_input);

		// const url = window.location.href;

		/* //////////////////////// Start Validation ////////////////////////*/
		var txt_valid = false;
		var email_valid = false; 
		var phone_valid = false;
		var proceed = false;
		var notify_message = '';
		const mail_format = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
		const phone_format = /^[0-9]+$/;

		/* Check text function */
		function check_txt(field_txt, field_txt_val, submit) {

			// Expresión regular que incluye Ñ
			// /^[a-zA-ZñÑ\s\W]+$/ 

			let field_txt_status = field_txt.querySelector('.status');

			if (field_txt_val == "" || field_txt_val == null) {
				field_txt.classList.add('error');
				notify_message = 'Debes completar el nombre y apeliido.';
				field_txt_status.innerHTML = notify_message;
				txt_valid = false;
				submit.disabled = true;
			} else {
				field_txt.classList.remove('error');
				field_txt_status.innerHTML = '';
				txt_valid = true;
			}

		}

		/* Check email function */
		function check_email(field_email, field_email_val, submit) {

			let field_email_status = field_email.querySelector('.status');

			if (field_email_val == "" || field_email_val == null || !field_email_val.match(mail_format)) {
				field_email.classList.add('error');
				notify_message = 'Debes ingresar un correo válido.';
				field_email_status.innerHTML = notify_message;
				email_valid = false;
				submit.disabled = true;

			} else {
				field_email.classList.remove('error');
				field_email_status.innerHTML = '';
				email_valid = true;
			}

		}

		/* Check phone function */
		function check_phone(field_phone, field_phone_val, submit) {

			let field_phone_status = field_phone.querySelector('.status');

			if (field_phone_val == "" || field_phone_val == null || !field_phone_val.match(phone_format)) {
				field_phone.classList.add('error');
				notify_message = 'Debes ingresar un teléfono.';
				field_phone_status.innerHTML = notify_message;
				phone_valid = false;
				submit.disabled = true;
			} else {
				field_phone.classList.remove('error');
				field_phone_status.innerHTML = '';
				phone_valid = true;
			}

		}

		field_name_input.onchange = () => {
			let field_name_val = field_name_input.value;
			check_txt(field_name, field_name_val, btn_submit);
		}

		field_email_input.onchange = () => {
			let field_email_val = field_email_input.value;
			check_email(field_email, field_email_val, btn_submit);
		}

		field_phone_input.onchange = () => {
			let field_phone_val = field_phone_input.value;
			check_phone(field_phone, field_phone_val, btn_submit);
		}

		/* Revisamos el form cada vez que un campo cambia  */
		contact_form.onchange = () => {
			if (txt_valid == true && email_valid == true & phone_valid == true) {
				btn_submit.disabled = false;
				notify.innerHTML = '';
				proceed = true;
			} else {
				btn_submit.disabled = true;
				proceed = false;
			}
			// console.log(txt_valid+' - '+ phone_valid + ' - ' + email_valid);
		}

		/* Avisamos que falta algo si alguien hace mouseover y tiene errores */
		field_submit.onmouseover = () => {
			if (txt_valid != true || email_valid != true || phone_valid != true) {
				notify.innerHTML = 'Debes completar el formulario para enviarlo.';
			} else {
				notify.innerHTML = '';
			}
		}

		/* Quitamos el disabled cuando saca el foco del textarea si todo esta */
		field_message_input.oninput = () => {
			// console.log(proceed);
			if (proceed == true) {
				btn_submit.disabled = false;
			}
		}


		/* Si logras hacer click revisamos que todo este bien  */
		btn_submit.onclick = (e) => {
			e.preventDefault();

			if (proceed == true) {

				let field_name_val = field_name_input.value;
				let field_email_val = field_email_input.value;
				let field_phone_val = field_phone_input.value;
				let field_message_val = field_message_input.value;

				if (field_name_val == "" || field_name_val == null) {
					field_name.classList.add('error');
					proceed = false;
				}

				if (field_email_val == "" || field_email_val == null || !field_email_val.match(mail_format)) {
					field_email.classList.add('error');
					proceed = false;
				}

				if (field_phone_val == "" || field_phone_val == null || !field_phone_val.match(phone_format)) {
					field_phone.classList.add('error');
					proceed = false;
				}


				/* Send Form by AJAX */
				fetch(ajax_form_url, {

						method: 'POST',
						credentials: 'same-origin',
						headers: new Headers({
							'Content-Type': 'application/x-www-form-urlencoded'
						}),
						body: 'field_name=' + field_name_val +
							'&field_email=' + field_email_val +
							'&field_phone=' + field_phone_val +
							'&field_message=' + field_message_val +
							'&recaptcha_response=' + recaptcha_response
					})
					.then(function (response) {
						//   return response.text;
						return response.json();
					})
					.then(function (content) {

						// console.log(content);
						notify.innerHTML = content.text;
						field_name_input.value = '';
						field_email_input.value = '';
						field_phone_input.value = '';
						field_message_input.value= '';

						setTimeout(function () {
							notify.classList.add('fade-out');
							//window.location.replace(url+'gracias');
						}, 4000);

					}).catch(function (error) {
						console.log(JSON.stringify(error));
					});


			} // en if all is OK

		} // end click submit button

	} // end Contact Form

	export{contact_form}