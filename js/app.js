const btn = document.getElementById('submit');

document.getElementById('form').addEventListener('submit', function(event) {
  event.preventDefault();

  btn.value = 'Enviando...';

  const serviceID = 'default_service';
  const templateID = 'template_mt98opk';

  emailjs.sendForm(serviceID, templateID, this)
    .then(() => {
      btn.value = 'Send Email';
      alert('¡Correo enviado exitosamente!');
    })
    .catch((err) => {
      btn.value = 'Send Email';
      alert(`Error al enviar el correo: ${JSON.stringify(err)}`);
    });
});
